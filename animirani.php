<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Animirani</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        $(document).ready(function(){
            $(document).on('click', "#izbrisi", function(e){
                var animirani = $("#animirani").val();
                var data = {'animirani': animirani};
                $.ajax({
                    data: data,
                    type: "post",
                    url: "izbrisi_animirani.php",
                    success: function(data){
                        swal(data, "Animirani film je izbrisan.", "success");
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
    <select name="animirani" id="animirani">
        <?php
            $db = mysqli_connect("localhost", "root", "", "filmovi");

            $query = $db->query("SELECT * FROM animirani ORDER BY naslov ASC");
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
        <input type="button" name="izbrisi" id="izbrisi" value="Izbriši">
    </p>
</body>
</html>