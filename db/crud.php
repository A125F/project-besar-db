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
        public function insertMahasiswa($name, $nim, $prodi, $jurusan, $email, $namas){
            try{
                $sql = "INSERT INTO mahasiswa (nama_mhs, nim, prodi, jurusan, email, id_seminar) VALUES (:nama_mhs, :nim, :prodi, :jurusan, :email , :namas)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':nama_mhs', $name);
                $stmt->bindparam(':nim', $nim);
                $stmt->bindparam(':prodi', $prodi);
                $stmt->bindparam(':jurusan', $jurusan);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':namas', $namas);
                
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function insertMahasiswa2($name, $nim, $nik, $ipk, $semester, $prodi, $jurusan, $email, $namat){
            try{
                $sql = "INSERT INTO mahasiswa (nama_mhs, nim, nik, ipk, semester, prodi, jurusan, email, id_tukper) VALUES (:nama_mhs, :nim, :nik, :ipk, :semester, :prodi, :jurusan, :email , :namat)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':nama_mhs', $name);
                $stmt->bindparam(':nim', $nim);
                $stmt->bindparam(':nik', $nik);
                $stmt->bindparam(':ipk', $ipk);
                $stmt->bindparam(':semester', $semester);
                $stmt->bindparam(':prodi', $prodi);
                $stmt->bindparam(':jurusan', $jurusan);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':namat', $namat);
                
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function getMahasiswa(){
            try{
            $sql = "SELECT * FROM mahasiswa m inner join seminar s on m.id_seminar = s.id_seminar";
            $result = $this->db->query($sql);
            return $result;
            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
           }
        }
        public function getMahasiswa2(){
            try{
            $sql = "SELECT * FROM mahasiswa m inner join tukper t on m.id_tukper = t.id_tukper";
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
       public function getLog(){
        try{
        $sql = "SELECT * FROM logcourse";
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
        public function editMahasiswa($id, $name, $nim, $prodi, $jurusan, $email, $namas){
            try{ 
                $sql = "UPDATE mahasiswa SET nama_mhs=:nama_mhs, nim=:nim, prodi=:prodi, jurusan=:jurusan, email=:email, id_seminar=:namas WHERE id_mhs = :id"; 
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':nama_mhs', $name);
                $stmt->bindparam(':nim', $nim);
                $stmt->bindparam(':prodi', $prodi);
                $stmt->bindparam(':jurusan', $jurusan);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':namas', $namas);
                $stmt->execute();
                return true;
            } catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function editMahasiswa2($id, $name, $nim, $nik, $ipk, $semester, $prodi, $jurusan, $email, $namat){
            try{ 
                $sql = "UPDATE mahasiswa SET nama_mhs=:nama_mhs, nim=:nim, nik = :nik, ipk=:ipk, semester=:semester, prodi=:prodi, jurusan=:jurusan, email=:email, id_tukper=:namat WHERE id_mhs = :id"; 
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':nama_mhs', $name);
                $stmt->bindparam(':nim', $nim);
                $stmt->bindparam(':nik', $nik);
                $stmt->bindparam(':ipk', $ipk);
                $stmt->bindparam(':semester', $semester);
                $stmt->bindparam(':prodi', $prodi);
                $stmt->bindparam(':jurusan', $jurusan);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':namat', $namat);
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
        public function deleteMahasiswa($id){
            try{ 
                $sql = "delete from mahasiswa where id_mhs = :id";
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
        public function getMahasiswaDetails($id){
            try{
            $sql = "SELECT * FROM mahasiswa m inner join seminar s on m.id_seminar = s.id_seminar where id_mhs = :id";            
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
        public function getMahasiswa2Details($id){
            try{
            $sql = "SELECT * FROM mahasiswa m inner join tukper t on m.id_tukper = t.id_tukper where id_mhs = :id";            
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
        public function getSeminar(){
            try{
            $sql = "SELECT * FROM seminar";
            $result = $this-> db->query($sql);
            return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function getSeminarById($namas){
            try{
                $sql = "SELECT * FROM seminar where id_seminar = :namas";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':namas', $namas);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function getTukperById($namat){
            try{
                $sql = "SELECT * FROM tukper where id_tukper = :namat";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':namat', $namat);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function getTukper(){
            try{
            $sql = "SELECT * FROM tukper";
            $result = $this-> db->query($sql);
            return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>