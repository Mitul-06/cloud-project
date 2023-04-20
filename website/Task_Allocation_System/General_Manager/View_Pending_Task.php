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
        
        <title>Task Allocation System</title>
    </head>
    <body>
        <?php
            include_once './Menu.php';
        ?>
        
        <div class="container" style="padding-top: 5%;padding-left: 10%;">  
            
            <h2 class="text-center">View All Pending Project Task...</h2>
            
            <br><br>
            
            <?php
                    
                    
                include_once '../connectionDB.php';


                $sql = "SELECT u.name,u.username,p.title,p.description,p.month,t.task_complete_date,t.status FROM tbl_user as u INNER JOIN tbl_take_task as t ON u.user_id = t.user_id INNER JOIN "
                        . "tbl_project_work as p ON t.project_id = p.project_id WHERE t.status = 'Pending'";

                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){

            ?> 
            
            <table class="table">
                
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Project Title</th>
                    <th scope="col">Project Description</th>
                    <th scope="col">Project Completion Month</th>
                    <th scope="col">Task Completion Date</th>
                    <th scope="col">Status</th>
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
                         
                        echo "<td>" . $row['title'] . "</td>";
                        
                        echo "<td>" . $row['description'] . "</td>";
                        
                        echo "<td>" . $row['month'] ."&nbsp; Months". "</td>";
                        
                        echo "<td>" . $row['task_complete_date'] . "</td>";
                        
                        echo "<td style='color:red;'><b>" . $row['status'] . "</b></td>";
                    
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

            // Close connection
            mysqli_close($conn);

            ?>

        </div>
        
    </body>
</html>


<?php

}

 else {
    header("Location:../index.php");
   
}


?>