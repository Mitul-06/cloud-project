<?php

session_start();

if($_SESSION['username']!=NULL && $_SESSION['user']=="Employee")
{

    if(isset($_GET['project_id']))
    {
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            include_once '../connectionDB.php';
        
            $project_id = $_GET['project_id'];
            
            $user_id = $_SESSION['user_id'];
            
            $query = "select * from tbl_project_work where project_id = '$project_id'";
            
            $result = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($result))
            {
                $month = $row['month'];
            }
            
            $date = date("Y/m/d");
            
            $c_date = strtotime("$date");
            $complete_date = date("Y/m/d", strtotime("+$month month", $c_date));
            
            echo $project_id;
            echo "<br>";
            echo $user_id;
            echo "<br>";
            echo $complete_date;
            
            
            $query1 = "INSERT INTO tbl_take_task(project_id,user_id,task_complete_date,status,complete_task) VALUES ('$project_id','$user_id','$complete_date','Pending','')";
            
            $res = mysqli_query($conn, $query1);
            
            if($res == 1)
            {
                $_SESSION['take_task'] = 1;
                            
                header("Location:./Take_New_Task.php");
            }
            else 
            {
                echo "error";
            }
            
        ?>
    </body>
</html>


<?php
    }
    
    else
    {
        header("Location:./index.php");
    }

}

 else {
    header("Location:../index.php");
   
}


?>