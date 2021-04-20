<?php
    class crud{
        private $db;
        function __construct($conn){
            $this->db = $conn;
        }
        public function insertAttendees($nama_mhs, $nim, $prodi, $jurusan, $ipk, $semester, $email){
            try{
                $sql = "INSERT INTO mahasiswa (nama_mhs, nim, prodi, jurusan, ipk, semester, email) VALUES (:nama,:nim,:prodi,:jurusan,:ipk,:semester,:email)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':nama', $nama_mhs);
                $stmt->bindparam(':nim', $nim);
                $stmt->bindparam(':prodi', $prodi);
                $stmt->bindparam(':jurusan', $jurusan);
                $stmt->bindparam(':ipk', $ipk);
                $stmt->bindparam(':semester', $semester);
                $stmt->bindparam(':email', $email);
                
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function insertCourse($namac, $linkc, $hargas, $durasic, $level){
            try{
                $sql = "INSERT INTO course (nama_crs, link, harga_crs, durasi_crs, level) VALUES (:namac,:linkc,:hargas,:durasic,:level)";
                $stmt = $this->db->prepare($sql);

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
    }
?>