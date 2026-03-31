<?php
    require_once "../config/conexaodb.php";
    require_once "../models/userModel.php";

    $userModel = new userModel($pdo);
    $hash_pass = password_hash("Adm123",PASSWORD_DEFAULT);
    $userModel->registerUser("NovoAdm","Adm@gmail.com",$hash_pass,"Admin");
?>