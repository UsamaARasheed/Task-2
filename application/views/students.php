<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>CRUD By AJAX</title> 
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  
  
    </head>
	
   <body> 
 

	<div class="container mt-4">
    <button  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add New</button><br><br>
    <table id="example" class="table" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>Student's ID</th>
                <th>Student's Name</th>
                <th>Student's Age</th>
                <th>Student's Gender</th>
                <th>Update</th>
                <th>Delete</th>
                
            </tr>
        </thead>
        <tbody>
           
           <?php
                
                /*foreach ($records as $st) {
                    
                    echo "<tr>";
                    echo "<td>".$st->id."</td>";
                    echo "<td>".$st->sname."</td>";
                    echo "<td>".$st->sage."</td>";
                    echo "<td>".$st->sgender."</td>";
                    echo "</tr>";

                    }*/
               ?>
            
        </tbody>
        <tfoot>
        <tr>
                <th>Student's ID</th>
                <th>Student's Name</th>
                <th>Student's Age</th>
                <th>Student's Gender</th>
                <th>Update</th>
                <th>Delete</th>
                
            </tr>   
    </table>
<!-- Modal For Editing Student -->

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
    <div class="container">
      <form id="update" method="POST" action="update">
<label for="form-label">Student Name</label>
        <input type="hidden" id="id">
    <input type="text" id="sname" name="sname" required   class="form-control">
    <br>
    <label for="form-label">Student Age</label>
    <input type="number"  id="sage" name="sage" required   class="form-control">
    <br>
 
    
    <br>

</div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Modal For Adding Student -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-body">
       
    <div class="container mt-4">

<form id="create" method="POST" action="store" >
<label for="form-label">Student Name</label>
    <input type="text" name="sname" id="ename" required   class="form-control">
    <br>
    <label for="form-label">Student Age</label>
    <input type="number" id="eage" required   class="form-control">
    <br>
    <label for="form-label">Gender</label>
    <select   id="egender" class="form-control">
        <option selected value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    
    <br>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <button  type="submit" id="close"  class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
            
    </div>	
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/scripts.js"></script>
    <script type="text/javascript">
    
    
    //To Get/View Data

     getdata('#example','test/showStudents');

    //To Get/View Data


    //To Submit/Insert Data

    $('#create').submit(function(e){
           
        e.preventDefault();
        var sname=$('#ename').val();
        var sage=$('#eage').val();
        var sgender=$('#egender').val();

       realtime('POST','test/store',{sname:sname,sage:sage,sgender:sgender},function(){

      $('#ename').val("");
      $('#eage').val("");

      $('#example').DataTable().ajax.reload();
      $('#exampleModal').modal('toggle');
      return false;

         });

      });

      
    //To Submit/Insert Data


    
    //To Remove/Destroy Data


       function destroy(id)
       { 

        var r = confirm("Do You Really Want to Delete this Record?");

            if (r == true) 
            {

                realtime('POST','test/destroy',{id:id},function(){

                $('#example').DataTable().ajax.reload();
                    return false;

              });
                
            } 

            else 
            {
                
                console.log("Cancelled");
            }

          
            
       }


       
    //To Remove/Destroy Data


    
    //To Edit and Update Data

       
        $("#example").on('click','.btnEdit',function(){
     
        var currentRow = $(this).closest("tr")[0]; 
        var cells = currentRow.cells;

        var firstCell = cells[0].textContent;
        var secondCell = cells[1].textContent;
        var thirdCell = cells[2].textContent;

        $('#id').val(firstCell);
        $('#sname').val(secondCell);
        $('#sage').val(thirdCell);

      });

        


            $('#update').submit(function(e){
              e.preventDefault();

            var id=$('#id').val();   
            var sname=$('#sname').val();
            var sage=$('#sage').val();
          

             realtime('POST','test/update',{id:id,sname:sname,sage:sage},function(){

              $('#example').DataTable().ajax.reload();
              $('#editModal').modal('toggle');
              return false;

           });


        });

       
    //To Edit and Update Data


    </script>

   
   </body>
	
</html>