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

    if image.shape[-1] == 4:  # Handle transparency
        bgr = image[:, :, :3]
        alpha = image[:, :, 3]
        white_background = np.ones_like(bgr, dtype=np.uint8) * 255
        inv_alpha = alpha / 255.0

        for c in range(3):
            bgr[:, :, c] = white_background[:, :, c] * (1 - inv_alpha) + bgr[:, :, c] * inv_alpha

        return cv2.cvtColor(bgr, cv2.COLOR_BGR2GRAY)
    else:
        return cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

# Function to compare product image within banner using multi-scale template matching
def compare_images_in_banner(product_image_path, banner_image_path, threshold=0.8):
    try:
        product_image = load_image_properly(product_image_path)
        banner_image = load_image_properly(banner_image_path)

        best_match = None
        best_score = 0
        scales = [0.5, 0.75, 1.0, 1.25, 1.5]  # Scales to try for resizing

        for scale in scales:
            resized_product = cv2.resize(product_image, (0, 0), fx=scale, fy=scale)
            if resized_product.shape[0] > banner_image.shape[0] or resized_product.shape[1] > banner_image.shape[1]:
                continue

            result = cv2.matchTemplate(banner_image, resized_product, cv2.TM_CCOEFF_NORMED)
            min_val, max_val, min_loc, max_loc = cv2.minMaxLoc(result)

            if max_val > best_score:
                best_score = max_val
                best_match = (max_loc, resized_product.shape[::-1])

        if best_score >= threshold:
            return True, best_match, best_score
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
        for file in os.listdir(result_folder):
            file_path = os.path.join(result_folder, file)
            if os.path.isfile(file_path):
                os.remove(file_path)

        for file in os.listdir(upload_folder):
            file_path = os.path.join(upload_folder, file)
            if os.path.isfile(file_path):
                os.remove(file_path)

        upload_path = os.path.join(upload_folder, image_file.filename)
        image_file.save(upload_path)

        processed_image = load_image_properly(upload_path)

        match_found = False
        result_image_paths = []

        for banner_image in os.listdir(banners_folder):
            banner_image_path = os.path.join(banners_folder, banner_image)
            is_match, match_details, best_score = compare_images_in_banner(upload_path, banner_image_path)

            if is_match:
                match_found = True

                banner_image_color = cv2.imread(banner_image_path, cv2.IMREAD_COLOR)
                top_left = match_details[0]
                bottom_right = (top_left[0] + match_details[1][1], top_left[1] + match_details[1][0])

                similarity_text = f"{best_score * 100:.2f}%"
                text_size = cv2.getTextSize(similarity_text, cv2.FONT_HERSHEY_SIMPLEX, 0.5, 1)[0]
                text_bottom_left = (top_left[0], top_left[1] - 10)

                cv2.rectangle(banner_image_color, top_left, bottom_right, (0, 255, 0), 3)
                cv2.putText(banner_image_color, similarity_text, text_bottom_left, 
                            cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 255, 0), 2)

                result_image_path = os.path.join(result_folder, f"result_{image_file.filename.split('.')[0]}_{banner_image}")
                cv2.imwrite(result_image_path, banner_image_color)
                result_image_paths.append(url_for('static', filename=f'result_images/{os.path.basename(result_image_path)}'))

        if not match_found:
            return "No matches found!", 404
        else:
            return render_template('index.html', result_images=result_image_paths)

    except Exception as e:
        return f"Error processing image: {e}", 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
