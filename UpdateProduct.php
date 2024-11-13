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
require_once "include/database.php";


    $id = $_GET["id"];
    $sqlstate = $pdo->prepare("SELECT * FROM product WHERE id = ?");
    $sqlstate->execute([$id]);
    $product = $sqlstate->fetch(PDO::FETCH_ASSOC);


if (isset($_POST["modifier"])) {
    $libelleValue = $_POST["libelle"];
    $PriceValue = $_POST["Price"];
    $DiscountValue = $_POST["Discount"];
    $categoryValue = $_POST["categorie"];
    $date = date("Y-m-d");

    if (empty($libelleValue) || empty($PriceValue) || empty($DiscountValue) || empty($categoryValue)) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">Veuillez saisir tous les champs</div></div>';
    } else {
        $sqlstate = $pdo->prepare("UPDATE product SET libelle = ?, price = ?, discount = ?, id_categorie = ? WHERE id = ?");
        $sqlstate->execute([$libelleValue, $PriceValue, $DiscountValue, $categoryValue, $id]);
        header("Location: ListeProducts.php");
        exit();
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
                    <h3 class="text-center mb-4">Update Product</h3>
                    <form method="post">
                    <div class="form-group mb-4">
                            <input name="id" type="hidden" class="form-control form-control-lg" id="libelle" value="<?php echo  $product['id']  ?>">
                        </div>
                       
                        <div class="form-group mb-4">
                            <label for="libelle">Libelle</label>
                            <input name="libelle" type="text" class="form-control form-control-lg" id="libelle" placeholder="Libelle" value="<?php echo  $product['libelle'] ?>">
                        </div>
                        <div class="form-group mb-4">
                            <label for="Price">Price</label>
                            <input name="Price" type="number" step="0.01" class="form-control form-control-lg" id="Price" placeholder="Price" value="<?php echo $product['price'] ?>">
                        </div>
                        <div class="form-group mb-4">
                            <label for="Discount">Discount</label>
                            <input name="Discount" type="number" step="0.01" class="form-control form-control-lg" id="Discount" placeholder="Discount" value="<?php echo  $product['discount'] ?>">
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
                    $selected = $product['id_categorie'] == $category['id'] ? "selected" : "";
                    echo "<option value='" . $category['id'] . "' $selected>" . $category['libelle'] . "</option>";
        }
                
                ?>
              </select>
            </div>
                        <button name="modifier" type="submit" class="btn btn-primary w-100 btn-lg">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
