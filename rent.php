<?php
    session_start();

    if (!isset($_SESSION['CurrentUser']))
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
    <title>Reserva: Renting</title>
    <link rel="icon" href="./cache/favicon.ico" type="image/x-icon" >

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once('./components/header.php'); ?>

    <section id="Rent" class="gridlayout">
        <?php
            if (isset($_SESSION['CurrentUser']))
            {
                include_once("./connexion.php");

                $NewConnection = new MaConnexion("reserva", "root", "", "localhost");
                // var_dump($NewConnection);

                // $JoinPredicate = array('Table' => 'users', 'OnColumnLeft' => 'fk_user', 'OnColumnRight' => 'id');
                // $Condition = array('Key' => 'fk_user', 'Value' => $_SESSION['UserID']);

                // $Result = $NewConnection->select_join("reservations", "*", $JoinPredicate, $Condition);

                $Result = $NewConnection->get_reservation_hc($_SESSION['UserID']);


                // var_dump($Result);

                echo '<h2>The rooms you currently are renting: </h2>';

                foreach ($Result as $Key => $Value)
                {
                    echo '<form method="POST" action="controller.php" class="RentedRoomCards">';

                    echo '<input name="Intention" value="Cancel" type="hidden"></input>';
                    echo '<input name="IDUser" value="' . $_SESSION['UserID'] .'" type="hidden"></input>';
                    echo '<input name="IDReservation" value="' . $Value['id_reservation'] .'" type="hidden"></input>';

                    echo '<h2>' . $Value['name'] . '</h2>';
                    echo '<img src="./cache/rooms/' . $Value['image'] . '" alt="room image">';
                    echo '<button>Cancel</button>';
                    echo '<span>From: ' . $Value['date_begin'] . '</span>';
                    echo '<span>To: ' . $Value['date_end'] . '</span>';
                    echo '</form>';
                }
            }
        ?>
    </section>
</body>
</html>
