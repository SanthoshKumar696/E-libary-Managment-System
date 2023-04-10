<?php
session_start();
include "database.php";

if(!isset($_SESSION["ID"]))
{
    header("location:ulogin.php");
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
        <div id="wrapper">
            <h3 id="heading"> New Book Request </h3>
            <div id="center">
                <?php
                if(isset($_POST ["submit"]))
                {
                    $sql="insert into request(ID, MES, LOGS) values('{$_SESSION["ID"]}','{$_POST["msg"]}',now())";
                    $res=$db->query($sql);
                    echo "<p class='success'> Request Sented </p>";
                 }
              ?>  
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                
                <label>Write your Request</label>
                <textarea required name="msg"></textarea>
                <button type="submit" name="submit">submit </button>
                </form>
            </div>
        </div>
        <div id="navigation">
           <?php
           include "usersidebar.php";
            ?>
        </div>
        <div id="footer">
            <p> Copyright &copy; Santhosh Kumar</p>
        </div>
    </div>

</body>

</Html>