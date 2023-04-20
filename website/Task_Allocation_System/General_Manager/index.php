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
        
            if(isset($_SESSION['check']))
            {
                if( $_SESSION['check'] == 1)
                {
                    echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Login Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
                    
                    $_SESSION['check'] = 0;
                }
            }
            
            include_once './Menu.php';
            
            include_once '../connectionDB.php';
            
            $user_id = $_SESSION['user_id'];
            
            $query = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
                                                            
            $res = mysqli_query($conn, $query);

            while($row1 = mysqli_fetch_assoc($res))
            {
                $name =  $row1['name'];
            }
        ?>
            
        <br><br>
        
        <h2 class="text-center">General Manager</h2>
            
       
        <div class="content" style="height: 500px; padding-left: 17%;">
            
            <h4 class="float-right" style="padding-right: 10%; "> <i class="fa fa-user"></i>&nbsp;<b> Welcome <?php echo $name; ?> </b></h4>
            
            <br><br><br><br>
            
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    
                                    <a href="View_Employee.php">
                                    
                                    
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><i class="fa fa-user"></i>&nbsp;&nbsp;<span class="count" style="size: 50px;"><?php
                                            
                                                $sql = "select COUNT(user_id) as total from tbl_user where role = 'Employee'";
                                                            
                                                $result = mysqli_query($conn, $sql);

                                                $value = mysqli_fetch_assoc($result);

                                                $num_row = $value['total'];

                                                echo $num_row;         
                                                   
                                            ?></span></div>
                                            <div class="stat-heading">Total Employee</div>
                                        </div>
                                    </div>
                                        
                                    </a>    
                                        
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    
                                    <a href="View_Task.php">
                                    
                                    
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;<span class="count"><?php
                                            
                                                $sql = "select COUNT(project_id) as total from tbl_project_work";
                                                            
                                                $result = mysqli_query($conn, $sql);

                                                $value = mysqli_fetch_assoc($result);

                                                $num_row = $value['total'];

                                                echo $num_row;             
                                                            
                                            
                                            ?></span></div>
                                            <div class="stat-heading">Total Project Task</div>
                                        </div>
                                    </div>
                                        
                                    </a>    
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    
                                    <a href="View_Complete_Task.php">
                                    
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><i class="fa fa-bookmark-o"></i>&nbsp;&nbsp;<span class="count"><?php
                                            
                                                $sql = "SELECT COUNT(status) as total FROM tbl_take_task WHERE status = 'Complete'";
                                                            
                                                $result = mysqli_query($conn, $sql);

                                                $value = mysqli_fetch_assoc($result);

                                                $num_row = $value['total'];

                                                echo $num_row;
                                               
                                            
                                            ?></span></div>
                                            <div class="stat-heading">Total Complete Task</div>
                                        </div>
                                    </div>
                                         
                                     </a>
                                         
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    
                </div>
                
                <br><br>
                
                <div class="row">
                
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    
                                    <a href="View_Pending_Task.php">
                                    
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><i class="fa fa-question-circle"></i>&nbsp;&nbsp;<span class="count"><?php
                                            
                                                $sql = "SELECT COUNT(status) as total FROM tbl_take_task WHERE status = 'Pending'";
                                                            
                                                $result = mysqli_query($conn, $sql);

                                                $value = mysqli_fetch_assoc($result);

                                                $num_row = $value['total'];

                                                echo $num_row;
                                               
                                            
                                            ?></span></div>
                                            <div class="stat-heading">Total Pending Task</div>
                                        </div>
                                    </div>
                                         
                                     </a>
                                         
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
              
            </div>
            <!-- .animated -->
        </div>
        
    </body>
</html>


<?php

}

 else {
    header("Location:../index.php");
   
}


?>