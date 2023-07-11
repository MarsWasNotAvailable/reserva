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

    <section class="container">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda quas totam autem earum cupiditate, eum repellat dolorum veritatis mollitia, natus aperiam debitis provident aliquam magnam optio eius architecto doloribus ipsam?</p>
    </section>

    <section id="Rent" class="gridlayout">

        <?php
            if (isset($_SESSION['CurrentUser']))
            {
                include_once("./connexion.php");

                $NewConnection = new MaConnexion("reserva", "root", "", "localhost");
                // var_dump($NewConnection);

                if ($_SESSION['UserRole'] == 'EndUser')
                {
                    $Result = $NewConnection->select("rooms", "*");

                    foreach ($Result as $Key => $Value)
                    {
                        echo '<form method="POST" action="controller.php" class="RentedRoomCards">';

                        echo '<input name="Intention" value="Rent" type="hidden"></input>';
                        echo '<input name="IDUser" value="' . $_SESSION['UserID'] .'" type="hidden"></input>';
                        echo '<input name="IDRoom" value="' . $Value['id_room'] .'" type="hidden"></input>';
                        
                        echo '<h2>' . $Value['name'] . '</h2>';
                        echo '<img src="./cache/rooms/'  . $Value['image'] . '" alt="room image">';

                        // echo '<label for="DateBegin">Begin:</label>';
                        // echo '<input type="date" name="DateBegin" value="'  . $Value['date_begin'] . '" >';

                        echo '<label for="DateEnd">End:</label>';
                        echo '<input type="date" name="DateEnd" value="2023-07-11" >';

                        echo '<span>' . $Value['description'] . '</span>';

                        echo '<button type="submit" >Rent</button>';

                        echo '</form>';
                    }
                    

                    // var_dump($Result);
                }

            }
        ?>
    </section>
</body>
</html>
