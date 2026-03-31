<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
    <?php
        session_start();
    ?>
</head>
<body>
    <h1>Seja bem vindo <?php echo $_SESSION["user_name"];?></h1>
    <h3>Email:<?php echo $_SESSION["id_user"];?></h3>
    <button ></button>
</body>
</html>