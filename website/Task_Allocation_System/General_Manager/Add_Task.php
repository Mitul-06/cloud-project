<?php

session_start();

if($_SESSION['username']!=NULL && $_SESSION['user']=="Manager")
{

?>


<html>
    <head>
        <meta charset="UTF-8">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        
        <script src="../jquery.min.js" type="text/javascript"></script>
        <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
        
        <title>Task Allocation System</title>
    </head>
    <body>
        
        
        <?php
            include_once './Menu.php';
        ?>
        
        
        <?php
        
        include_once '../connectionDB.php';
  
        $title = "";
        $description = "";
        $month = "";
        
        if(isset($_POST['submit']))
        {
            $t = $_POST['title'];
            $d = $_POST['description'];
            $m = $_POST['month'];
            
            if(empty($t))
            {
                $title = "Please Enter Project Title";
            }
            
            if(empty($d))
            {
                $description = "Please Enter Project Description";
            }
            
//            if(!isset($m))
//            {
//                $month = "Please Select Task Completion Month";
//            }
            
            if(empty($m))
            {
                $month = "Please Enter Task Completion Month";
            }
            
            
            if(!empty($t))
            {
                if(!preg_match("/^[a-zA-Z_ ]+$/", $t))
                {
                    $title = "Please Enter Only Alphabets";
                }
            }
            
            if(!empty($d))
            {
                if(!preg_match("/^[a-zA-Z_ ]{1,250}$/", $d))
                {
                    $description = "Please Enter Valid Description And Maximum 250 Character";
                }
            }
            
            if(!empty($m))
            {
                if(!preg_match("/^[0-9]+$/", $m))
                {
                    $month = "Please Enter Month In Numeric Value";
                }
            }
            
            
            $added_date = date("Y/m/d");
            
            //$c_date = strtotime("$added_date");
            //$complete_date = date("Y/m/d", strtotime("+$m month", $c_date));
            
            if(!empty($t) && preg_match("/^[a-zA-Z_ ]+$/", $t) && !empty($d) && preg_match("/^[a-zA-Z_ ]{1,250}$/",$d) && !empty($m) && preg_match("/^[0-9]+$/",$m))
            {
                $query = "INSERT INTO tbl_project_work(title,description,added_date,month) VALUES ('$t','$d','$added_date','$m')";
                
                $result = mysqli_query($conn, $query);
                
                if($result == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Task Add Sucessfully..',showConfirmButton: false,timer: 1500 }) </script>"; 
                }
                
                else 
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'error',title: 'Task Not Add Sucessfully..',showConfirmButton: false,timer: 1500 }) </script>"; 
                }
            }
            
            
        }
  ?>
        
        <br><br>
        
        <div class="container" style="padding-left: 5%;">
      <div class="row">
        <div class="col-lg-8 mx-auto">
            
            
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">


                        <div class="row">
                            <div class="col-md-8">
                                
                                <!-- form card login with validation feedback -->
                                <div class="card card-outline-secondary">
                                    <div class="card-header">
                                        <h3 class="mb-0 text-center">Add New Task For Employee</h3>
                                    </div>
                                    
                                    <br>
                                    
                                    <center>
                                    <div class="card-body" style="width: 80%;">

                                        
                                        <form action="#" method="post">
                   
                                            <h5 style="float: left;"><li class="fa fa-user"></li>&nbsp;  Project Title</h5>

                                            <div class="input-group mb-3">

                                                <input type="text" class="form-control" placeholder="Enter Project Title *" name="title" value="<?php if(isset($t)){echo "$t";} ?>"/>  
                                                
                                               
                                            </div>
                                            
                                            <br>
                                            
                                            <h5 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$title"; ?></h5>
                                            
                                            <br>

                                            <h5 style="float: left;"><li class="fa fa-file-text"></li>&nbsp;  Project Description</h5>

                                            <div class="input-group mb-3">

                                                <textarea name="description" placeholder="Enter Project Description" style="width:100%;" id="" cols="30" rows="5" class="form-control"><?php if(isset($d)){echo "$d";} ?></textarea>    
                                            
                                            </div>
                                            
                                            <br>
                                            
                                            <h5 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$description"; ?></h5>
                                            
                                            <br>

                                            <h5 style="float: left;"><li class="fa fa-calendar"></li>&nbsp; Task Completion Month [ Enter In Month ]</h5>

                                            <br>
                                            
                                           <div class="input-group mb-3">

                                                <input type="text" class="form-control" placeholder="Enter Completion Month *" name="month" value="<?php if(isset($m)){echo "$m";} ?>"/>  
                                                
                                               
                                            </div>
                                            
                                            <br>
                                            
                                            <h5 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$month"; ?></h5>
                                            
                                            <br>
                                            
                                            <div class="col text-center">

                                                <input type="submit" class="btn btn-primary" value="Add Task" name="submit" style="height: 45px;border-radius: 5px;"/>

                                            </div>           


                                        </form>

                                    </div>
                                    <!--/card-body-->
                                    </center>
                                    
                                </div>
                                <!-- /form card login -->

                            </div>


                        </div>
                        <!--/row-->

                    </div>
                    <!--/col-->
                </div>

            </div>
            
        </div>
      </div>
    </div>

        
    </body>
</html>


<?php

}

 else {
    header("Location:../index.php");
   
}


?>