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
  
        $name = "";
        $username = "";
        $password = "";
        $re_password = "";
        $salary = "";
        
        if(isset($_POST['submit']))
        {
            $n = $_POST['name'];
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $re_pass = $_POST['confirm_password'];
            $sal = $_POST['salary'];
            
            if(empty($n))
            {
                $name = "Please Enter Name";
            }
            
            if(empty($user))
            {
                $username = "Please Enter Username";
            }
            
            if(empty($pass))
            {
                $password = "Please Enter Password";
            }
            
            if(empty($re_pass))
            {
                $re_password = "Please Enter Confirm Password";
            }
            
            if(empty($sal))
            {
                $salary = "Please Enter Salary And Salary Must Be Greater Than Zero(0)";
            }
            
            if(!empty($n))
            {
                if(!preg_match("/^[a-zA-Z ]+$/", $n))
                {
                    $name = "Please Enter Full Name And Contain Only Alphabets";
                }
            }
            
            if(!empty($user))
            {
                if(!preg_match("/^^[a-zA-Z0-9_-]{3,15}$/", $user))
                {
                    $username = "Please Enter Like [ Emp_Name_123 ] And Maximum 15 Character";
                }
            }
            
            if(!empty($sal))
            {
                if(!preg_match("/^(0|[1-9]\d*)$/", $sal))
                {
                    $salary = "Please Enter Valid Salary And Salary Must Be in Numeric Value";
                }
            }
            
            if(!(empty($pass)))
            {
                if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$pass))
                {
                    $password = "Please Enter Valid Password And Minimum 8 Character";
                }
            }
            
            
            if(!(empty($pass)) && !(empty($re_pass)))
            {
                if($re_pass != $pass)
                {
                    $re_password = "Password & Repassword Must Be Same";
                }
            }
            
            if(!empty($n) && preg_match("/^[a-zA-Z ]+$/", $n) && !empty($user) && preg_match("/^^[a-zA-Z0-9_-]{3,15}$/", $user) && !empty($pass) && !empty($re_pass) && preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$pass) && $pass == $re_pass && !empty($sal) && !empty($re_pass) && preg_match("/^(0|[1-9]\d*)$/",$sal))
            {
                $query = "INSERT INTO tbl_user(name,username,password,role,salary,status) VALUES ('$n','$user','$pass','Employee','$sal','A')";
                
                $result = mysqli_query($conn, $query);
                
                if($result == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Emplyee Add Sucessfully..',showConfirmButton: false,timer: 1500 }) </script>"; 
                }
                
                else 
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'error',title: 'Emplyee Not Add Sucessfully..',showConfirmButton: false,timer: 1500 }) </script>"; 
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
                                        <h3 class="mb-0 text-center">Add New Employee</h3>
                                    </div>
                                    
                                    <br>
                                    
                                    <center>
                                    <div class="card-body" style="width: 80%;">

                                        
                                        <form action="#" method="post">
                                            
                                            <h5 style="float: left;"><li class="fa fa-user"></li>&nbsp;  Name Of Employee</h5>

                                            <div class="input-group mb-3">

                                                <input type="text" class="form-control" placeholder="Enter Name Of Employee *" name="name" value="<?php if(isset($n)){echo "$n";} ?>"/>  
                                                
                                               
                                            </div>
                                            
                                            <br>
                                            
                                            <h5 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$name"; ?></h5>
                                            
                                            <br>
                   
                                            <h5 style="float: left;"><li class="fa fa-user"></li>&nbsp;  Username For Employee</h5>

                                            <div class="input-group mb-3">

                                                <input type="text" class="form-control" placeholder="Enter Username For Employee *" name="username" value="<?php if(isset($user)){echo "$user";} ?>"/>  
                                                
                                               
                                            </div>
                                            
                                            <br>
                                            
                                            <h5 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$username"; ?></h5>
                                            
                                            <br>

                                            <h5 style="float: left;"><li class="fa fa-key"></li>&nbsp;  Password For Employee</h5>

                                            <div class="input-group mb-3">

                                                <input type="password" class="form-control" placeholder="Enter Password For Employee *" name="password" value="<?php if(isset($pass)){echo "$pass";} ?>" />    
                                            
                                            </div>
                                            
                                            <br>
                                            
                                            <h5 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$password"; ?></h5>
                                            
                                            <br>

                                            <h5 style="float: left;"><li class="fa fa-key"></li>&nbsp; Confirm Password For Employee</h5>

                                            <div class="input-group mb-3">

                                                <input type="password" class="form-control" placeholder="Enter Confirm Password For Employee *" name="confirm_password" value="<?php if(isset($re_pass)){echo "$re_pass";} ?>" />    
                                            
                                            </div>
                                            
                                            <br>
                                            
                                            <h5 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$re_password"; ?></h5>
                                            
                                            <br>
                                            
                                            
                                            <h5 style="float: left;"><li class="fa fa-rupee"></li>&nbsp;  Salary For Employee</h5>

                                            <div class="input-group mb-3">

                                                <input type="text" class="form-control" placeholder="Enter Salary For Employee *" name="salary" value="<?php if(isset($sal)){echo "$sal";} ?>"/>  
                                                
                                               
                                            </div>
                                            
                                            
                                            <br>
                                            
                                            <h5 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$salary"; ?></h5>
                                            
                                            <br>
                                            
                                            <div class="col text-center">

                                                <input type="submit" class="btn btn-primary" value="Add Employee" name="submit" style="height: 45px;border-radius: 5px;"/>

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