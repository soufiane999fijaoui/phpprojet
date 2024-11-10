<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e commerce</title>
</head>
<body>
<?php
    include "include/database.php";?>
    <?php
    include "include/navbar.php";?>
    
</div>
  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <form method="post" class="p-5 border rounded" style="width: 500px;">
    <h3 class="text-center mb-4"> Add Product</h3>
    <div class="form-group mb-4">
      <label >libelle</label>
      <input name="libelle" type="text" class="form-control form-control-lg" placeholder="libelle">
    </div>
    <div class="form-group mb-4">
      <label >Price</label>
      <input name="Price" type="number" class="form-control form-control-lg" min="0">
    </div>
    <div class="form-group mb-4">
      <label >Discount</label>
      <input name="Discount" type="number" class="form-control form-control-lg" min="0"max="90"  >
    </div>
    

    <?php
    $categories=$pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <label>Category</label>
    <div class="form-group mb-4">
    
     <select name="categorie" class="form-control">
        <option> Select the category</option>
       <?php
       foreach ( $categories as $category){
        echo "<option value='".$category['id']."'>" .$category['libelle']."</option>";

       }
       ?>
       
     </select>
     

    </div>
    <input type="submit" value="Add Products" class="btn btn-success my-2 d-block mx-auto" name="AddProducts">

    </div>
   
   
  </form>
</div>



</body>
</html>