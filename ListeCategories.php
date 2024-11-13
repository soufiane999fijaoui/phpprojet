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
    <h2 class="text-center">Liste des Categories</h2>

    <table class="table table-striped table-sm mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Libelle</th>
                <th scope="col">Description</th>
                <th scope="col">Date_creation</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "include/database.php";
            $categories = $pdo->query("SELECT * from categorie")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($categories as $categorie) {
            ?>
                <tr>
                    <td><?php echo $categorie['id']; ?></td>
                    <td><?php echo $categorie['libelle']; ?></td>
                    <td><?php echo $categorie['description']; ?></td>
                    <td><?php echo $categorie['date_creation']; ?></td>
                    <td>
                       <a href="UpdateCategorie.php ? id=<?php echo $categorie['id'] ?>" class="btn btn-primary btn-sm mr-2">Modifier</a>
                       <a href="SupprimerCategorie.php ? id=<?php echo $categorie['id'] ?> " class="btn btn-danger btn-sm mr-2">Supprimer</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        <a href="AddCategorie.php">
            <button type="button" class="btn btn-success">Add Categorie</button>
        </a>
    </div>
</div>


   
    
</body>
</html>