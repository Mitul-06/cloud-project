<?php

session_start();

if($_SESSION['username']!=NULL && $_SESSION['user']=="Employee")
{

?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <script src="../jquery.min.js" type="text/javascript"></script>
  <script src="../sweetalert2.all.min.js" type="text/javascript"></script>
  <title>Task Allocation System</title>

 
  
</head>

<body id="page-top">

  <!-- Navigation -->
    <?php
    
    include_once './header.php';
    
    ?>
  
    <?php
        
        include_once '../connectionDB.php';
        
        $user_id = $_SESSION['user_id'];
  
        if(isset($_SESSION['check']))
        {
            if($_SESSION['check'] == 1)
            {
                 echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Login Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
                
                $_SESSION['check'] = 0;
            }
        }
        
        
        $query = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
                                                            
        $res = mysqli_query($conn, $query);

        while($row1 = mysqli_fetch_assoc($res))
        {
            $name =  $row1['name'];
            $role = $row1['role'];
        }
    ?>
  
  <section id="info">
      
        <div class="container">  
            
            <h5 class="float-right"> <b> <?php echo $role; ?> </b></h5>
            
            <br><br>
            
            <h5 class="float-right"> <i class="fa fa-user"></i>&nbsp;<b> Welcome <?php echo $name; ?> </b></h5>
            
            <br><br>
            
            <h2 class="text-center">Personal Information..</h2>
           
            <br><br>
            
            <?php
               
                
                $query = "SELECT COUNT(t.status) as total FROM tbl_user as u INNER JOIN tbl_take_task as t ON u.user_id = t.user_id WHERE u.user_id = '$user_id' AND t.status = 'Pending'";
                                                            
                $res = mysqli_query($conn, $query);

                while($row1 = mysqli_fetch_assoc($res))
                {
                    $pending =  $row1['total'];
                }
                
                $query = "SELECT COUNT(t.status) as total FROM tbl_user as u INNER JOIN tbl_take_task as t ON u.user_id = t.user_id WHERE u.user_id = '$user_id' AND t.status = 'Complete'";
                                                            
                $res = mysqli_query($conn, $query);

                while($row1 = mysqli_fetch_assoc($res))
                {
                    $complete =  $row1['total'];
                }
                
                $query = "SELECT COUNT(t.task_id) as total FROM tbl_user as u INNER JOIN tbl_take_task as t ON u.user_id = t.user_id WHERE u.user_id = '$user_id'";
                                                            
                $res = mysqli_query($conn, $query);

                while($row1 = mysqli_fetch_assoc($res))
                {
                    $total_task =  $row1['total'];
                }
                
                
                

                $sql = "SELECT * FROM tbl_user where role = 'Employee' and user_id = '$user_id'";

                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){

            ?> 
            
            <table class="table">
                
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Total Pending Task</th>
                    <th scope="col">Total Complete Task</th>
                    <th scope="col">Total Take Task</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php   
                
                $sr = 1;

                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    
                        echo "<th>" . $sr . "</th>";
                        
                        echo "<td>" . $row['name'] . "</td>";
                        
                        echo "<td>" . $row['username'] . "</td>";
                        
                        echo "<td>" . $row['password'] . "</td>";
                         
                        echo "<td>" . $row['salary'] . "</td>"; 
                        
                        echo "<td>" . $pending . "</td>";
                        
                        echo "<td>" . $complete . "</td>";
                        
                        echo "<td>" . $total_task . "</td>";
                        
                    echo "</tr>";
                    
                    $sr++;
                }
                
                ?>
                  
                </tbody>
              </table>
            
            
            <?php
                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "<p class='lead'><em>No records were found.</em></p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($$conn);
            }


            ?>

        </div>
      
  </section>

  <br><br><br>
  

  <!-- Footer -->
    <!-- <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Task Allocation System 2020 | Design By : Dhruv Ambaliya</p>
      </div>
    </footer> -->
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


<?php

}

 else {
    header("Location:../index.php");
   
}


?>