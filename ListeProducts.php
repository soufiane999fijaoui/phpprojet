<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListeOf categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<body>
<?php
include "include/navbar.php";
?>
<div class="container mt-4"> 
    <h2 class="text-center">Liste des Produits</h2>

    <table class="table table-striped table-sm mt-4">
        <thead >
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Libelle</th>
                <th scope="col">Price</th>
                <th scope="col">Discount</th>
                <th scope="col">Categorie</th>
                <th scope="col">Date_creation</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "include/database.php";
            $products = $pdo->query("SELECT product.* ,categorie.libelle as 'categorie_libelle' from product INNER JOIN categorie ON product.id_categorie=categorie.id")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($products as $product) {
            ?>
                <tr>
                    <td scope="row"><?php echo $product['id']; ?></td>
                    <td><?php echo $product['libelle']; ?></td>
                    <td><?php echo $product['price']; ?> MAD</td>
                    <td><?php echo $product['discount']; ?> %</td>
                    <td><?php echo $product['categorie_libelle']; ?></td>
                    <td><?php echo $product['date_creation']; ?></td>
                    <td>
                        <input type="submit" value="Modifier" class="btn btn-primary btn-sm mr-2">
                        <input type="submit" value="Supprimer" class="btn btn-danger btn-sm">
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        <a href="AddProduct.php">
            <button type="button" class="btn btn-success">Add Product</button>
        </a>
    </div>
</div>


</body>
</html>