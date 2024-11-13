<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce - Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
include "include/database.php";
include "include/navbar.php";

if (isset($_POST["AddProducts"])) {
    $libelleValue =($_POST["libelle"]);
    $PriceValue = $_POST["Price"];
    $DiscountValue = $_POST["Discount"];
    $categoryValue = $_POST["categorie"];
    $date = date("Y-m-d");

    
    if (empty($libelleValue) || empty($PriceValue) || empty($DiscountValue) || empty($categoryValue) ||  empty($categoryValue)) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">Veuillez saisir tous les champs</div></div>';
    } else {
        require_once"include/database.php";
        $sqlstate = $pdo->prepare("INSERT INTO product VALUES (NULL, ?, ?, ?, ?, ?)");
        $sqlstate->execute([$libelleValue, $PriceValue, $DiscountValue, $categoryValue, $date]);
        header("Location: ListeProducts.php");    }
}
?>

<div class="container my-5">
  <div class="row align-items-center">
   
    <div class="col-lg-5 text-center mb-4 mb-lg-0">
      <img src="add.png" class="img-fluid" alt="Add Product" style="max-width: 70%; height: auto;">
    </div>

    <div class="col-lg-7">
      <div class="card shadow-lg">
        <div class="card-body p-5">
          <h3 class="text-center mb-4">Add Product</h3>
          <form method="post">
            <div class="form-group mb-4">
              <label for="libelle">Libelle</label>
              <input name="libelle" type="text" class="form-control form-control-lg" id="libelle" placeholder="Libelle">
            </div>
            <div class="form-group mb-4">
              <label for="price">Price</label>
              <input name="Price" type="number" class="form-control form-control-lg" id="price" min="0" placeholder="Price">
            </div>
            <div class="form-group mb-4">
              <label for="discount">Discount</label>
              <input name="Discount" type="number" class="form-control form-control-lg" id="discount" min="0" max="90" placeholder="Discount">
            </div>
            <?php
            $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="form-group mb-4">
              <label for="category">Category</label>
              <select name="categorie" class="form-control" id="category">
                <option>Select the category</option>
                <?php
                foreach ($categories as $category) {
                    echo "<option value='" . $category['id'] . "'>" . htmlspecialchars($category['libelle']) . "</option>";
                }
                ?>
              </select>
            </div>
            <button name="AddProducts" type="submit" class="btn btn-success w-100 btn-lg">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>
