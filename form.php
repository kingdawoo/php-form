<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
    
    <!-- JS/Script -->
    <!-- <script defer>
        
        // Funktion som tar text och bild inmatad av användaren och visar de i webbsidan
        function displayValues() {
        
        // Ta värden och lagra de i variabler
        var fName = document.getElementById('fname').value;
        var lName = document.getElementById('lname').value;
        var birthDate = document.getElementById('date-of-birth').value;
        var imgFile = document.getElementById('img').files[0];

        // Skapa element och lagra de i variabler
        var box = document.createElement('div');
        var nameText = document.createElement('h3');
        var dateText = document.createElement('h3');
        var img = document.createElement('img');

        // Ge div element en class för modifiering i CSS
        box.classList.add("box");

        // Lägg till child element i parent element
        document.body.appendChild(box);
        box.appendChild(nameText);
        box.appendChild(dateText);
        box.appendChild(img);

        // Adjustera storlek på bild
        img.setAttribute('width', '200px');
        
        // Lägg till önskad text i header element
        nameText.innerText = fName + " " + lName;
        dateText.innerText = birthDate;

        // Inte min kod men förstår den, tar bilden och visar den med hjälp av FileReader object
        var reader = new FileReader(); // Skapa ny instans av 'FileReader' objektet, har metoder som läser filer och gör de till string
        
        reader.readAsDataURL(imgFile); // läser innehållet i filen och returnerar den som en Data URL-sträng

        reader.onload = function(e) { // Funktion körs när datan har laddats in till minnet
            
            img.src = e.target.result; // Ställer in img-elementets src-attribut till innehållet i filen och visar bilden
        }

        // Stanna som den är, type="submit" skulle refresha direkt efter och ta bort texten
        return false;
        }
    
    </script> -->

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

        /* .box {
            text-align: center;
        } */
    
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
        <input type="text" name="date-of-birth" id="date-of-birth">
        </div>

        <div>
        <input type="file" accept="image/png, image/jpeg" name="img" id="img" class="img-upload">
        </div>

        <input type="submit" value="Show" name="Submit" class="submit-btn">
     
        </form>
    </div>
</fieldset><br>

<?php 
if(isset($_POST['Submit'])){

echo $_POST["fname"] . " " . $_POST["lname"];
echo '<br>';
echo $_POST["date-of-birth"];
echo '<br>';

$filepath = $_FILES["img"]["name"];

if(move_uploaded_file($_FILES["img"]["tmp_name"], $filepath)) {    
    echo "<img src=".$filepath." height=200 width=300 />";
} 

else {
echo "Error";
}

} 
?>

</body>
</html>