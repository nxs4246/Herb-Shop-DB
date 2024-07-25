<?php

require './Service.php';

$service = new Service();
$items = $service->fetchAllItems();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Items List</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
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

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            border: 1px solid white;
        }

        th, td {
            padding: 10px;
            border: 1px solid white;
        }

        th {
            background-color: lightgreen;
            color: black;
        }

        tr:nth-child(even) {
            background-color: #333;
        }

        #exitButton {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: lightgreen;
            color: black;
            border: 1px solid white;
            border-radius: 5px;
            cursor: pointer;
        }

        #exitButton:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>

<body>
    <div>ITEMS</div>

    <table>
        <thead>
            <tr>
                <th>iID</th>
                <th>Iname</th>
                <th>Sprice</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?= htmlspecialchars($item->iId); ?></td>
                    <td><?= htmlspecialchars($item->Iname); ?></td>
                    <td><?= htmlspecialchars($item->Sprice); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button id="exitButton" onclick="location.href='?exit'">Exit</button>
</body>

</html>
