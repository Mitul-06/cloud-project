<?php

session_start();

if($_SESSION['username']!=NULL && $_SESSION['user']=="Employee")
{

    if(isset($_GET['task_id']))
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
        
            $task_id = $_GET['task_id'];
            
            $user_id = $_SESSION['user_id'];
            
            $query1 = "UPDATE tbl_take_task SET status = 'Complete' ,complete_task = 'Yes' WHERE task_id = '$task_id' and user_id = '$user_id'";
            
            $res = mysqli_query($conn, $query1);
            
            if($res == 1)
            {
                $_SESSION['complete_task'] = 1;
                            
                header("Location:./View_My_Take_Task.php");
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