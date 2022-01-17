<?php

    session_start();

?>

<nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="Homepage.php">
                <img class="bg-white" src="Images/System Images/Logo.jpg" alt="Student Flat Renting System" width="250" height="50">
            </a>
        </div>

        <?php 
        
            if (isset($_SESSION["user"])) {
                echo '<ul class="nav navbar-nav navbar-right">
                    <li class="nav-item">
                        <form action="User Profile.php" method="post">
                            <button class="btn btn-outline-dark text-secondary" type="submit" name="userprofile-submit">' . $_SESSION["user"] . '</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="Includes/Log Out.Inc.php" method="post">
                            <button class="btn btn-outline-dark text-secondary" type="submit" name="logout-submit">Log Out</button>
                        </form>
                    </li>
                </ul>';

            }

            else {
                echo '<ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a class="nav-link" href="Sign Up.php">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="Log In.php">Log In</a></li>
                </ul>';
            }
        
        ?>

    </div>
</nav>