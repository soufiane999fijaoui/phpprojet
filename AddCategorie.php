<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php include "include/navbar.php"; ?>

<?php
if (isset($_POST["AjouterCategorie"])) {
    $libelleValue = $_POST["libelle"];
    $DescriptionValue = $_POST["Description"];
    if (empty($libelleValue) || empty($DescriptionValue)) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">Veuillez saisir tous les champs</div></div>';
    } else {
        require_once "include/database.php";
        $sqlstate = $pdo->prepare("INSERT INTO categorie(libelle, description) VALUES(?, ?)");
        $sqlstate->execute([$libelleValue, $DescriptionValue]);
        header("Location: ListeCategories.php");
    }
}
?>

<div class="container my-5">
  <div class="row align-items-center">
   
    <div class="col-lg-5 text-center mb-4 mb-lg-0">
      <img src="add.png" class="img-fluid" alt="Sample image" style="max-width: 70%; height: auto;">
    </div>

    <div class="col-lg-7">
      <div class="card shadow-lg">
        <div class="card-body p-5">
          <h3 class="text-center mb-4">Add Category</h3>
          <form method="post">
            <div class="form-group mb-4">
              <label for="libelle">Libelle</label>
              <input name="libelle" type="text" class="form-control form-control-lg" id="libelle" placeholder="Libelle">
            </div>
            <div class="form-group mb-4">
              <label for="description">Description</label>
              <textarea name="Description" class="form-control" id="description" placeholder="Description" rows="5"></textarea>
            </div>
            <button name="AjouterCategorie" type="submit" class="btn btn-primary w-100 btn-lg">Add Category</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
