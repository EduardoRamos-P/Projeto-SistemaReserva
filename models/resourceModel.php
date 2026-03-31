<?php
   class resourceModel{
        private $pdo;
        public function __construct($pdo){
            $this->pdo = $pdo;
        }
        public function registerRES($res_name,$res_desc,$res_cap,$res_val){
            $sql = "INSERT INTO resources(res_name,res_description,capacity,validity) 
            VALUES (:res_name,:res_desc,:res_cap,:res_val)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":res_name",$res_name);
            $stmt->bindParam(":res_desc",$res_desc);
            $stmt->bindParam(":res_cap",$res_cap);
            $stmt->bindParam(":res_val",$res_val);
            $stmt->execute();
        }
   } 

?>