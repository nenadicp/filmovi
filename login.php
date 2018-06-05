<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "filmovi");

    if(isset($_POST['login_btn'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result) == 1) {
            $_SESSION['message'] = "Ulogirani ste";
            header("location: unos_filmova.php");
        } elseif (empty($_POST['username']) OR empty($_POST['password'])) {
            $_SESSION['message'] = "Korisničko ime i lozinka ne mogu biti prazni!";
        } else {
            $_SESSION['message'] = "Korisničko ime ili lozinka su netočni!";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body{
            background-color: #b3d9ff;
        }

        table {
            padding: 25px; 
            background-color: #ffff99;
            border-radius: 6px;
            height: auto;
            width: 600px;
            font-size: 19px;
            box-shadow: 5px 5px #737373;
        }

        .unos {
            height: 25px;
            font-size: 17px;
        }

        .button {
            height: 25px;
            width: 90px;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_SESSION['message'])) {
            echo "<div id = 'error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
    ?>

    <form method="post" action="login.php">
        <p style="padding-top: 170px;"></p>
        <table align="center">
            <tr>
                <td>Korisničko ime:</td>
                <td><input class="unos" type="text" name="username" placeholder="Unesite korisničko ime"></td>
            </tr>
            <tr style="height: 20px;"></tr>
            <tr></tr>
            <tr>
                <td>Lozinka:</td>
                <td><input class="unos" type="password" name="password" id="password" placeholder="Unesite lozinku">
                &nbsp;&nbsp;
                <input type="checkbox" onclick="myFunction()">Prikaži lozinku</td>
            </tr>
            <tr style="height: 20px;"></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td><input class="button" type="submit" name="login_btn" value="Prijavi se"></td>
            </tr>
        </table>
    </form>

    <script>
        function myFunction(){
            var x = document.getElementById("password");
            if(x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>