<?php

require './Service.php';

$service = new Service();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $service->addItem();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        body {
            background-color: black;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 300px;
            text-align: center;
            padding: 20px;
            border: 1px solid white;
            border-radius: 5px;
        }

        fieldset {
            border: none;
        }

        legend {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid white;
            border-radius: 5px;
            background-color: black;
            color: white;
        }

        #button {
            background-color: lightgreen;
            color: black;
            cursor: pointer;
        }

        #button:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>

<body>
    <form method="post">
        <fieldset>
            <legend>Add Item</legend>

            <input type="text" name="name" placeholder="Item Name"></br>

            <input type="text" name="math" placeholder="Sprice"></br>

            <input id="button" type="submit" name="submit" value="Submit">
            <input id="button" type="submit" name="exit" value="Exit">
        </fieldset>
        <!-- <?= htmlspecialchars($result); ?> -->
    </form>
</body>

</html>
