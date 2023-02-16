<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
    body {
        background-color: aqua;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 30%;
        background: white;
        margin-left: auto;
        margin-right: auto;
    }

    td, th {
      border: 1px solid Black;
      text-align: center;
      padding: 8px;
    }
    </style>
</head>
<body>
    <?php
    if (file_exists('users.csv')){
        $f = fopen('users.csv', 'r');

        while (($row = fgetcsv($f)) !== false) {
        $data[] = $row;
        }
    
        fclose($f);
    
        echo "<table>";
        echo "<tr><td><b>Namn</b></td><td><b>E-post</b></td></tr>";
        foreach ($data as $users) {
            echo "<tr>";
            foreach ($users as $user) {
                echo "<td>".$user."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "Error: Skriv namn och e-postaddress!";
    }
    
    ?>
</body>
</html>