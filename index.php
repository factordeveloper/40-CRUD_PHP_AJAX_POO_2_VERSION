<!doctype html>
<html lang="en">
  <head>
    <title>Proyecto CRUD JQUERY</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-12 mt-5">
                  <h1 class="text-center">CRUD AJAX - JQUERY</h1>
                 <hr style="height: 1px; color: black;background-color:black">
              </div>
          </div>
          <div id="result"></div>
          
        <!-- Modal trigger button -->
        <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#crear">
          CREAR
        </button>
        
        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="crear" tabindex="-1"  data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">CREAR PERSONA</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
              <form action="" method="POST" id="form">
                     
                      <div class="form-group">
                       <label for="nombre">NOMBRE</label>
                       <input type="text" name="nombre" id="nombre" class="form-control" required>
                      </div>


                      <div class="form-group">
                      <label for="foto">CELULAR</label>  
                      <input type="number" name="celular" id="celular" class="form-control">
                      </div>

                      <div class="form-group">
                      <label for="email">EMAIL</label>  
                      <input type="email" name="email" id="email" class="form-control">
                      </div>

                    
              </div>
              <div class="modal-footer">
              <div class="form-group">
                          <button type="submit" id="submit" name="submit" class="btn btn-success" data-bs-dismiss="modal">REGISTRAR</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
        
        
      

          <div class="row">
              <div class="col-md-12 mt-1">
             
                  <div id="show"></div>
                  <div id="fetch"></div>
              </div>
          </div>



      </div>



<!-- Modal -->
<div class="modal fade" id="fetch_single" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRO INDIVIDUAL</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="read_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CERRAR</button>
        
      </div>
    </div>
  </div>
</div>





<!-- Edit Modal -->
<div class="modal fade" id="edit_record" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="edit_data"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CERRAR</button>
        <button type="button" class="btn btn-success" id="update" data-bs-dismiss="modal">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
<script>
    $(document).on("click", "#submit", function(e){
        e.preventDefault();
        
        var nombre = $("#nombre").val();
        var celular = $("#celular").val();
        var email = $("#email").val();
        var submit = $("#submit").val();

      $.ajax({
          url: "insert.php",
          type: "post",
          data: {
              nombre:nombre,
              celular:celular,
              email:email,
              submit:submit
          },
          success: function(data){
              fetch();
              $("#result").html(data);
          }
      })

        $("#form")[0].reset();
    });
    //Fetch Recors

    function fetch(){

        $.ajax({
          url: "fetch.php",
          type: "post",
          success: function(data){
              $("#fetch").html(data);
          }
        });
    }
fetch();

// DELETE RECORD

$(document).on("click","#del",function(e){
    e.preventDefault();

   if(window.confirm("deseas eliminar esto ??")){

    var del_id = $(this).attr("value");

$.ajax({
    url: "del.php",
    type: "post",
    data: {
        del_id:del_id
    },
    success: function(data){
        fetch();
        $("#show").html(data);
    }
});
   }else{
       return false;
   }

 
});

//Read Record

$(document).on("click","#read", function(e){
    e.preventDefault();
    
    var read_id = $(this).attr("value");

    $.ajax({
        url: "read.php",
        type: "post",
        data: {
            read_id:read_id
        },
        success: function(data){
            $("#read_data").html(data);
        }
    });
});



// Edit record

$(document).on("click","#edit", function(e){
  e.preventDefault();
  var edit_id = $(this).attr("value");

    $.ajax({
        url:"edit.php",
        type: "post",
        data: {
            edit_id:edit_id
        },
        success: function(data){
            $("#edit_data").html(data);
        }
    });
    
});

//Update Record

$(document).on("click","#update", function(e){
  e.preventDefault();
  
  var edit_nombre = $("#edit_nombre").val();
  var edit_celular = $("#edit_celular").val();
  var edit_email = $("#edit_email").val();
  var update = $("#update").val();
  var edit_id = $("#edit_id").val();

 

  $.ajax({
    url: "update.php",
    type: "post",
    data: {
      edit_id:edit_id,
      edit_nombre:edit_nombre,
      edit_celular:edit_celular,
      edit_email:edit_email,
      update:update
    },
    success: function(data){
      fetch();
      $("#show").html(data);
    }
  });


});

</script>


</body>
</html>
