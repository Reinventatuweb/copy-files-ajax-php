<?php
// Destination folder
$destinationFolder = '/dir';

// Get the image path from the POST request
$imagePath = $_POST['imagePath'];

// Get the file name
$fileName = basename($imagePath);

// Generate the full path of the file in the destination folder
$fullDestinationPath = $destinationFolder . '/' . $fileName;

// Initialize progress and log variables
$progress = '';
$log = '';

// Check if the file already exists in the destination folder
if (!file_exists($fullDestinationPath)) {
    // Copy the image to the destination
    if (copy($imagePath, $fullDestinationPath)) {
        $progress = 'Image copied';
        $log = "Image copied: $fileName<br>";
    } else {
        $progress = 'Error copying the image';
        $log = "Error copying the image: $fileName<br>";
    }
} else {
    $progress = 'Image already exists';
    $log = "Image already exists: $fileName<br>";
}

// Return the data as AJAX response
echo json_encode(array(
    'progress' => $progress,
    'log' => $log
));
?>
