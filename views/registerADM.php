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
    <form id="registerForm-adm">
        <label for="name-adm">Nome:</label>
        <input type="text" name="name-adm" placeholder="digite o Nome">
        <label for="email-adm">Email:</label>
        <input type="email" name="email-adm" placeholder="digite o E-mail">
        <label for="password-adm">Senha:</label>
        <input type="password" name="password-adm" placeholder="crie a Senha">
        <label for="pass-verifyAdm">Digite a senha novamente:</label>
        <input type="password" name="pass-verifyAdm" placeholder="insira a mesma senha">
        <label for="type">Cargo:</label>
        <select name="type" >
            <option value="">escolha um cargo</option>
            <option value="Admin">Admin</option>
        </select>

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