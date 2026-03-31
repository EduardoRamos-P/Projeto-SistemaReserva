<?php
    require_once "../config/conexaodb.php";
    require_once "../models/userModel.php";
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        try{
            $email = $_POST["email-login"];
            $pass = $_POST["password-login"];

            if(empty(trim($email)) || empty(trim($pass))){
                throw new Exception("Preencha todos os campos");
            }

            $userModel = new userModel($pdo);
            $usuario = $userModel->verifyLogin($email);
            if(!$usuario){
                throw new Exception("email ou senha incorretos");
            }

            if(!password_verify($pass,$usuario["user_pass"])){
                throw new Exception("email ou senha incorretos");
            }

            session_start();
            $_SESSION["user_name"] = $usuario["user_name"];
            $_SESSION["id_user"] = $usuario["id_user"];
            $_SESSION["user_type"] = $usuario["user_type"];

            echo json_encode([
                "status" => "success",
                "message" => "Login realizado com sucesso!",
                "user_type" => $usuario["user_type"]
            ]);

        }
        catch (Exception $e){
            echo json_encode([
                "status" => "error",
                "message" => $e->getMessage(),
            ]);
        }
    }

?>