<?php

require './Service.php';

$service = new Service();

$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $service->updateItem();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
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

        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form method="post">
        <fieldset>
            <legend>Update Item</legend>

            <input type="text" name="id" placeholder="Item ID"></br>

            <input type="text" name="name" placeholder="Item Name"></br>

            <input type="text" name="math" placeholder="Sprice"></br>

            <input id="button" type="submit" name="submit" value="Submit">
            <input id="button" type="submit" name="exit" value="Exit">
        </fieldset>
        <div class="result"><?= htmlspecialchars($result); ?></div>
    </form>
</body>

</html>
