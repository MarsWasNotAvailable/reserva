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
    <title>Reserva: Signup</title>
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
            <?php
                if (isset($_SESSION['HasFailedSignedUp']))
                {
                    echo '<h4 class="animate__animated animate__shakeX" >Could not sign you up.</h4>';
                    echo '<span>Do you mean to <a href="login.php" >login</a> ?</span>';
                    
                    unset($_SESSION['HasFailedSignedUp']);

                    die();
                }
                else
                {
                    echo '<h4>You seem to be new here: Care to join by signing up.</h4>';
                }
            ?>

            <input name="Intention" value="Signup" type="hidden"></input>

            <label for="mail">Mail</label>
            <input name="mail" type="mail" size="50" required></input>

            <label for="password">Password</label>
            <input name="password" type="password" size="50" required></input>

            <label for="mail">Nickname</label>
            <input name="nickname" type="text" size="50"></input>

            <button type="submit">Signup</button>
        </form>
    </section>
</body>
</html>
