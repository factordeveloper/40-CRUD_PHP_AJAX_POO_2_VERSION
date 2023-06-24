<?php

include('model.php');

$model = new Model();

$rows = $model->fetch();



?>

<table class="table">
    <thead>
        <tr>

        <th>ID</th>
        <th>NOMBRE</th>
        <th>CELULAR</th>
        <th>EMAIL</th>
        <th>ACCIONES</th>

        </tr>
    </thead>
<tbody>
    <?php

        $i = 1;
        if (!empty($rows)){
            foreach($rows as $row){  ?>

        <tr>

        <td><?php echo $i++; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['celular']; ?></td>
        <td><?php echo $row['email']; ?></td>

        <td>    
            <button href="" id="read" class="bg bg-info" value="<?php echo $row['id'];?>"data-bs-toggle="modal" data-bs-target="#fetch_single"><b>VER</b></button>
            <button href="" id="del" class="bg bg-danger" value="<?php echo $row['id'];?>"><b>BORRAR</b></button>
            <button href="" id="edit" class="bg bg-warning" value="<?php echo $row['id'];?>"data-bs-toggle="modal" data-bs-target="#edit_record"><b>EDITAR</b></button>
        </td>
        

        </tr>

         <?php   
         }
        }else{
            echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                          NO DATA
                       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                        ";
        }



 ?>
</tbody>
</table>