<?php
    $db = mysqli_connect("localhost", "root", "", "filmovi");

    if(isset($_POST['input_btn'])){
        $naziv = mysqli_real_escape_string($db, $_POST['naziv']);
        $godina = mysqli_real_escape_string($db, $_POST['godina']);

        $sql = "INSERT INTO filmovi (naslov, godina) VALUES ('$naziv', '$godina')";
        if(mysqli_query($db, $sql)){
            echo "Uspješno. " .$_POST['naziv'] ." ". "(".$_POST['godina'] .")<br>";
            echo 'ID: '.$db->insert_id;
            echo "</br>";

            $sql = "INSERT INTO svi_filmovi (naslov, godina) VALUES ('$naziv', '$godina')";
            if(mysqli_query($db, $sql)){
                echo "Uspješno. Baza svi_filmovi: " .$_POST['naziv'] ." ". "(".$_POST['godina'] .")<br>";
                echo 'ID: '.$db->insert_id;
            } else {
                echo "Neuspješno".mysqli_error($db);
            }
        } elseif (empty($_POST['naziv']) OR empty($_POST['godina'])) {
            echo "Naziv i godina ne mogu biti prazni!";
        } else {
            echo "Neuspješno!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unos filmova - FILMOVI</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #b3ffff;
        }

        .text {
            font-size: 19px;
            border-radius: 5px;
        }

        .submit {
            height: 30px;
            width: 60px;
            font-size: 16px;
            border-radius: 5px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: green;
            text-decoration: underline;
            font-size: 20px;
        }

    </style>
</head>
<body>
    <p>
        <a href="unos_filmova.php">Natrag</a>
    </p>
    <form method="post" action="insert-movies(filmovi).php">
        <p style="height: 150px;"></p>
        <table align="center">
            <tr>
                <td style="font-size: 19px;">Naziv filma:</td>
                <td><input class="text" type="text" name="naziv" id="naziv"></td>
            </tr>
            <tr style="height: 15px;"></tr>
            <tr>
                <td style="font-size: 19px;">Godina:</td>
                <td><input class="text" type="text" name="godina" id="godina"></td>
            </tr>
            <tr style="height: 15px;"></tr>
            <tr>
                <td></td>
                <td><input class="submit" type="submit" name="input_btn" value="Unesi"></td>
            </tr>
        </table>
    </form>
</body>
</html>