<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>

    <style>
        body {
            display: grid;
            place-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <h1>
        <?php
        $greeting = "Hello";
        echo $greeting . " " . "World!";
        echo "$greeting everybody!";
        echo '$greeting everybody!';

        $result = print "";
        echo "Hello World!", $result;
        ?>
    </h1>
</body>
</html>