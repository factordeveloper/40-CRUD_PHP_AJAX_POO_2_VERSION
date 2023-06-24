<?php
     include_once ('dataConex.php');
     
    class Model{
        private $conexion;
        public function __construct(){
            try {
                $this->conexion = new PDO("mysql:host=".SERVER.";dbname=".DBNAME, USER, PASSWORD);
                //  $conexion = new PDO("pgsql:host=".SERVER.";port=".PORT.";dbname=".DBNAME, USER, PASSWORD);
                 //return $conexion;
             } catch (Exception $err) {
                 die("el error es ". $err->getMessage());
             }

        }

       

        public function insert(){
            if (isset($_POST['submit'])){
                
                if(isset($_POST['nombre']) 
                && isset($_POST['celular'])
                && isset($_POST['email'])){

                    if (!empty($_POST['nombre']) 
                    && !empty($_POST['celular'])
                    && !empty($_POST['email'])){

                     $nombre = $_POST['nombre'];
                     $celular = $_POST['celular'];
                     $email = $_POST['email'];


                     $query = "INSERT INTO ajax_crud (nombre, celular, email)  VALUES ('$nombre', '$celular', '$email')";

                     if ($sql= $this->conexion->exec($query)) {
                        echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                         ¡¡¡ REGISTRO AGREGADO !!!
                       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                        ";
                     }else{
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                          ERROR :(
                       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                        ";
                         
                     }
                    }else{
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        ¡¡¡  COMPLETA LOS CAMPOS !!!
                       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                        ";
                    }

                }
            }
    }

     public function fetch(){

        $data = null;

        $stmt = $this->conexion->prepare("SELECT * FROM ajax_crud");

        $stmt ->execute();

        $data = $stmt->fetchAll();

        return $data;
     }

     public function del($del_id){
         $query = "DELETE FROM ajax_crud WHERE id = '$del_id'";

         if($sql = $this->conexion->exec($query)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
              REGISTRO BORRADO
           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
            ";
         }else{
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
              ERROR AL BORRAR
           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
            ";
         }
     }

    public function read($read_id){
        $data=null;

        $stmt = $this->conexion->prepare("SELECT * FROM ajax_crud WHERE id='$read_id'");

        $stmt->execute();

        $data = $stmt->fetch();

        return $data;

    }

    public function edit($edit_id){
        $data =null;

        $stmt = $this->conexion->prepare("SELECT * FROM ajax_crud WHERE id='$edit_id'");

        $stmt->execute();

        $data = $stmt->fetch();

        return $data;
    }

    public function update($data){
        
        $query = "UPDATE ajax_crud SET nombre='$data[edit_nombre]', 
                                      celular='$data[edit_celular]', 
                                      email='$data[edit_email]'
        WHERE id='$data[edit_id]'";

        if ($sql = $this->conexion->exec($query)) {
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
              Record Updated
           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

        <script>
         $('#exampleModall').modal('hide')
        
        </script>
            ";
         }else{
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
              Failed
           <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
            ";
        
         
        }

    }


    }




?>