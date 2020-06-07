<?php
// define variables and initialize with empty values
$nameErr = $addrErr = $emailErr = $howManyErr = $favFruitErr = "";
$name = $address = $email = $howMany = "";
$favFruit = array();


$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
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
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            echo "<br> <img src=".$target_file."></img> <br>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    if (empty($_POST["name"])) {
        $nameErr = "Missing";
        echo '<br>name is missing <br>';
    }
    else {
        $name = $_POST["name"];
        echo "<br>". $name ."<br>";
    }


    if (empty($_POST["message"])){
        $messageErr = "Missing";
        echo '<br>message is missing <br>';
    }
    else {
        $message = $_POST["message"];
        echo"<br>". $message ."<br>";
    }



    if (empty($_POST["sex"]))  {
        $sexErr = "Missing";
        echo '<br>Sex is missing<br>';
    }
    else {
        $sex = $_POST["sex"];
        echo  "You have selected :".$_POST['sex'] ."<br>";
    }

    if (empty($_POST["brochure"]))  {
        $brochureErr = "Missing";
        echo '<br>Sex is missing<br>';
    }
    else {
        $brochure = $_POST["brochure"];
        echo  "You have selected :".$_POST['brochure'] ."<br>";
    }


    if (empty($_POST["fav"])) {
        $favFruitErr = "You must select 1 or more";
        echo '<br>fav is missing <br>';
    }
    else {
        $favFruit = $_POST["fav"];
        foreach ($favFruit as $select)
        {
            echo "You have selected :" .$select; // Displaying Selected Value
        }
    }



}