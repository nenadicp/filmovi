<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Filmovi</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        $(document).ready(function(){
            $(document).on('click', "#izbrisi", function(e){
                var filmovi = $("#filmovi").val();
                var data = {'filmovi': filmovi};
                $.ajax({
                    data: data,
                    type: "post",
                    url: "izbrisi_film.php",
                    success: function(data){
                        swal(data, "Film je izbrisan.", "success");
                        location.reload();
                    },
                    complete: function(data) {
                        console.log("Poruka: " + data);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <select name="filmovi" id="filmovi">
        <?php
            $db = mysqli_connect("localhost", "root", "", "filmovi");

            $query = $db->query("SELECT * FROM filmovi ORDER BY naslov ASC");
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
        <input type="button" id="izbrisi" name="izbrisi" value="Izbriši">
    </p>
</body>
</html>