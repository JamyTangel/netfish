<?php

  session_start();
    // include "header.php";
    if(!isset($_SESSION["ID"]) && $_SESSION["STATUS"] != "ACTIEF"){
      echo "<p>U hebt geen toegang tot dit gedeelte van de website</p>";
    } else {
        include_once("header.php");
    }

    // include_once("DBconfig.php");
    if(isset($_POST["submit"])) {

      $sql= "INSERT INTO `movie` (`ID`, `title`, `url`, `year`, `description`) 
             VALUES (NULL, :title, :image, :year, :description);";

      $image_path = uploadImage();
      $title = $_POST['title'];
      $year = $_POST['year'];
      $description = $_POST['description'];

      $movieArray = array(
        "title"=>$title,
        "image"=>$image_path,
        "year"=>$year,
        "description"=>$description
      );

      $stmt = $pdo->prepare($sql);
      $stmt->execute($movieArray);
    }
?>
  <div class="container">
    <div class="formulier">
        <form name="toevoegen" method="POST" action="" enctype="multipart/form-data">
            <h1>Toevoegen</h1>
            <input type="text" name="title" placeholder="title" /><br><br>
            <input type="text" name="year" placeholder="year" /><br><br>
            <textarea id="" name="description" rows="4" cols="30" placeholder="description"></textarea>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" name="submit" value="toevoegen" />
        </form>
    </div>
  </div>

<?php
    function uploadImage(){
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
      // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
    
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 5000000) {
       echo "Sorry, your file is too large.";
       $uploadOk = 0;
      }
    
    // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
       echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
    
    // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
         echo "Sorry, there was an error uploading your file.";
      }
    }
     return $target_file;
  }
    include 'footer.php';


?>