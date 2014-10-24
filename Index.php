
<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "hundar");

$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

if(isset($_GET["action"])) {
    if($_GET["action"]=="delete"){
        echo "delete körs";

        //ta bort en katt
$sql = "DELETE FROM katter WHERE $katt[0] ";
$stmt = $dbh->prepare($sql);
$stmt->execute();

    }
}

if(isset($_GET["action"])) {
    if($_GET["action"]=="edit"){
        echo "edit körs";
        //uppdatera en katt
$sql = "UPDATE katter SET namn= WHERE id='".$_GET["id"]."'";
$stmt = $dbh->prepare($sql);
$stmt->execute();

    }
}
//if(isset($_GET["action"])) {
//    if($_GET["action"]=="new"){
//        echo "New körs";
//        //uppdatera en katt
//$sql = "INSERT INTO katter VALUES('','".$_GET["name"]."')";
//$stmt = $dbh->prepare($sql);
//$stmt->execute();
//
//    }
//}


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
                    echo "<td><input type='submit' name='action' value='edit'><input type='submit' name='action' value='delete'> </td>";
                    echo "<input type='hidden' value='".$katt[0]."' name='id'>";
                    echo "</tr>";
                    echo "</form>";   
                }               
                ?>
                <td></td>

            <br>

        </table>
            <?php
            
        echo "<form>";
                    echo "<input type='text' name='namn' value='".$_GET."'>";
                    echo "<input type='submit' name='action' value='Accept'>";
                    echo "<br>";
                    echo "</form>";  
                    echo "<form>";
                    echo "<input type='text' name='namn'>";
                    echo "<input type='submit' name='action' value='new'>";
                    echo "</form>";    
                    ?>
    </body>
</html>
