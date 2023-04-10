<?php
session_start();
include "database.php";
function countRecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
}
if(!isset($_SESSION["AID"]))
{
    header("location:alogin.php");
}
?>

<!DOCTYPE HTML>
<Html>

<head>
    <title> E-Library </title>
    <link rel="stylesheet"  href="css\el.css">
</head>

<body>
    <div id="container">
        <div id="header">
            <h1> E-Library Management System </h1>
        </div>
        <div id="wrapper"><h3 id="heading"> Welcome Admin </h3>
          <div id=center>
              <ul class="record">
                 <li> Total Students : <?php echo countRecord ("select * from student",$db); ?> </li>
                 <li> Total Books    : <?php echo countRecord ("select * from book",$db); ?> </li>
                 <li> Total Requests : <?php echo countRecord ("select * from request",$db); ?> </li>
                 <li> Total Comments : <?php echo countRecord ("select * from comment",$db); ?> </li>
              </ul>
          </div>  
        </div>
        <div id="navigation">
           <?php
           include "adminsidebar.php";
            ?>
        </div>
        <div id="footer">
            <p> Copyright &copy; Santhosh Kumar</p>
        </div>
    </div>

</body>

</Html>