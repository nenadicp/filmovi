<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kolekcije</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <select name="kolekcije" id="kolekcije">
        <?php
            $db = mysqli_connect("localhost", "root", "", "filmovi");

            $query = $db->query("SELECT * FROM kolekcije ORDER BY naslov ASC");
            $rowCount = $query->num_rows;
            if($rowCount > 0){
                while($row = $query->fetch_assoc()){
                    echo '<option value="'.$row['id_film'].'">'.$row['naslov'].'</option>';
                }
            } else {
                echo '<option value="">Nije dostupno</option>';
            }
        ?>
    </select>
    <p>
        <input type="button" value="Izbriši">
        <input type="button" value="Premjesti">
    </p>
</body>
</html>