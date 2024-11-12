<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e commerce</title>
</head>
<body>
    <?php
    include "include/navbar.php";?>
<?php
if (isset($_POST["AjouterCategorie"])) {
    $libelleValue=$_POST["libelle"];
    $DescriptionValue=$_POST["Description"];
    if (empty($libelleValue)||empty($DescriptionValue)) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">veillez saisire tous les champs</div></div>';
        
    }else {
        require_once"include/database.php";
        $sqlstate=$pdo->prepare("INSERT INTO categorie(libelle,description) VALUES(?,?)");
        $sqlstate->execute([$libelleValue, $DescriptionValue]);
        header("Location: ListeCategories.php");
       
    }
   
}

?>



    
</div>
  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <form method="post" class="p-5 border rounded" style="width: 500px;">
    <h3 class="text-center mb-4"> Add categorie</h3>
    <div class="form-group mb-4">
      <label >libelle</label>
      <input name="libelle" type="text" class="form-control form-control-lg" placeholder="libelle">
    </div>
    <div class="form-group mb-4">
      <label for="exampleInputEmail1">Description</label>
      <textarea name="Description" class="form-control" placeholder="Description" ></textarea>
    
    </div>

   
    
    <button name="AjouterCategorie" type="submit" class="btn btn-success w-100 btn-lg">Add Categorie</button>
  </form>
</div>



</body>
</html>