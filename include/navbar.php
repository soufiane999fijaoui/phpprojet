<?php
session_start();
$connecte=false;
if (isset($_SESSION["utilisateur"])) {
  $connecte=true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php ecommerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">E-COMMERCE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="signup.php"> sign up</a>
        </li>
        <?php
        if ($connecte) {
          ?>
           <li class="nav-item">
          <a class="nav-link" href="AddCategorie.php">Add categorie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ListeCategories.php">Liste Categorie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="AddProduct.php">Add Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ListeProducts.php">Liste Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deconnexion.php">deconnexion</a>
        </li>
       
        

        
          
          <?php

          
        }
        else {
          ?>
           <li class="nav-item">
          <a class="nav-link" href="signin.php">sign in</a>
        </li>

          <?php
        }
        ?>

        
      </ul>
    </div>
  </div>
</nav>
    
</body>
</html>