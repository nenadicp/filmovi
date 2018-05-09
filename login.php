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
</head>
<body>
    <?php
        if(isset($_SESSION['message'])) {
            echo "<div id = 'error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
    ?>

    <form method="post" action="login.php">
        <table>
            <tr>
                <td>Korisničko ime:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Lozinka:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login_btn" value="Prijavi se"></td>
            </tr>
        </table>
    </form>

</body>
</html>