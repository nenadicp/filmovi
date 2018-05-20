<?php
    $db = mysqli_connect("localhost", "root", "", "filmovi");

    if(isset($_POST['filmovi'])) {
        $film = $_POST["filmovi"];

        $sql = "DELETE FROM filmovi WHERE id_film = '$film'";

        $result = mysqli_query($db, $sql);
        if($result) {
            echo "Uspješno";
        } else {
            echo "Neuspješno".mysqli_error($db);
        }
    } else {
        echo "Neuspješno !!!!!!".mysqli_error($db);
    }
?>