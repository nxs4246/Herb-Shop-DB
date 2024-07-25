<?php

$option = isset($_GET['choice']) ? $_GET['choice'] : null;

if ($option) {
    switch ($option) {
        case 'select':
            include 'index.php';
            break;
        case 'insert':
            header("Location: http://localhost/item/addItem.php");
            break;
        case 'update':
            header("Location: http://localhost/item/updateItem.php");
            break;
        case 'delete':
            header("Location: http://localhost/item/deleteItem.php");
            break;
        case 'search':
            header("Location: http://localhost/item/searchItem.php");
            break;
        case 'exit':
            exit;
    }
} else {
    echo <<<END
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Page Title</title>
        <style>
            body {
                background-color: black;
                color: white;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                height: 100vh;
                margin: 0;
            }
            h1 {
                font-size: 48px; /* Twice the original size */
                font-weight: bold;
                margin-top: 20px; /* Added margin on top */
            }
            .menu {
                text-align: center;
                margin-top: 20px; /* Added margin between heading and menu */
            }
            .menu a {
                color: white;
                text-decoration: none;
                padding: 10px 20px;
                margin: 0 10px;
                border: 1px solid white;
                border-radius: 5px;
                transition: background-color 0.3s ease; /* Added transition for smooth effect */
            }
            .menu a:hover {
                background-color: lightgreen; /* Highlight color on hover */
                color:black;
            }

        </style>
    </head>
    <body>
        <h1>Welcome to Arlington Herbal Shop-DB</h1>
        <div class="menu">
            <a href="?choice=select">Select</a>
            <a href="?choice=insert">Insert</a>
            <a href="?choice=update">Update</a>
            <a href="?choice=delete">Delete</a>
            <a href="?choice=search">Search</a>
            <a href="?choice=exit">Exit</a>
        </div>
    </body>
    </html>
    END;
}
?>
