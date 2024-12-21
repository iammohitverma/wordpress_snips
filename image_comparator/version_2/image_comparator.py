import cv2
import numpy as np
import os

# Folders where the images are located
product_images_folder = './static/product_images' 
banners_folder = './static/banners'
result_folder = './static/result_images'  # Folder to store results with outlines

# Ensure the result folder exists
if not os.path.exists(result_folder):
    os.makedirs(result_folder)

# Get all product images and banner images
product_images = [f for f in os.listdir(product_images_folder) if f.endswith(('.jpg', '.png'))]
banner_images = [f for f in os.listdir(banners_folder) if f.endswith(('.jpg', '.png'))]

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
def compare_images_in_banner(product_image_path, banner_image_path, threshold=0.8):
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

# Track if any match is found
match_found = False
total_matches = 0  # To track total matches found

# Open the output file for text logs
with open('image_comparison_output.txt', 'a') as output_file:
    # Check each banner against each product image
    for product_image in product_images:
        product_image_path = os.path.join(product_images_folder, product_image)
        product_image_color = cv2.imread(product_image_path, cv2.IMREAD_COLOR)  # Load product image in color
        
        for banner_image in banner_images:
            banner_image_path = os.path.join(banners_folder, banner_image)
            
            # Compare the product image within the banner image
            is_match, locations, result = compare_images_in_banner(product_image_path, banner_image_path)
            
            if is_match:
                # If a match is found, log the match details
                match_message = f"Match found: {product_image} in {banner_image}\n"
                output_file.write(match_message)
                match_found = True

                # Load the original color banner image to draw the outline
                banner_image_color = cv2.imread(banner_image_path, cv2.IMREAD_COLOR)
                
                # Draw a rectangle around each match location with similarity percentage
                for pt in zip(*locations[::-1]):  # Convert (row, col) to (x, y)
                    top_left = pt
                    bottom_right = (top_left[0] + product_image_color.shape[1], top_left[1] + product_image_color.shape[0])
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
                    total_matches += 1

                # Save the banner image with the rectangle to the result folder
                result_image_path = os.path.join(result_folder, f"result_{product_image}_{banner_image}")
                cv2.imwrite(result_image_path, banner_image_color)  # Save the result

    # If no matches were found, write that to the file
    if not match_found:
        output_file.write("No matches found between product images and banner images.\n")
    else:
        output_file.write(f"Total Matches Found: {total_matches}\n")
