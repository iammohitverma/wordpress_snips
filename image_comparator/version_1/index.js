const fs = require('fs');
const path = require('path');
const sharp = require('sharp');

// Folders where the images are located
const productImagesFolder = path.join(__dirname, 'product_images');
const bannersFolder = path.join(__dirname, 'banners');

// Output file where results will be saved
const outputFile = path.join(__dirname, 'comparison_results.txt');

// Get all product images and banner images
const productImages = fs.readdirSync(productImagesFolder).filter(file => file.endsWith('.jpg') || file.endsWith('.png'));
const bannerImages = fs.readdirSync(bannersFolder).filter(file => file.endsWith('.jpg') || file.endsWith('.png'));

// Write a header to the output file
fs.writeFileSync(outputFile, 'Comparison Results:\n\n');

// Track if any matches are found
let matchFound = false;

// Function to compare images by resizing them to a smaller size
const compareImages = async (productImagePath, bannerImagePath) => {
  try {
    const productImage = await sharp(productImagePath).resize(100, 100).toBuffer();
    const bannerImage = await sharp(bannerImagePath).resize(100, 100).toBuffer();

    // Compare the images as buffers (this checks if they are identical)
    if (productImage.equals(bannerImage)) {
      const result = `Match found: ${path.basename(productImagePath)} used in ${path.basename(bannerImagePath)}\n`;
      console.log(result); // Print to console as well
      fs.appendFileSync(outputFile, result); // Append the result to the output file
      matchFound = true; // Set matchFound to true when a match is found
    }
  } catch (error) {
    console.error('Error comparing images:', error);
  }
};

// Check each banner against each product image
const runComparison = async () => {
  for (const productImage of productImages) {
    const productImagePath = path.join(productImagesFolder, productImage);
    for (const bannerImage of bannerImages) {
      const bannerImagePath = path.join(bannersFolder, bannerImage);
      await compareImages(productImagePath, bannerImagePath);
    }
  }

  // If no match was found, print "No matches found"
  if (!matchFound) {
    const noMatchMessage = 'No matches found between product images and banner images.\n';
    console.log(noMatchMessage); // Print to console
    fs.appendFileSync(outputFile, noMatchMessage); // Write to output file
  }

  console.log(`Comparison complete. Results saved to ${outputFile}`);
};

// Run the comparison
runComparison();
