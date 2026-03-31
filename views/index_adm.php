<?php
    session_start();
    if($_SESSION["user_type"] != "Admin"){
        header("location:login.html");
        session_abort();
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Bem vindo a seção de admin</h1>
    <a href="registerADM.php">Registrar colaborador</a>
    <a href="registerRES.php">Registrar recurso</a>
</body>
</html>