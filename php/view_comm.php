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
            <h3 id="heading"> View Comments Details </h3>
            <?php
            $sql = "SELECT book.BTITLE,student.NAME,comment.COMM,comment.LOGS from comment 
            inner join book on book.BID=comment.BID inner join student on 
            comment.SID=student.ID";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
               echo "<table>
               <tr>
               <th>SNO</th>
               <th>BOOK</th>
               <th>NAME</th>
               <th>COMMENT</th>
               <th>LOGS</th>
               </tr>";
                $i = 0;
               while ($row = $res->fetch_assoc())
               {
                    $i++;
                    echo "<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td>{$row["BTITLE"]}</td>";
                    echo "<td>{$row["NAME"]}</td>";
                    echo "<td>{$row["COMM"]}</td>";
                    echo "<td>{$row["LOGS"]}</td>";
                    echo "</tr>";
               }

               echo "</table>";
            } else {

                echo "<p class='error'> No Comments Found</p>";
            }
             
            
                
            
          ?>
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