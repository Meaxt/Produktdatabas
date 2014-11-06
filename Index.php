
<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "hundar");

$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

if (isset($_POST["action"])) {
    if ($_POST["action"] == "delete") {
        //ta bort en katt
        $sql = "DELETE FROM katter WHERE id='" . $_POST["id"] . "'";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        header("Location:?");
    }
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "Accept") {
        $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_SPECIAL_CHARS);
        //uppdatera en katt
        $sql = "UPDATE katter SET namn='" . $namn . "' WHERE id='" . $_POST["id"] . "'";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        header("Location:?");
    }
}
if (isset($_POST["action"])) {
    if ($_POST["action"] == "new") {
        $namn = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_SPECIAL_CHARS);
        //uppdatera en katt
        $sql = "INSERT INTO katter VALUES('','" . $namn . "')";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        header("Location:?");
    }
}


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
    echo "<form method='post'>";
    echo "<tr>";
    echo "<td>" . $katt[0] . " " . $katt[1] . "</td>";
    echo "<td><input type='submit' name='action' value='edit'><input type='submit' name='action' value='delete'> </td>";
    echo "<input type='hidden' value='" . $katt[0] . "' name='id'>";
    echo "<input type='hidden' value='" . $katt[1] . "' name='namn'>";
    echo "</tr>";
    echo "</form>";
}
?>
            <td></td>

            <br>

        </table>
<?php
//start skriva formulär för redigering
//gör if-sats
if (isset($_POST["action"])) {
    if ($_POST["action"] == "edit") {
       
echo "<form method='post'>";
echo "<input type='text' name='namn' value='" . $_POST["namn"] . "'>";
echo "<input type='submit' name='action' value='Accept'>";
echo "<input type='hidden' value='" . $_POST["id"] . "' name='id'>";
echo "<br>";
echo "</form>";
    }
}
//slut if-sats


echo "<form method='post'>";
echo "<input type='text' name='namn'>";
echo "<input type='submit' name='action' value='new'>";
echo "</form>";
?>
    </body>
</html>
