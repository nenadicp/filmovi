<?php
    $db = mysqli_connect("localhost", "root", "", "filmovi");

    if(isset($_POST['id_zanr']) && isset($_POST['id_film'])){
        $zanr = $_POST['id_zanr'];
        $film = $_POST['id_film'];

        $sql = "INSERT INTO film_zanr (id_film, id_zanr) VALUES ('$film', '$zanr')";

        $result = mysqli_query($db, $sql);
        if($result){
            echo "Uspješno";
        } else {
            echo "Neuspješno".mysqli_error($db);
        }
    } else {
        echo "Neuspješno !!!!!".mysqli_error($db);
    }

?>