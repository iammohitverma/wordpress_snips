import cv2
import numpy as np
import os
from flask import Flask, render_template, request, url_for

app = Flask(__name__)

# Folders where the images are located
upload_folder = './static/upload'  # Single uploaded image will be handled here
banners_folder = './static/banners'  # Banners to match with the uploaded product image
result_folder = './static/result_images'  # Folder to store results with outlines

# Ensure the result folder exists
if not os.path.exists(result_folder):
    os.makedirs(result_folder)

# Function to load and handle transparency in images
def load_image_properly(image_path):
    image = cv2.imread(image_path, cv2.IMREAD_UNCHANGED)  # Load with alpha channel if present
    if image is None:
        raise ValueError(f"Error: Unable to load image {image_path}")
    
    # Check if the image has an alpha channel (transparency)
    if image.shape[-1] == 4:  # 4 channels -> BGRA
        # Separate BGR and Alpha channels
        bgr = image[:, :, :3]
        alpha = image[:, :, 3]

        # Replace transparent areas with white background
        white_background = np.ones_like(bgr, dtype=np.uint8) * 255  # White background
        inv_alpha = alpha / 255.0  # Normalize alpha to [0, 1]

        # Composite the image (Alpha Blending)
        for c in range(3):  # Iterate through channels
            bgr[:, :, c] = white_background[:, :, c] * (1 - inv_alpha) + bgr[:, :, c] * inv_alpha

        return cv2.cvtColor(bgr, cv2.COLOR_BGR2GRAY)  # Return grayscale image
    else:
        # No alpha channel, return grayscale image
        return cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

# Function to compare product image within banner using template matching
def compare_images_in_banner(product_image_path, banner_image_path, threshold=0.7):
    try:
        # Load the product and banner images
        product_image = load_image_properly(product_image_path)
        banner_image = load_image_properly(banner_image_path)

        # Apply template matching
        result = cv2.matchTemplate(banner_image, product_image, cv2.TM_CCOEFF_NORMED)
        locations = np.where(result >= threshold)

        # If any match is found, return True and locations
        if len(locations[0]) > 0:
            return True, locations, result
        else:
            return False, None, None
    except Exception as e:
        print(f"Error comparing images: {e}")
        return False, None, None

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/compare_image', methods=['POST'])
def compare_image():
    if 'image' not in request.files:
        return "No file uploaded!", 400

    image_file = request.files['image']
    if image_file.filename == '':
        return "No file selected!", 400

    try:
        # Clear the result folder before processing
        for file in os.listdir(result_folder):
            file_path = os.path.join(result_folder, file)
            if os.path.isfile(file_path):
                os.remove(file_path)

        # Clear the upload folder before saving a new upload
        for file in os.listdir(upload_folder):
            file_path = os.path.join(upload_folder, file)
            if os.path.isfile(file_path):
                os.remove(file_path)

        # Save uploaded product image
        upload_path = os.path.join(upload_folder, image_file.filename)
        image_file.save(upload_path)

        # Read image and process
        processed_image = load_image_properly(upload_path)

        # Compare with all banners
        match_found = False
        result_image_paths = []

        for banner_image in os.listdir(banners_folder):
            banner_image_path = os.path.join(banners_folder, banner_image)
            is_match, locations, result = compare_images_in_banner(upload_path, banner_image_path)

            if is_match:
                match_found = True

                # Load the original color banner image to draw the outline
                banner_image_color = cv2.imread(banner_image_path, cv2.IMREAD_COLOR)

                # Draw a rectangle around each match location with similarity percentage
                for pt in zip(*locations[::-1]):  # Convert (row, col) to (x, y)
                    top_left = pt
                    bottom_right = (top_left[0] + processed_image.shape[1], top_left[1] + processed_image.shape[0])
                    similarity_percentage = result[pt[::-1]] * 100  # Convert match result to percentage

                    # Background rectangle for text
                    text = f"{similarity_percentage:.2f}%"
                    text_size = cv2.getTextSize(text, cv2.FONT_HERSHEY_SIMPLEX, 0.5, 1)[0]
                    background_top_left = (top_left[0], bottom_right[1] - text_size[1] - 5)
                    background_bottom_right = (top_left[0] + text_size[0], bottom_right[1])
                    cv2.rectangle(banner_image_color, background_top_left, background_bottom_right, (255, 255, 255), -1)

                    # Draw rectangle and text
                    cv2.rectangle(banner_image_color, top_left, bottom_right, (0, 255, 0), 3)
                    cv2.putText(banner_image_color, text, (top_left[0], bottom_right[1] - 5), 
                                cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 0, 0), 1)

                # Save the banner image with the rectangle to the result folder
                result_image_path = os.path.join(result_folder, f"result_{image_file.filename.split('.')[0]}_{banner_image}")
                cv2.imwrite(result_image_path, banner_image_color)  # Save the result
                result_image_paths.append(url_for('static', filename=f'result_images/{os.path.basename(result_image_path)}'))

        if not match_found:
            return "No matches found!", 404
        else:
            return render_template('index.html', result_images=result_image_paths)

    except Exception as e:
        return f"Error processing image: {e}", 500


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
