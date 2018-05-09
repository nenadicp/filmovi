<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Sortiranje filmova po žanrovima</title>
    <style>
        .zanrovi {
            padding-left: 5px;
        }
    </style>
</head>
<body>
    <p>
        <a href="#" onclick="window.location.href='početna.php'" style="padding-left: 5px;">Natrag</a>
    </p>
    <p class="zanrovi">
        <select name="zanr" id="zanr">
            <option value="">Odaberi žanr</option>
            <?php
                $db = mysqli_connect("localhost", "root", "", "filmovi");
                $query = $db->query("SELECT * FROM zanrovi ORDER BY naziv_zanr ASC");
                $rowCount = $query->num_rows;
                if($rowCount > 0) {
                    while($row = $query->fetch_assoc()){
                        echo '<option value="'.$row['id_zanr'].'">'.$row['naziv_zanr'].'</option>';
                    }
                } else {
                    echo '<option value="">Nije dostupno</option>';
                }
            ?>
        </select>
        <br>
        <br>
        <br>
        <select class="filmovi2" name="filmovi2" id="filmovi2">
            <option value=""></option>
        </select>
    </p>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#zanr').on('change', function() {
                var idzanr = $(this).val();
                if(idzanr) {
                    $.ajax({
                        type:'post',
                        url: 'zanrovi.php',
                        data: 'id_zanr='+idzanr,
                        success: function(html) {
                            $('#filmovi2').html(html);
                        }
                    });
                } else {
                    $('#filmovi2').html('<option value="">Molimo odaberite žanr</option>');
                }
            });
        });
    </script>
</body>
</html>