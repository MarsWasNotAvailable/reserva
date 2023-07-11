<?php
    session_start();

    // var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Initiation: Page 2</title>
    <link rel="icon" href="./cache/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once('./components/header.php'); ?>

    <section id="Rent">
        <?php
            if (isset($_SESSION['CurrentUser']))
            {
                include_once("./connexion.php");

                $NewConnection = new MaConnexion("reserva", "root", "", "localhost");
                // var_dump($NewConnection);

                $JoinPredicate = array('Table' => 'users', 'OnColumnLeft' => 'fk_user', 'OnColumnRight' => 'id');
                $Condition = array('Key' => 'fk_user', 'Value' => $_SESSION['UserID']);

                $Result = $NewConnection->select_join("reservations", "date_begin", $JoinPredicate, $Condition);

                var_dump($Result);
            }
        ?>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quas totam autem earum cupiditate, eum repellat dolorum veritatis mollitia, natus aperiam debitis provident aliquam magnam optio eius architecto doloribus ipsam?</p>
    </section>
</body>
</html>
