<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
    body {
        background-color: aqua;
    }

    form {
        text-align: center;
    }
    </style>
</head>
<body>
    <h1 style="text-align: center;">PHP CSV FORM</h1>

    <!-- Form -->
    <div>
        <form action="#" method="post">

        <label for="name"><b>Namn:</b></label>
        <input type="text" id="name" name="name"/><br><br>

        <label for="email"><b>E-post:</b></label>
        <input type="email" id="email" name="email"><br><br>

        <input type="submit" value="Spara" name="spara"><br><br>
    
        </form>

        <form action="user.php" method="post">
        <input type="submit" value="Visa" name="visa">
        </form>

    </div>

    <!-- Data hantering -->
    <?php

    // Spara Data
    if(isset($_POST['spara'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
    
        if(trim($name) === '' || trim($email) === ''){
            echo "Error: Skriv namn och e-postaddress!";
        } else {
            $data = [
                [$name, $email],
            ];
    
            $userfile = 'users.csv';
    
            $f = fopen($userfile, 'a+');
    
            foreach ($data as $row) {
                fputcsv($f, $row);
            }
    
            fclose($f);
        }
    }    
    ?>
</body>
</html>