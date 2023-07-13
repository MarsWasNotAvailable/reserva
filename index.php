<?php
    session_start();
    
    // require_once("./connexion.php");

    // var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="icon" href="./cache/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once('./components/header.php'); ?>

    <section id="FrontPage" class="container">
        <?php
            $GreetingName = (session_id() != "" && isset($_SESSION['CurrentUser'])) ? $_SESSION['CurrentUser'] : "Guest";

            echo "<h1>Hello " . $GreetingName . "</h1>";

            if (isset($_SESSION['CurrentUser']))
            {
                echo '<h2>See the showcase page to rent a new office.</h2>';
            }
            else
            {
                echo '<h2>This application allows the renting of rooms. You need to register first.</h2>';
            }
        ?>

        
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quas totam autem earum cupiditate, eum repellat dolorum veritatis mollitia, natus aperiam debitis provident aliquam magnam optio eius architecto doloribus ipsam?</p>
    </section>


</body>
</html>
