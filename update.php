<?php

include 'model.php';

if (isset($_POST['update'])){
                
    if(isset($_POST['edit_nombre'])
      && isset($_POST['edit_celular']) 
      && isset($_POST['edit_email']) 
      && isset($_POST['edit_id'])){

        if (!empty($_POST['edit_nombre']) 
           && !empty($_POST['edit_celular']) 
           && !empty($_POST['edit_email']) 
           && !empty($_POST['edit_id'])){
         
            
         $data['edit_id'] = $_POST['edit_id'];   
         $data['edit_nombre'] = $_POST['edit_nombre'];
         $data['edit_celular'] = $_POST['edit_celular'];
         $data['edit_email'] = $_POST['edit_email'];

        $model = new Model();
        
        $update = $model->update($data);
        
        }else{
            echo "
            <script>alert('empty fields');</script>
            ";
        }

    }
}





?>