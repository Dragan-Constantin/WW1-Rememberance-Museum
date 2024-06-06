<?php
// Get the image path from the query string
$imagePath = isset($_GET['path']) ? $_GET['path'] : '';

// Ensure the path is sanitized to avoid directory traversal
$imagePath = realpath('../WW1-Remberance-Museum/assets/images/' . basename($imagePath));

// Check if the file exists and is an image
if ($imagePath && file_exists($imagePath) && exif_imagetype($imagePath)) {
    // Get the MIME type of the image
    $mimeType = mime_content_type($imagePath);

    // Set the appropriate headers
    header('Content-Type: ' . $mimeType);
    header('Content-Length: ' . filesize($imagePath));

    // Read the file and output its contents
    readfile($imagePath);
    exit;
} else {
    // File not found or not an image
    http_response_code(404);
    echo "Image not found.";
}