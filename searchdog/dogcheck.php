<?php
include_once '../db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dogcheck.css">
  <title>Hey Buddy!</title>
  <style>

    .article-box {
      padding-bottom: 10px;
      width: 50%;
      margin-top: 50px;
    }

    .image {
      width: 50%;
    }

    @media (max-width: 849px) {
      .article-box {
        width: 100%;
      }
    }
  </style>
</head>

<body>


  <a href="/">
    <h1 class="title mt-3 mx-2 fs-2 fw-bold">Hey Buddy!</h1>
  </a>

  <div class="article-container py-5 mx-2 w-full">
    <?php
    if (isset($_POST['submit-search'])) {
      $search = $_POST['search'];
      $sql = "SELECT * FROM pets WHERE breed LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);

      echo "There are " . $queryResult . " results!<br><br>";

      if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "
        <div class='article-box'>
          <h2>" . $row['name'] . "</h2>
          <h3>" . $row['breed'] . "</h3>
          <p>" . $row['age'] . "</p>
          <p>" . $row['gender'] . "</p>
          <img class='image' src='../images/" . $row['image'] . "'>
          <p>" . $row['image_text'] . "</p>
        </div>";
        }
      } else {
        echo "There are no results matching your search unfortunately.";
      }
    }

    ?>
  </div>

</body>

</html>