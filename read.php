<?php

include('model.php');
//echo $read_id = $_POST['read_id'];
$read_id = $_POST['read_id'];

$model = new Model();

$row = $model->read($read_id);

if(!empty($row)){ ?>

  <p>NOMBRE: <?php echo $row['nombre']; ?></p>

  <p>CELULAR: <?php echo $row['celular']; ?></p>

  <p>EMAIL:  <?php echo $row['email']; ?></p>

 
    <?php
}


?>