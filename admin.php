<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>
<body>
<?php
    include "include/navbar.php";?>
    <div class="container py-2">
        <?php
        session_start();
        if ( !isset($_SESSION["utilisateur"])) {
            header("Location: connexion.php");
            
        }

        
        ?>
        <h3> bonjour <?php echo $_SESSION["utilisateur"]["last_name"] ?></h3>
    </div>
    
</body>
</html>