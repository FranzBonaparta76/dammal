<?php
if (isset($_POST['image'])) {
    // Get the data URL of the screenshot from the POST request
    $dataURL = $_POST['image'];

    // Remove the "data:image/png;base64," prefix from the data URL
    $data = substr($dataURL, strpos($dataURL, ',') + 1);

    // Decode the base64-encoded image data
    $decodedData = base64_decode($data);

    // Generate a unique filename for the screenshot
    $filename = 'screenshot_' . time() . '.png';

    // Save the screenshot to a file
    file_put_contents($filename, $decodedData);

    // Optionally, you can provide feedback to the client
    echo 'Screenshot saved as ' . $filename;
} else {
    // If no image data was received, return an error message
    echo 'Error: No image data received';
}
?>
