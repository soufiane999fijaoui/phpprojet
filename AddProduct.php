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

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <form method="post" class="p-5 border rounded" style="width: 500px;">
        <h3 class="text-center mb-4">Add Product</h3>

        <div class="form-group mb-4">
            <label>Libelle</label>
            <input name="libelle" type="text" class="form-control form-control-lg" placeholder="Libelle">
        </div>

        <div class="form-group mb-4">
            <label>Price</label>
            <input name="Price" type="number" class="form-control form-control-lg" min="0" placeholder="Price">
        </div>

        <div class="form-group mb-4">
            <label>Discount</label>
            <input name="Discount" type="number" class="form-control form-control-lg" min="0" max="90" placeholder="Discount">
        </div>

        <?php
        $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="form-group mb-4">
            <label>Category</label>
            <select name="categorie" class="form-control">
                <option>Select the category</option>
                <?php
                foreach ($categories as $category) {
                    echo "<option value='" . $category['id'] . "'>" . htmlspecialchars($category['libelle']) . "</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" name="AddProducts" class="btn btn-success my-2 d-block mx-auto">Add Products</button>
    </form>
</div>

</body>
</html>
