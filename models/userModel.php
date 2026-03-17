<?php
    class userModel{
        private $pdo;
        public function __construct($pdo){
            $this->pdo = $pdo;
        }
        public function registerUser($name,$email,$password){
            $sql = "INSERT INTO users(user_name,user_email,user_pass)
            VALUES (:user_name,:user_email,:user_pass)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":user_name",$name);
            $stmt->bindParam(":user_email",$email);
            $stmt->bindParam(":user_pass",$password);
            $stmt->execute();
        }
        public function verifyEmail($user_email){
            $sql = "SELECT 1 FROM users WHERE user_email = :user_email LIMIT 1";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":user_email",$user_email);
            $stmt->execute();
            return (bool) $stmt->fetch();
        }

    }


  
?>