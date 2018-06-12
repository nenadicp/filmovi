<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Filmovi-žanrovi</title>
</head>
<body>
    <br>
    <select name="film" id="film">
        <?php
            $db = mysqli_connect("localhost", "root", "", "filmovi");
            $sql = $db->query("SELECT * FROM svi_filmovi t1 LEFT JOIN film_zanr t2
                ON t1.naslov = t2.naslov WHERE (t2.naslov IS NULL)");
            $rowCount = $sql->num_rows;
            if($rowCount > 0){
                while($row = $sql->fetch_assoc()){
                    echo '<option value="'.$row['naslov'].'">'.$row['naslov']." (".$row['godina'].') '.$row['id_film'].'</option>';
                }
            } else {
                echo '<option value="">Nije dostupno</option>';
            }
        ?>
    </select>
    <select name="zanr" id="zanr">
    <?php
            $db = mysqli_connect("localhost", "root", "", "filmovi");
            $sql = $db->query("SELECT * FROM zanrovi ORDER BY naziv_zanr ASC");
            $rowCount = $sql->num_rows;
            if($rowCount > 0){
                while($row = $sql->fetch_assoc()){
                    echo '<option value="'.$row['id_zanr'].'">'.$row['naziv_zanr'].'</option>';
                }
            } else {
                echo '<option value="">Nije dostupno</option>';
            }
        ?>
    </select>
    <input type="button" name="potvrdi" id="potvrdi" value="Potvrdi">
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click', '#potvrdi', function(){
                var film = $('#film').val();
                var zanr = $('#zanr').val();
                var data = {'id_zanr': zanr,
                            'id_film': film};
                $.ajax({
                    data: data,
                    type: 'post',
                    url: 'postavi.php',
                    success: function(data){
                        console.log(data);
                    },
                    complete: function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>
</body>
</html>