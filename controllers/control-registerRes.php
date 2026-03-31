<?php
    require_once "../config/conexaodb.php";
    require_once "../models/resourceModel.php";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        try{
            $res_name = $_POST["name-res"];
            $res_desc = $_POST["desc-res"];
            $res_cap = $_POST["cap-res"];
            $res_val = $_POST["validity"];
            $campos = [$res_name,$res_desc,$res_cap,$res_val];
            
    
            if(count(array_filter(array_map("trim",$campos)))  < count($campos)){
                throw new Exception("Preencha todos os campos");
            }

            if($res_cap >= 65535 || $res_cap < 0){
                throw new Exception("capacidade inválida");
            }

            $date = DateTime::createFromFormat("Y-m-d\TH:i",$res_val);
            if(!$date || !$date->format("Y-m-d\TH:i") === $res_val){
                throw new Exception("Data inválida");
            }

            $res_val = $date->format("Y-m-d H:i:s");
            
            $resModel = new resourceModel($pdo);
            $resModel->registerRES($res_name,$res_desc,$res_cap,$res_val); 
            
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
       
    }

    



?>