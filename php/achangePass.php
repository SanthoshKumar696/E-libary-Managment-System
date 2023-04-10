<?php
session_start();
include "database.php";

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
        <div id="wrapper">
            <h3 id="heading"> Change Password </h3>
            <div id="center">
                <?php
                if(isset($_POST ["submit"]))
                {
                    $sql="SELECT * FROM admin WHERE APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                        $s="update admin set APASS='{$_POST["npass"]}' WHERE AID=".$_SESSION["AID"];
                        $db->query($s);
                        echo "<p class='success'> Password Changed Success </p>";
                    }
                    else
                    {
                        echo "<p class='error'> Invaild Password </p>";
                    }
                }
              ?>  
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <label>Old Password</label>
                <input type="password" name="opass" required>
                <label>New Password</label>
                <input type="password" name="npass" required>
                <button type="submit" name="submit">Update Password </button>
                </form>
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