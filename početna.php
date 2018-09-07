<?php
    $db = mysqli_connect("localhost", "root", "", "filmovi");

    $query = $db->query("SELECT * FROM animirani ORDER BY naslov ASC");
    $query2 = $db->query("SELECT * FROM filmovi ORDER BY naslov ASC");
    $query3 = $db->query("SELECT * FROM kolekcije ORDER BY naslov ASC");

    $rowCount = $query->num_rows;
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <title>Početna stranica - Baza filmova</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <style>

        body {
            background: lightblue;
        }

        table {
            width:800px;
            height: auto;
            box-shadow: 10px 10px lightgreen;
            background: linear-gradient(orange, yellow);
            border-radius: 7px;
        }

        td, select {
            border-radius: 5px;
            font-size: 19px;
        }

        input {
            text-align: center;
            font-size: 17px;
            width: 550px;
        }

        tr {
            height: 50px;
        }

        .novi_filmovi, .pretrazi {
            padding-left: 10px;
        }

        .zanr {
            width: auto;
        }

        .zanrovi2 {
            padding-left: 10px;
        }

        .broj {
            padding-bottom: -50px;
            padding-right: 10px;
        }

    </style>
    <script type="text/javascript">
        $(function(){
            $("#pretrazi").autocomplete({
                source: 'search.php'
            });
        });
    </script>
</head>
<body>
    <br>
    <div class="novi_filmovi">
        <p>
            <h4>Novi filmovi: <a href="unos_filmova.php" target="_blank">Unos filmova</a></h4>
            <h4 class="zanrovi2"><a href="zanrovi2.php">Žanrovi</a></h4>
        </p>
    </div>
    <div class="broj">
        <p>
            <h5 align="right">Broj filmova u bazi:
                <?php
                    if($result = $db->query("SELECT * FROM kolekcije
                                            UNION
                                            SELECT * FROM filmovi
                                            UNION
                                            SELECT * FROM animirani")) {
                        $row_cnt = $result->num_rows;

                        echo '', $row_cnt;
                    }
                ?>
            </h5>
            <h5 align="right">Animirani:
                <?php
                    if($result = $db->query("SELECT * FROM animirani")) {
                        $rowCount = $result->num_rows;

                        echo '', $rowCount;
                    }
                ?>
            </h5>
            <h5 align="right">Filmovi:
                <?php
                    if($result = $db->query("SELECT * FROM filmovi")) {
                        $rowCount2 = $result->num_rows;

                        echo '', $rowCount2;
                    }
                ?>
            </h5>
            <h5 align="right">Kolekcije:
                <?php
                    if($result = $db->query("SELECT * FROM kolekcije")) {
                        $rowCount3 = $result->num_rows;

                        echo '', $rowCount3;
                    }
                ?>
            </h5>
        </p>
    </div>
    <br>
    <br>
    <br>
    <div class="pretrazi" align="center">
        <p>
            <input type="text" name="pretrazi" id="pretrazi" placeholder="Unesite naziv filma" align="center">
        </p>
    </div>
    <table border="0" align="center" style="display:none">
        <tr>
            <td style="padding-left: 8px;">Animirani:</td>
            <td align="center">
                <select name="filmovi" id="filmovi" style="width: 650px;">
                    <?php
                        if($rowCount > 0) {
                            while($row = $query->fetch_assoc()) {
                                echo '<option value = "'.$row['id_film'].'">'.$row['naslov'].' ('.$row['godina'].')</option>';
                            }
                        } else {
                            echo '<option value="">Nije dostupno</option>';
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 8px;">Filmovi:</td>
            <td align="center">
                <select name="filmovi" id="filmovi" style="width: 650px;">
                    <?php
                        if($rowCount > 0) {
                            while($row = $query2->fetch_assoc()) {
                                echo '<option value = "'.$row['id_film'].'">'.$row['naslov'].' ('.$row['godina'].') </option>';
                            }
                        } else {
                            echo '<option value="">Nije dostupno</option>';
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td style="padding-left: 8px;">Kolekcije:</td>
                <td align="center">
                <select name="filmovi" id="filmovi" style="width: 650px;">
                    <?php
                        if($rowCount > 0) {
                            while($row = $query3->fetch_assoc()) {
                                echo '<option value = "'.$row['id_film'].'">'.$row['naslov'].' ('.$row['godina'].')</option>';
                            }
                        } else {
                            echo '<option value="">Nije dostupno</option>';
                        }
                    ?>
                </select>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <footer style="display:none">
    </footer>
</body>
</html>