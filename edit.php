<?php

include('model.php');

 $edit_id = $_POST['edit_id'];

$model = new Model();

$row = $model->edit($edit_id);

if (!empty($row)) { ?>


                <form action="" method="POST">
                      <div>
                          <input type="hidden" id="edit_id" value="<?php echo $row['id'];?>">
                      </div>
                      <div class="form-group">
                       <label for="">NOMBRE</label>
                       <input type="text" name="nombre" id="edit_nombre" class="form-control" value="<?php echo $row['nombre']?>">
                      </div>
                      <div class="form-group">
                       <label for="">CELULAR</label>
                       <input type="text" name="nombre" id="edit_celular" class="form-control" value="<?php echo $row['celular']?>">
                      </div>
                      <div class="form-group">
                       <label for="">EMAIL</label>
                       <input type="text" name="nombre" id="edit_email" class="form-control" value="<?php echo $row['celular']?>">
                      </div>
                      
                  
                  </form>

    <?php
}

?>