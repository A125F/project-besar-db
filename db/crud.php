<?php
    class crud{
        private $db;
        function __construct($conn){
            $this->db = $conn;
        }
        public function insertCourse($name, $nim, $prodi, $jurusan, $ipk, $email, $namac, $linkc, $hargas, $durasic, $level){
            try{
                $sql = "INSERT INTO course (nama_mhs, nim, prodic, juruc, ipkc, emailc, nama_crs, link, harga_crs, durasi_crs, level) VALUES (:nama_mhs, :nim, :prodi, :jurusan, :ipk, :email , :namac,:linkc,:hargas,:durasic,:level)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':nama_mhs', $name);
                $stmt->bindparam(':nim', $nim);
                $stmt->bindparam(':prodi', $prodi);
                $stmt->bindparam(':jurusan', $jurusan);
                $stmt->bindparam(':ipk', $ipk);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':namac', $namac);
                $stmt->bindparam(':linkc', $linkc);
                $stmt->bindparam(':hargas', $hargas);
                $stmt->bindparam(':durasic', $durasic);
                $stmt->bindparam(':level', $level);
                
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function getMahasiswa(){
            try{
            $sql = "SELECT * FROM mahasiswa m inner join course c on m.id_courseint = c.id_courseint";
            $result = $this->db->query($sql);
            return $result;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
           }
       }
        public function getCourse(){
            try{
            $sql = "SELECT * FROM course";
            $result = $this->db->query($sql);
            return $result;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
           }
       }
        public function getAdmin(){
            try{
            $sql = "SELECT * FROM admin";
            $result3 = $this->db->query($sql);
            return $result3;
            }catch(PDOException $e){
            echo $e->getMessage();
            return false;
            }
        }
        public function getDosen(){
            try{
            $sql = "SELECT * FROM dosen";
            $result = $this->db->query($sql);
            return $result;
            }catch(PDOException $e){
            echo $e->getMessage();
            return false;
            }
        }
        public function editCourse($id, $name, $nim, $prodi, $jurusan, $ipk, $email, $namac, $linkc, $hargas, $durasic, $level){
            try{ 
                $sql = "UPDATE course SET nama_mhs=:nama_mhs, nim=:nim, prodic=:prodi, juruc=:jurusan, ipkc=:ipk, emailc=:email, nama_crs=:namac,link=:linkc,harga_crs=:hargas,durasi_crs=:durasic,level=:level WHERE id_courseint = :id"; 
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':nama_mhs', $name);
                $stmt->bindparam(':nim', $nim);
                $stmt->bindparam(':prodi', $prodi);
                $stmt->bindparam(':jurusan', $jurusan);
                $stmt->bindparam(':ipk', $ipk);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':namac', $namac);
                $stmt->bindparam(':linkc', $linkc);
                $stmt->bindparam(':hargas', $hargas);
                $stmt->bindparam(':durasic', $durasic);
                $stmt->bindparam(':level', $level);

                $stmt->execute();
                return true;
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function deleteCourse($id){
            try{ 
                $sql = "delete from course where id_courseint = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function getCourseDetails($id){
            try{
            $sql = "select * from course where id_courseint = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
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