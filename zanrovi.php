<?php
    $db = mysqli_connect("localhost", "root", "", "filmovi");

    if(!empty($_POST["id_zanr"])) {
        $query = $db->query("SELECT * FROM svi_filmovi AS a
        INNER JOIN film_zanr AS fz
        ON fz.id_film = a.id_film
        INNER JOIN zanrovi z
        ON fz.id_zanr = z.id_zanr
        WHERE z.id_zanr = ".$_POST["id_zanr"]." ORDER BY naslov ASC");

        $rowCount = $query->num_rows;

        if($rowCount > 0){
            while($row = $query->fetch_assoc()){
                echo '<option value="'.$row['id_film'].'">'.$row['naslov'].'</option>';
            }
        } else {
            echo '<option value="">Nije dostupno</option>'.mysqli_error($query);
        }
    }
?>