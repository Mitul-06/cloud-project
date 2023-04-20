<!DOCTYPE html>

<?php 

session_start();


?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <script src="jquery.min.js" type="text/javascript"></script>
  <script src="sweetalert2.all.min.js" type="text/javascript"></script>
  
  <title>Task Allocation System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" style="height: 9%;">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Task Allocation System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#login">Login</a>
                
            </li>

           
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            
          
        </ul>
      </div>
    </div>
  </nav>


  <section id="login" class="bg-light">
      
      
      <?php
        
        include_once './connectionDB.php';
  
        $username = "";
        $password = "";
        
        if(isset($_POST['submit']))
        {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            
            if(empty($user))
            {
                $username = "Please Enter Username";
            }
            
            if(empty($pass))
            {
                $password = "Please Enter Password";
            }
            
//            if(!empty($user))
//            {
//                if(!preg_match("/^^[a-zA-Z0-9_-]{3,15}$/", $user))
//                {
//                    $username="Please Enter Only Alphabet";
//                }
//            }
//            
//            if(!(empty($P)))
//            {
//                if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/",$P))
//                {
//                    $pass="Please Enter Valid Password";
//                }
//            }
            
            
            if(!empty($user) && !empty($pass))
            {
                $query = ("select * from tbl_user where username='$user' and status='A'");
                
                $result = mysqli_query($conn, $query);
                
                while($row = mysqli_fetch_assoc($result))
                {
                    if($row['role'] == "Manager")
                    {
                        if($row['username'] == $user && $row['password'] == $pass)
                        {

                                $_SESSION['user'] = "Manager";
                                $_SESSION['username'] = "$user";
                                $_SESSION['user_id'] = "$row[user_id]";
                                
                                
                                $_SESSION['check'] = 1;

                                header("Location:./General_Manager/index.php");
                        }
                        else
                        {
                            echo "<script>Swal.fire({position: 'center',icon: 'error',title: 'Username Or Password Were Wrong',showConfirmButton: false,timer: 1500 }) </script>"; 
                        }
                    }
                    
                    else 
                    {
                        if($row['username'] == $user && $row['password'] == $pass)
                        {

                                $_SESSION['user'] = "Employee";
                                $_SESSION['username'] = "$user";
                                $_SESSION['user_id'] = "$row[user_id]";
                                
                                
                                $_SESSION['check'] = 1;

                                //echo '<script>alert("Login Successfully..")</script>'; 

                                header("Location:./Employee/index.php");
                                
                        }
                        else
                        {
                            echo "<script>Swal.fire({position: 'center',icon: 'error',title: 'Username Or Password Were Wrong',showConfirmButton: false,timer: 1500 }) </script>"; 
                        }
                    }
                }
            }
            
            
        }
  ?>
  
      
      
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
            <h2 class="text-center">Login</h2>
          
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">


                        <div class="row">
                            <div class="col-md-12">
                                
                                <!-- form card login with validation feedback -->
                                <div class="card card-outline-secondary">
                                    <div class="card-header">
                                        <h3 class="mb-0 text-center">Login Into The System</h3>
                                    </div>
                                    
                                    <br>
                                    
                                    <center>
                                    <div class="card-body" style="width: 90%;">

                                        
                                        <form action="#" method="post" id="ownerlogin_form">
                   
                                            <h5 style="float: left;">Username</h5>

                                            <div class="input-group mb-3">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><li class="fa fa-user"></li></span>
                                                </div>

                                                <input type="text" class="form-control" placeholder="Your Username *" name="username" value="<?php if(isset($user)){echo "$user";} ?>"/>  
                                                
                                               
                                            </div>
                                            
                                            <br>
                                            
                                            <h6 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$username"; ?></h6>
                                            
                                            <br>

                                            <h5 style="float: left;">Password</h5>

                                            <div class="input-group mb-3">

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><li class="fa fa-key"></li></span>
                                                </div>

                                                  <input type="password" class="form-control" placeholder="Your Password *" name="password" value="<?php if(isset($pass)){echo "$pass";} ?>" />    
                                            </div>
                                            
                                            <br>
                                            
                                            <h6 class="float-left" style="color:red;margin-top:-20px;"><?php echo "$password"; ?></h6>
                                            
                                            <br>
                                            
                                            <div class="col text-center">

                                                <input type="submit" class="btn btn-primary" value="Login" name="submit" style="height: 45px;width: 20%;border-radius: 5px;"/>

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
      
  </section>
  

  <section id="services">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-8 mx-auto">
          <h2>Services we offer</h2>
          <p class="lead">
              
              <b>Welcome To Task Allocation System..</b>
              
              <br><br>
              
              You take your task using this system. If You done your task then complete your project report through the system.
              
              <br><br>
              
              You have to be finish your work on or before task completion date and submit your report after that you can't be able to complete your task report.
              
          </p>
        </div>
      </div>
    </div>
  </section>

  

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Task Allocation System 2023</p>
    </div>
  </footer>
  <!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>
