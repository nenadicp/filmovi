<?php
    $db = mysqli_connect("localhost", "root", "", "filmovi");

    if(isset($_POST['input_btn'])){
        $naziv = mysqli_real_escape_string($db, $_POST['naziv']);
        $godina = mysqli_real_escape_string($db, $_POST['godina']);

        $sql = "INSERT INTO animirani (naslov, godina) VALUES ('$naziv', '$godina')";
        if(mysqli_query($db, $sql)){
            echo "Uspješno. " .$_POST['naziv'] ." ". "(".$_POST['godina'] .")<br>";
            echo 'ID: '.$db->insert_id;

            $sql = "INSERT INTO svi_filmovi (naslov, godina) VALUES ('$naziv', '$godina')";
            if(mysqli_query($db, $sql)){
                echo "Uspješno. Baza svi_filmovi: " .$_POST['naziv'] ." ". "(".$_POST['godina'] .")<br>";
                echo 'ID: '.$db->insert_id;
            } else {
                echo "Neuspješno".mysqli_error($db);
            }
        } elseif (empty($_POST['naziv']) || empty($_POST['godina'])) {
            echo "Naziv i godina ne mogu biti prazni!";
        } else {
            echo "Neuspješno!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unos filmova - ANIMIRANI</title>
</head>
<body>
    <p>
        <a href="unos_filmova.php">Natrag</a>
    </p>
    <form method="post" action="insert-movies(animirani).php">
        <table>
            <tr>
                <td>Naziv filma:</td>
                <td><input type="text" name="naziv" id="naziv"></td>
            </tr>
            <tr>
                <td>Godina:</td>
                <td><input type="text" name="godina" id="godina"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="input_btn" value="Unesi"></td>
            </tr>
        </table>
    </form>
</body>
</html>