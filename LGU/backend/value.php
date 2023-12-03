<?php
$conn = mysqli_connect("localhost", "root", "", "priotizen");
  $inputJSON = file_get_contents('php://input');
  $input = json_decode($inputJSON, true);

  // Get the data URL
  $imageData = $input['image'];
  $id = $input['id'];

  // Remove the "data:image/png;base64," part
  $base64Image = str_replace('data:image/png;base64,', '', $imageData);
  $decodedImage = base64_decode($base64Image);

  // Save the image to your desired directory
  $signature = "signature_$id".".png";
  $path = "../../priotizen_app/documents/".$signature;
  file_put_contents($path, $decodedImage);
  $query = "UPDATE test set signature= '$signature' where user_id = '$id'";
  $query = mysqli_query($conn, $query);
  if($query){
    echo json_encode('Image saved successfully!');
  }else{
    echo json_encode('Image saved Failed!');

  }

?>