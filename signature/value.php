<?php
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true);

  // Get the data URL
  $imageData = $input['image'];
  $user_idData = $input['user_id'];

  // Remove the "data:image/png;base64," part
  $base64Image = str_replace('data:image/png;base64,', '', $imageData);

  // Decode base64 image
  $decodedImage = base64_decode($base64Image);

  // Save the image to your desired directory
  file_put_contents('../try/signature.png', $decodedImage);
  echo json_encode('Image saved successfully!');

?>