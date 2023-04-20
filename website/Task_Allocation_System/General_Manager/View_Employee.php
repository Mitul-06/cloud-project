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
            
            <h2 class="text-center">Employee Details..</h2>
            
            <br><br>
            
            <?php
                    
                    
                include_once '../connectionDB.php';

                


                $sql = "SELECT * FROM tbl_user where role = 'Employee' order by user_id";

                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){

            ?> 
            
            <table class="table">
                
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Pending Task</th>
                    <th scope="col">Complete Task</th>
                    <th scope="col">Total Attempt Task</th>
                    <th scope="col">Increase Salary</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php   
                
                $sr = 1;

                while($row = mysqli_fetch_array($result))
                {
                    $user_id = $row['user_id'];
                    
                    echo "<tr>";
                    
                        echo "<th>" . $sr . "</th>";
                        
                        echo "<td>" . $row['name'] . "</td>";
                        
                        echo "<td>" . $row['username'] . "</td>";
                         
                        echo "<td>" . $row['salary'] . "</td>";
                        
                        
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

                        
                        
                        echo "<td>" . $pending . "</td>";
                        
                        echo "<td>" . $complete . "</td>";
                        
                        echo "<td>" . $total_task . "</td>";
                        
                        echo "<td>";
                            echo "<a href='Increase_Salary.php?user_id=". $row['user_id'] ."' ><button type='button' class='btn-primary' style='height:35px;'><i class='fa fa-edit'></i>  Increase  Salary</button></a>";
                        echo "</td>";
                    
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