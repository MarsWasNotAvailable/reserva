<?php
    $IsUserLoggedIn = session_id() != "" && isset($_SESSION['CurrentUser']);
?> 

<header>
    <nav id="NavigationBar">
        <a id="Home" class="navigational" href="./index.php"><img src="./cache/icon_reserva_main.jpg" alt="Home" width="48"></a>
        <div id="HamburgerMenu">
            <button id="HamburgerButton" class="navigational"><img src="./cache/icons_Hamburger.png" onclick="ToggleHamburger()"></button>
            <ul id="HamLinks" class="Collapsed">
                <?php
                    if ($IsUserLoggedIn)
                    {
                        echo '<li class="navigational"><a href="./rent.php">Rent</a></li>';
                        echo '<li class="navigational"><form method="POST" action="controller.php"><input class="LogOutButton" type="submit" name="Intention" value="Logout" ></form></li>';
                        // echo '<li class="navigational"><button value="./destroy.php" onclick="LogOut(event, this)">Log Out</button></li>';

                        $UserIcon = './cache/icons_user_role_' . $_SESSION['UserRole'] . '.png';
                        echo '<img src="' . $UserIcon . '" alt="User Role Image" style="width: 48px; height: 48px;">';

                    }
                    else
                    {
                        echo '<li class="navigational"><a href="./login.php">Login</a></li>';
                    }
                ?>
                
                
            </ul>
        </div>
    </nav>
    <script>
        function GetCurrentStyleOf(Element)
        {
            return Element.currentStyle ? Element.currentStyle.display : getComputedStyle(Element, null).display;
        }

        // Scope
        {
            let HamburgerButton = document.getElementById('HamburgerButton');

            // console.log(HamburgerButton);

            if (GetCurrentStyleOf(HamburgerButton) === "flex")
            {
                document.getElementById("HamLinks").className = "Collapsed";
            }
        }

        function ToggleHamburger(){
            let HamLinks = document.getElementById('HamLinks');

            if (HamLinks.className === "Visible")
            {
                HamLinks.className = "Collapsed";
                HamLinks.focus();
            }
            else
            {
                HamLinks.className = "Visible";
            }
        }

        function LogOut(Event, Element){
            window.location = Element.value;
        }
    </script>
</header>
<style>
/* header {
    position: fixed;
    top: 0;
    z-index: 1030;
    background: rgba(56, 55, 55, 0.719);
    width: 100%;
 } */

/* Navigation Bar: */

#NavigationBar {
    display: flex;
    background-color: transparent;
    border-bottom: 1px solid grey;
    align-items: center;
}

nav a img {
    /* width: 30%; */
    /* height: 20%; */
}

nav a {
    height: 30%;
    width: 100%;
}

nav .navigational {
    display: inline-flex;
    padding-left: 0.5em;
    padding-right: 0.5em;
    border: transparent solid 3px;
}

nav .navigational.selected {
    border: black solid 3px;
}

/* nav img { height: 50%; } */

#Home {
    width: 50%;
}

#HamburgerMenu {
    width: 50%;
    height: 30%;

    display: grid;
    justify-content: right;
}

#HamburgerButton {
    display: none;
    background-color: transparent;
    justify-content: right;
}

#HamburgerButton img {
    /* width: 12%; */
    width: 2em;
}

#HamLinks {
    display: flex;
    flex-direction: row;
    margin: 0;
    width: 100%;
    justify-content: center;
    align-items: center;
}

#HamLinks li {
    text-transform: uppercase;
}

@media (max-width: 900px) {
    #HamburgerButton {
        display: flex;
    }

    nav .navigational{
        display: inline-flex;
        padding-left: 0.8em;
        padding-right: 0.8em;
    }

    #HamLinks {
        flex-direction: column;

        position: absolute;
        top: 60px;
        left: 90%;

        background-color: #ffa4a4;
        border-radius: 13px;
        border: none;

        width: 10%;
    }

    #HamLinks.Collapsed {
        display: none;
    }

    #HamLinks.Visible {
        display: flex;
    }
}
</style>