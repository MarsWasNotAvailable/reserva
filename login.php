<?php
    session_start();

    if (isset($_SESSION['CurrentUser']))
    {
        header("Location: " . 'index.php');
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva: Login</title>
    <link rel="icon" href="./cache/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" >
</head>
<body>
    <?php
        include_once('./components/header.php');
    ?>

    <section class="container">
        <form action="./controller.php" method="POST">
            <input name="Intention" value="Login" type="hidden"></input>

            <label for="mail">Mail</label>
            <input name="mail" type="mail" size="50"></input>

            <label for="password">Password</label>
            <input name="password" type="password" size="50"></input>

            <button type="submit">Login</button>

            <?php
                if (isset($_SESSION['HasFailedLogin']))
                {
                    echo '<span class="animate__animated animate__shakeX" >We do not know who you are. Do you mean to <a href="signup.php" >sign up</a> ?</span>';

                    unset($_SESSION['HasFailedLogin']);
                }
                else
                {
                    echo '<span>You do not have an account ? <br><a href="signup.php"> Click here to register</a>';
                }
            ?>
        </form>
    </section>

</body>
</html>
