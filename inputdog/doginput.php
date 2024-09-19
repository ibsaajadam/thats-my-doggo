<?php
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);  

  include_once '../db.php';

  $name = $_POST['name'];
  $breed = $_POST['breed'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $image_text = $_POST['text'];

  // Initialize message variable
  $msg = "";

  // If upload button is clicked...
  if (isset($_POST['submit-input'])){
    // capture image extension & file size errors
    $errors = array();

    // Get image name
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['type'];
    $imageArray = explode('.', $_FILES['image']['name']);
    $image_ext = strtolower(end($imageArray));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($image_ext, $extensions) === false){
      $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($image_size > 2097152){
      $errors[] = 'file size must be exactly 2 MB';
    }

    // Get text
    $image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

    // Check if there are any errors
    if (!empty($errors)) {
      // Display error messages
      foreach ($errors as $error) {
          echo $error . "<br>";
      }
      // Terminate script execution
      die("Image upload failed due to errors.");
    }

    // image file directory
    $target = "../images/".basename($image);

    $sql = "INSERT INTO pets (name, breed, age, gender, image, image_text) VALUES ('$name', '$breed', '$age', '$gender', '$image', '$image_text')";
    // mysqli_query($conn, $sql);

    if (mysqli_query($conn, $sql)) {
      echo "SQL query executed successfully.";
    } else {
        echo "Query execution failed: " . mysqli_error($conn);
        die("Query failed: " . mysqli_error($conn));
    }

    if (empty($errors) === true){
      move_uploaded_file($image_tmp, $target);
      $_SESSION['msg'] = "image uploaded successfully";
      $_SESSION['valid'] = true;
    } else {
      $_SESSION['msg'] = "incorrect";
      $_SESSION['valid'] = false;
    }
  }

  $result = mysqli_query($conn, "SELECT * FROM pets");

  header("Location: ../public/index.php?signup=success");

  ?>

