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
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register-res</title>
</head>
<body>
    <form id="registerForm-res" action="../controllers/control-registerRes.php" method="POST">
        <label for="name-res">Nome:</label>
        <input type="text" name="name-res" placeholder="digite o Nome da reserva">
        <label for="desc-res">Descrição</label>
        <input type="text" name="desc-res" placeholder="dê uma breve descrição sobre a reserva">
        <label for="cap-res">Capacidade:</label>
        <input type="number" step="1" min="0" name="cap-res" placeholder="digite a Capacidade máxima da reserva">
        <label for="validity">Validade:</label>
        <input type="datetime-local" name="validity" placeholder="insira a mesma senha">
        <button id="registerBtn-adm" type="submit">Enviar</button>
        <span id="load-register"></span>
    </form>
    <span class="" id="ajax-message"></span>

</body>

<!--API para o ajax-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--Ajax-->
<script src="../assets/JS/Ajax.js"></script>
<!--bootstrap-->

</html>