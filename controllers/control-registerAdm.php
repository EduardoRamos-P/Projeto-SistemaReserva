<?php
    require_once "../config/conexaodb.php";
    require_once "../models/userModel.php";
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        try{
            $name_adm = $_POST["name-adm"];
            $email_adm = $_POST["email-adm"];
            $pass_adm = $_POST["password-adm"];
            $pass_verifyAdm = $_POST["pass-verifyAdm"];
            $type = $_POST["type"];
            $campos = [$name_adm,$email_adm,$pass_adm,$pass_verifyAdm,$type];

            if(count(array_filter(array_map("trim",$campos))) < count($campos) ){
                throw new Exception("Preencha todos os campos");
            }

            if($pass_adm != $pass_verifyAdm){
                throw new Exception("As senhas não estão iguais");
            }

            $userModel = new userModel($pdo);
            if($userModel->verifyEmail($email_adm)){
                throw new Exception("Emai já vinculado a uma conta");
            }
            $hash_pass = password_hash($pass_adm, PASSWORD_DEFAULT);
            $userModel->registerUser($name_adm,$email_adm,$hash_pass,$type);

            echo json_encode([
                "status" => "success",
                "message" => "Colaborador registrado com sucesso"
            ]);

        }
        catch(Exception $e){
            echo json_encode([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }
    }
?>