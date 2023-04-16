<?php
if (isset($_COOKIE['admin'])) {
  if ($_COOKIE['admin'] == "password") {
    if (isset($_POST['title']) && isset($_POST['description'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $imageFilename = $_FILES['image']['name'];
      $imageTmpName = $_FILES['image']['tmp_name'];
      if (move_uploaded_file($imageTmpName, 'images/' . $imageFilename)) {
        $dataFile = fopen('data.txt', 'a');
        fwrite($dataFile, $title . '|' . $description . '|' . $imageFilename . "\n");
        fclose($dataFile);
      }
    }
  }
  header('Location: /');
  exit();
}
?>