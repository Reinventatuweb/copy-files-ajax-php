<?php
// Destination folder
$destinationFolder = '/dir';

// Get the image path from the POST request
$filePath = $_POST['filePath'];

// Get the file name
$fileName = basename($filePath);

// Generate the full path of the file in the destination folder
$fullDestinationPath = $destinationFolder . '/' . $fileName;

// Initialize log variable
$log = '';
$status = '';

// Check if the file already exists in the destination folder
if (!file_exists($fullDestinationPath)) {
    // Copy the image to the destination
    if (copy($filePath, $fullDestinationPath)) {
        $log = "File copied: $fileName<br>";
        $status = "copied";
    } else {
        $log = "Error copying the file: $fileName<br>";
        $status = "error";
    }
} else {
    $log = "File already exists: $fileName<br>";
    $status = "exist";
}

// Return the data as AJAX response
echo json_encode(array(
    'log' => $log,
    'status' => $status
));
?>
