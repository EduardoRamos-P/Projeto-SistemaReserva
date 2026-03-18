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
                throw new Exception("Usuário não cadastrado");
            }

            if(!password_verify($pass,$usuario["user_pass"])){
                throw new Exception("Senha incorreta");
            }

            session_start();
            $_SESSION["user_name"] = $usuario["user_name"];
            $_SESSION["user_email"] = $usuario["user_email"];
            $_SESSION["user_pass"] = $usuario["user_pass"];

            echo json_encode([
                "status" => "success",
                "message" => "Login realizado com sucesso!"
            ]);

        }
        catch (Exception $e){
            echo json_encode([
                "status" => "erro",
                "message" => $e->getMessage()
            ]);
        }
    }

?>