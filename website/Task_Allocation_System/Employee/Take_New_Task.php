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
        
        if(isset($_SESSION['take_task']))
        {
            if($_SESSION['take_task'] == 1)
            {
                echo "<script>Swal.fire({position: 'center',icon: 'success',title: 'Take Task Successfully..',showConfirmButton: false,timer: 1500 }) </script>";
                
                $_SESSION['take_task'] = 0;
            }
        }
        
        $user_id = $_SESSION['user_id'];
  
    ?>
  
  
  <section id="take_New_project" class="bg-light">
      
         <div class="container">  
            
            <h2 class="text-center">Take New Task..</h2>
            
            <br>
            
            <h6 class="text-center" style="color: black"><b>[ If Project Status Is <i style="color: green;">Not Allocate</i> Then You Can Take The Task , Otherwise You Can't Take The Task. ]</b></h6>
            
            
            <br><br>
            
            
            <?php
                    
              
                $sql = "select * from tbl_project_work order by project_id";
            
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
                    <th scope="col">Project Status</th>
                    <th scope="col">Take Project</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php   
                
                $sr = 1;

                while($row = mysqli_fetch_array($result))
                {
                    $project_id = $row['project_id'];
                    
                    ?>
                    
                    <tr>
                        <td><?php echo $sr; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['month'] . "&nbsp; Months"; ?></td>
                        
                        
                    <?php   

                    $sr++;
                    
                    $query = "select * from tbl_take_task where project_id = '$project_id'";
                    $res = mysqli_query($conn, $query);
                    while($row1 = mysqli_fetch_assoc($res))
                    {
                        $pro_id = $row1['project_id'];
                        $status = $row1['status'];
                        $complete_task = $row1['complete_task'];
                    }
                    
                    
                   
                    if(isset($pro_id))
                    {
                        if($project_id == $pro_id)
                        {
                            if($complete_task != "Yes" && $status != "Complete")
                            {
                                if($status == "Pending" && $complete_task == "")
                                {
                                    echo "<td style='color:red;'><b>" . $status = "Allocated" . "</b></td>";
                                    echo "<td>";
                                        echo "<a class='btn btn-primary disabled' href='Take_Project.php?project_id=". $row['project_id'] ."'><i class='fa fa-edit'></i>  Take Project</button></a>";
                                    echo "</td>";
                                }
                                else 
                                {
                                    echo "<td style='color:green;'><b>" . "Not Allocate" . "</b></td>";
                                    echo "<td>";
                                        echo "<a class='btn btn-primary' href='Take_Project.php?project_id=". $row['project_id'] ."'><i class='fa fa-edit'></i>  Take Project</button></a>";
                                    echo "</td>";
                                }
                            }
                            
                            else 
                            {
                                echo "<td style='color:green;'><b>" . "Successfully Complete Project" . "</b></td>";
                                echo "<td>";
                                    echo "<a class='btn btn-primary disabled' href='Take_Project.php?project_id=". $row['project_id'] ."'><i class='fa fa-edit'></i>  Take Project</button></a>";
                                echo "</td>";
                            }
                            
                        }
                        else 
                        {
                            echo "<td style='color:green;'><b>" . "Not Allocate" . "</b></td>";
                            echo "<td>";
                                echo "<a class='btn btn-primary' href='Take_Project.php?project_id=". $row['project_id'] ."'><i class='fa fa-edit'></i>  Take Project</button></a>";
                            echo "</td>";
                        }
                    }
                    else 
                    {
                        echo "<td style='color:green;'><b>" . "Not Allocate" . "</b></td>";
                        echo "<td>";
                            echo "<a class='btn btn-primary' href='Take_Project.php?project_id=". $row['project_id'] ."'><i class='fa fa-edit'></i>  Take Project</button></a>";
                        echo "</td>";
                    }
                    
                    echo "</tr>";

                }
                
                ?>
                    
                   
                  
                </tbody>
              </table>
            
            <script>
                $('.btn-primary').on('click', function (e) {
                    e.preventDefault();
                    const href = $(this).attr("href")

                    swal.fire({
                        title: 'Are You Sure Take?',
                        text: 'Project will be taken and after take you will be complete this project?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Take',
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = href;
                        }

                    })
                })

            </script>
            
            
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
  
    <br><br>
  

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