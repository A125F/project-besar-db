<?php

    class user{
        private $db;
        function __construct($conn){
            $this->db = $conn;
        }
        public function getAdmin($usernamel, $passwordl){
            try{
                $sql = "select * from admin where username_adm = :usernamel AND password_adm = :passwordl";
                $stmt = $this-> db->prepare($sql);
                $stmt->bindparam(':usernamel', $usernamel);
                $stmt->bindparam(':passwordl', $passwordl);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
        }
        public function getDosen($usernamel, $passwordl){
            try{
                $sql = "select * from dosen where username_dsn = :usernamel AND password_dsn = :passwordl";
                $stmt = $this-> db->prepare($sql);
                $stmt->bindparam(':usernamel', $usernamel);
                $stmt->bindparam(':passwordl', $passwordl);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
        }
    }
?>
