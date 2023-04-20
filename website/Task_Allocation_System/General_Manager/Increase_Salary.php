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
            
            $user_id = $_GET['user_id'];
        ?>
        
        <?php
        
            include_once '../connectionDB.php';
  
            $salary = "";

            if(isset($_POST['submit']))
            {
                
                $sal = $_POST['salary'];

                if(empty($sal))
                {
                    $salary = "Please Enter Salary And Salary Must Be Greater Than Zero(0)";
                }

                if(!empty($sal))
                {
                    if(!preg_match("/^(0|[1-9]\d*)$/", $sal))
                    {
                        $salary = "Please Enter Valid Salary And Salary Must Be in Numeric Value";
                    }
                }

                if(!empty($sal) && preg_match("/^(0|[1-9]\d*)$/",$sal))
                {
                    $query = "select salary from tbl_user where user_id = '$user_id'";
                    
                    $result = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $old_salary = $row['salary'];
                    }
                    
                    if($sal > $old_salary)
                    {
                        $query1 = "UPDATE tbl_user SET salary = '$sal' where user_id = '$user_id'";

                        $result1 = mysqli_query($conn, $query1);

                        if($result1 == 1)
                        {
                            echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Salary Increase Successfully..',showConfirmButton: false,timer: 1500 }) </script>"; 
                        }

                        else 
                        {
                            echo "<script>Swal.fire({position: 'center',icon: 'error',title: 'Salary Not Increase Successfully..',showConfirmButton: false,timer: 1500 }) </script>";  
                        }
                    }
                    
                    else 
                    {
                        $salary = "Salary Must Be Greater Than $old_salary";
                    }
                    
                    
                    
                }

                
            }
        
        
        ?>
        
        
        
         <br><br>
        
         <div class="container" style="padding-left: 10%;">
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
                                        <h3 class="mb-0 text-center">Increase Salary Of Employee</h3>
                                    </div>
                                    
                                    <br>
                                    
                                    <center>
                                    <div class="card-body" style="width: 80%;">

                                        
                                        <form action="#" method="post">
                                            
                                            
                                            <h5 style="float: left;"><li class="fa fa-rupee"></li>&nbsp;  Salary For Employee</h5>

                                            <div class="input-group mb-3">

                                                <input type="text" class="form-control" placeholder="Enter Salary For Employee *" name="salary" value="<?php if(isset($sal)){echo "$sal";} ?>"/>  
                                                
                                               
                                            </div>
                                            
                                            
                                            <br>
                                            
                                            <h5 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$salary"; ?></h5>
                                            
                                            <br>
                                            
                                            <div class="col text-center">

                                                <input type="submit" class="btn btn-primary" value="Increase Salary" name="submit" style="height: 45px;border-radius: 5px;"/>

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