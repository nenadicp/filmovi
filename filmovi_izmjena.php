<?php
    $db = mysqli_connect("localhost", "root", "", "filmovi");

    $query = $db->query("SELECT * FROM filmovi ORDER BY naslov ASC");
    $rowCount = $query->num_rows;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Izmjena filmovi</title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h4>Filmovi:
            <?php
                if($result = $db->query("SELECT * FROM filmovi")) {
                    $rowCount = $result->num_rows;
                    echo '', $rowCount;
                }
            ?>
        </h4>
        <p>
            <a href="unos_filmova.php">Natrag</a>
        </p>
        <select name="filmovi" id="filmovi">
            <?php
                $db = mysqli_connect("localhost", "root", "", "filmovi");

                $query = $db->query("SELECT * FROM filmovi ORDER BY naslov ASC");
                $rowCount = $query->num_rows;
                if($rowCount > 0){
                    while($row = $query->fetch_assoc()){
                        echo '<option value="'.$row['id_film'].'">'.$row['naslov'].' ('.$row['godina'].')</option>';
                    }
                } else {
                    echo '<option value="">Nije dostupno</option>';
                }
            ?>
        </select>
        <p>
            <input type="button" name="promijeni" id="promijeni" value="Promijeni">
        </p>
    </body>
</html>