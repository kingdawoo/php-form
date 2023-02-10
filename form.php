<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
    
    <!-- CSS/Style -->
    <style>
        
        body {
            background-color: lightgrey;
        }

        h1 {
            text-align: center; 
            font-family: Arial, Helvetica, sans-serif;
            font-size: 50px;
        }

        fieldset {
            margin: auto;
            width: 50%;
            padding: 10px;
            border: 0px;
        }

        form>div {
            padding: 10px;
        }

        label {
            float: left;
            clear: left;
            width: 150px;
            text-align: left;
        }

        form>div>input {
            width: 60%;
            clear: both;
            outline: none;
        }

        .img-upload {
            width: auto;
        }

        .container {
            background-color: rgb(231, 229, 229);
            padding: 5%;
        }

        .submit-btn {
            margin: 10px;
            width: 20%;
            font-weight: bold;
        }

        .box {
            text-align: center;
        }
    
    </style>
</head>
<body>
<h1>PHP Form</h1>

<!-- Form -->
<fieldset>
    <div class="container">
        <form enctype="multipart/form-data" action="#" method="post">
        
        <div>
        <label for="fname"><b>First Name:</b></label>
        <input type="text" id="fname" name="fname"/>
        </div>

        <div>
        <label for="lname"><b>Last Name:</b></label>
        <input type="text" id="lname" name="lname">
        </div>

        <div>
        <label for="date-of-birth"><b>Birth Date:</b></label>
        <input type="date" name="date-of-birth" id="date-of-birth">
        </div>

        <div>
        <input type="file" accept="image/png, image/jpeg" name="img" id="img" class="img-upload">
        </div>

        <input type="submit" value="Show" name="Submit" class="submit-btn">
     
        </form>
    </div>
</fieldset><br>

<!-- PHP -->
<?php 
if(isset($_POST['Submit'])){
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$birthdate = $_POST["date-of-birth"];

$target_dir = "uploadedfiles/";
$filepath = $target_dir . basename($_FILES["img"]["name"]);

if(move_uploaded_file($_FILES["img"]["tmp_name"], $filepath)) {    
    $div = '<div class=box>';
    $div .= $fname . " " . $lname . '<br>';
    $div .= $birthdate . '<br>';
    $div .= "<img src=".$filepath." height=200 width=300 />";
    $div .= '</div>';
    echo $div;
} 

else {
echo "File error";
}

} 
?>

</body>
</html>