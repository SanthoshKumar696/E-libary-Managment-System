<?php
include "database.php";
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
            <h3 id="heading"> New User Registration</h3>
            <div id="center">
                <?php
                if (isset($_POST["submit"]))
                 { 
                        $sql = "insert into student(NAME,PASS,MAIL,DEP) values ('{$_POST["name"]}',
                        '{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
                        $db->query($sql);
                        echo "<p class='success'>User Registration Success</p>";
                     }
              ?>  
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
                <label>NAME</label>
                <input type="text" name="name" required>
                <label>PASSWORD</label>
                <input type="password" name="pass" required>
                <label>Email ID</label>
                <input type="email" name="mail" required>
                <select name="dep" required>
                    <option value="">Select</option>
                    <option value="B.A.TAMI">B.A.TAMIL</option>
                    <option value="B.A.ENGLISH">B.A.ENGLISH</option>
                    <option value="B.COM">B.COM</option>
                    <option value="B.Sc.CS">B.Sc.CS</option>
                    <option value="B.Sc.MATHS">B.Sc.MATHS</option>
                </select>
                <button type="submit" name="submit">Registration</button>
                </form>
            </div>
        </div>
        <div id="navigation">
           <?php
           include "sidebar.php";
            ?>
        </div>
        <div id="footer">
            <p> Copyright &copy; Santhosh Kumar</p>
        </div>
    </div>

</body>

</Html>