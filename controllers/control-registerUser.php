<?php
    require_once "../config/conexaodb.php";
    require_once "../models/userModel.php";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        try{
            $user_name = $_POST["name"];
            $user_email = $_POST["email"];
            $user_pass = $_POST["password"];
            $user_passVerify = $_POST["pass-verify"];
            $campos = [$user_name,$user_email,$user_pass,$user_passVerify];

            if(count(array_filter(array_map("trim",$campos))) < count($campos)){
                throw new Exception("Preencha todos os campos");
            }

            if($user_pass != $user_passVerify){
                throw new Exception("as senhas não estão iguais");
            }
            $hash_pass = password_hash($user_pass,PASSWORD_DEFAULT);

            $userModel = new userModel($pdo);
            
            if($userModel->verifyEmail($user_email)){
                throw new Exception("Esse email já está vinculado a um usuário");
            }
            $type = "Client";

            $userModel->registerUser($user_name,$user_email,$hash_pass,$type);

            echo json_encode([
                "status" => "success",
                "message" => "Usuário cadastrado com sucesso!" 
            ]);

        }
        catch(Exception $e){
            echo json_encode([
                "status" => "error",
                "message" => $e -> getMessage()
            ]);
        }
        
    }
    
?>