<?php
    $db = mysqli_connect("localhost", "root", "", "filmovi");

    if(isset($_POST['animirani'])) {
        $film = $_POST["animirani"];

        $sql = "DELETE FROM animirani WHERE id_film = '$film'";

        $result = mysqli_query($db, $sql);
        if($result) {
            echo "Uspješno";
        } else {
            echo "Neuspješno".mysqli_error($db);
        }
    } else {
        echo "NEUSPJEŠNO !!!!!".mysqli_error($db);
    }
?>