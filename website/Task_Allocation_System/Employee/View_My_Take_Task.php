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

    <style>
        a.disabled {
              pointer-events: none;
              cursor: default;
            }
    </style>
  
</head>

<body id="page-top">

  <!-- Navigation -->
    <?php
    
    include_once './header.php';
    
    ?>
  
    <?php
        
        include_once '../connectionDB.php';
        
        if(isset($_SESSION['complete_task']))
        {
            if($_SESSION['complete_task'] == 1)
            {
                echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Task Complete Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
                
                $_SESSION['complete_task'] = 0;
            }
        }
        
        $user_id = $_SESSION['user_id'];
  
    ?>
  
  
  <section id="taken_task" class="bg-light">
      
         <div class="container">  
            
            <h2 class="text-center">Take My All Task Details..</h2>
            
            <br>
            
            <h6 class="text-center" style="color: black"><b>[ You Can Complete Your Task On Or Before Task Completion Date. After That You Can't Be Able To Complete Your Task. ]</b></h6>
            
            
            <br><br>
            
            
            
            <?php
                    

                $sql = "SELECT p.title,p.description,p.month,t.task_complete_date,t.status,t.complete_task,t.task_id,u.user_id FROM tbl_user as u INNER JOIN tbl_take_task as t ON u.user_id = t.user_id INNER JOIN "
                        . "tbl_project_work as p ON t.project_id = p.project_id WHERE u.user_id = '$user_id'";
                
                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){

            ?> 
            
            <table class="table">
                
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Project title</th>
                    <th scope="col">Project Description</th>
                    <th scope="col">Time Duration</th>
                    <th scope="col">Task Completion Date</th>
                    <th scope="col">Task Status</th>
                    <th scope="col">Complete Your Task</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php   
                
                $sr = 1;

                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    ?>
                    
                        <td><?php echo $sr; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['month'] ."&nbsp; Months" ; ?></td>
                        <td><?php echo $row['task_complete_date']; ?></td>
                        
                    <?php   
                    
                    $date = date("Y/m/d");
                    
                   
                    if($date < $row['task_complete_date'])
                    {
                        if($row['status'] == "Pending" && $row['complete_task'] == "")
                        {
                            echo "<td style='color:red;'><b>" . $row['status'] . "</b></td>";
                            echo "<td>";
                                echo "<a class='btn btn-primary' href='Complete_Project.php?task_id=". $row['task_id'] ."'><i class='fa fa-edit'></i>  Complete Task</button></a>";
                            echo "</td>";
                        }
                        else 
                        {
                            echo "<td style='color:green;'><b>" . $row['status'] . "</b></td>";
                            echo "<td>";
                                echo "<a class='btn btn-primary disabled' href='Complete_Project.php?task_id=". $row['task_id'] ."'><i class='fa fa-edit'></i>  Complete Task</button></a>";
                            echo "</td>";
                        }
                    }
                    else 
                    {
                        if($row['status'] == "Pending")
                        {
                            echo "<td style='color:red;'><b>" . $row['status'] . "</b></td>";
                        }
                        else 
                        {
                            echo "<td style='color:green;'><b>" . $row['status'] . "</b></td>";
                        }
                        echo "<td>";
                        echo "<a class='btn btn-primary disabled' href='Complete_Project.php?task_id=". $row['task_id'] ."'><i class='fa fa-edit'></i>  Complete Task</button></a>";
                        echo "</td>";
                    }
                    
                    
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
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Task Allocation System 2020 | Design By : Dhruv Ambaliya</p>
    </div>
    <!-- /.container -->
  </footer>

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