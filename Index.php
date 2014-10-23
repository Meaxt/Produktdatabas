
<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "hundar");

$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);



//hämta produkter
$sql = "SELECT * FROM katter";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$katter = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title></title>
    </head>
    <body>
        <table> 
            <tr>Id </tr>
            <tr> Namn</tr>
            
                <?php
                foreach ($katter as $katt) {
                    echo "<form>";
                    echo "<tr>";
                    
                    echo "<td>".$katt[0]." ".$katt[1]."</td>";
                    echo "<td><input type='submit' name='redigera' value='redigera'><input type='submit' name='delete' value='delete'> </td>";
                    echo "</tr>";
                    echo "</form>";
                }
                
                
                ?>
                <td></td>

            <br>
            
        </table>

    </body>
</html>
