<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
       
        
        <title></title>
        <style>
            
            @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
@media(min-width:768px) {
    body {
        margin-top: 50px;
    }
    /*html, body, #wrapper, #page-wrapper {height: 100%; overflow: hidden;}*/
}

#wrapper {
    padding-left: 0;    
}

#page-wrapper {
    width: 100%;        
    padding: 0;
    background-color: #fff;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 225px;
    }

    #page-wrapper {
        padding: 22px 10px;
    }
}

/* Top Navigation */

.top-nav {
    padding: 0 15px;
}

.top-nav>li {
    display: inline-block;
    float: left;
}

.top-nav>li>a {
    padding-top: 20px;
    padding-bottom: 20px;
    line-height: 20px;
    color: #fff;
}

.top-nav>li>a:hover,
.top-nav>li>a:focus,
.top-nav>.open>a,
.top-nav>.open>a:hover,
.top-nav>.open>a:focus {
    color: #fff;
    background-color: #1a242f;
}

.top-nav>.open>.dropdown-menu {
    float: left;
    position: absolute;
    margin-top: 0;
    /*border: 1px solid rgba(0,0,0,.15);*/
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    background-color: #fff;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

.top-nav>.open>.dropdown-menu>li>a {
    white-space: normal;
}

/* Side Navigation */

@media(min-width:768px) {
    .side-nav {
        position: fixed;
        top: 60px;
        left: 225px;
        width: 225px;
        margin-left: -225px;
        border: none;
        border-radius: 0;
        border-top: 1px rgba(0,0,0,.5) solid;
        overflow-y: auto;
        background-color: #222;
        /*background-color: #5A6B7D;*/
        bottom: 0;
        overflow-x: hidden;
        padding-bottom: 40px;
    }

    .side-nav>li>a {
        width: 225px;
        border-bottom: 1px rgba(0,0,0,.3) solid;
    }

    .side-nav li a:hover,
    .side-nav li a:focus {
        outline: none;
        background-color: #1a242f !important;
    }
}

.side-nav>li>ul {
    padding: 0;
    border-bottom: 1px rgba(0,0,0,.3) solid;
}

.side-nav>li>ul>li>a {
    display: block;
    padding: 10px 15px 10px 38px;
    text-decoration: none;
    /*color: #999;*/
    color: #fff;    
}

.side-nav>li>ul>li>a:hover {
    color: #fff;
}

.navbar .nav > li > a > .label {
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
  top: 14px;
  right: 6px;
  font-size: 10px;
  font-weight: normal;
  min-width: 15px;
  min-height: 15px;
  line-height: 1.0em;
  text-align: center;
  padding: 2px;
}

.navbar .nav > li > a:hover > .label {
  top: 10px;
}

.navbar-brand {
    padding: 5px 15px;
}
            
        </style>
        
        
         
        
    </head>
    <body>
        <div id="throbber" style="display:none; min-height:120px;"></div>
       
            <div id="noty-holder"></div>
            <div id="wrapper">
                <!-- Navigation -->
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    
                    
                    <ul class="nav navbar-right top-nav">

                        <li class="dropdown">
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout </a> 

                        </li>
                    </ul>

                    
                    
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav side-nav">
                            
                            <div class="navbar-header">

                                <a href="index.php"><h3 style="color: white;">&nbsp;&nbsp;&nbsp; Task Allocation </h3></a>

                    </div>
                            
                            <li>
                               
                                <a data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-user"></i> Manage Employee <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                                    <ul id="submenu-1" class="collapse">
                                        <li><a href="Add_Employee.php"><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Add Employee</a></li>
                                        <li><a href="View_Employee.php"><i class="fa fa-angle-right"></i>&nbsp;&nbsp; View Employee</a></li>
                                    </ul>
                                
                            </li>
                           
                            <li>
                                <a data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i> Manage Task <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                                    <ul id="submenu-2" class="collapse">
                                        <li><a href="Add_Task.php"><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Add Task</a></li>
                                        <li><a href="View_Task.php"><i class="fa fa-angle-right"></i>&nbsp;&nbsp; View Task</a></li>
                                    </ul>

                            </li>
                            <li>
                                <a data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-paper-plane-o"></i> Task Details <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                                    <ul id="submenu-3" class="collapse">
                                        <li><a href="View_Complete_Task.php"><i class="fa fa-angle-right"></i>&nbsp;&nbsp; View Complete Task</a></li>
                                        <li><a href="View_Pending_Task.php"><i class="fa fa-angle-right"></i>&nbsp;&nbsp; View Pending Task</a></li>
                                    </ul>

                            </li>
                            
                            <li>
                                <a data-toggle="collapse" data-target="#submenu-4"><i class="fa fa-fw fa-file-text"></i> Report <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                                    <ul id="submenu-4" class="collapse">
                                        <li><a href="Month_Wise_Report.php"><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Month Wise Report</a></li>
                                        <li><a href="Year_Wise_Report.php"><i class="fa fa-angle-right"></i>&nbsp;&nbsp; Year Wise Report</a></li>
                                    </ul>

                            </li>
                            
                        </ul>
                        
                        
                    </div>
    
                </nav>


            </div>
            
            
           
            <script>
            
            $(function(){
                $('[data-toggle="tooltip"]').tooltip();
                $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
                    $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
                });
                $('.side-nav .collapse').on("show.bs.collapse", function() {                        
                    $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
                });
            })    
    
            
            </script>
            

    </body>
</html>
