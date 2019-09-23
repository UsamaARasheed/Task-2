


    <div class="container mt-4">


<h1>Updating.....</h1>



<?php echo form_open('test/update/'.$students['id']);?>
<label for="form-label">Student Name</label>
    <input type="text" name="sname" value="<?php echo $students['sname'];?>"  class="form-control">
    <br>
    <label for="form-label">Student Age</label>
    <input type="number" value="<?php echo $students['sage'];?>" name="sage" class="form-control">
    <br>
    <label for="form-label">Gender</label>
    <select name="sgender" class="form-control">
        <?php
            if($students['sgender']=="Male")
            {
        ?>   
    
        <option selected value="Male">Male</option>
        <option value="Female">Female</option>

        <?php
        
            }

            else {
                
            
        
        ?>
            <option value="Male">Male</option>
            <option selected value="Female">Female</option>
        <?php
        
            }
        
        ?>

    </select>
    
    <br>
    <input type="submit" class="btn btn-primary">


</form>
    


</div>

