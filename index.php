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
if (isset($_POST["Add"])) {
    $firstnameValue = $_POST["firstname"];
    $lastnameValue = $_POST["lastname"];
    $loginValue = $_POST["email"];
    $passwordValue = $_POST["password"];
    $confirmpasswordValue = $_POST["confirmpassword"];

    $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $passwordPattern = "/^(?=.*[A-Z])(?=.*[0-9]).{8,}$/";

    if (empty($firstnameValue) || empty($lastnameValue) || empty($loginValue) || empty($passwordValue) || empty($confirmpasswordValue)) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">Veuillez remplir les informations!</div></div>';
    } elseif (!preg_match($emailPattern, $loginValue)) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">L\'adresse e-mail est invalide!</div></div>';
    } elseif (!preg_match($passwordPattern, $passwordValue)) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">Le mot de passe doit contenir au moins une lettre majuscule et un chiffre.</div></div>';
    } elseif ($passwordValue !== $confirmpasswordValue) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">Les mots de passe ne correspondent pas!</div></div>';
    } else {
        require_once "include/database.php";
        
        $checkUser = $pdo->prepare("SELECT * FROM utilisateur WHERE first_name = ? AND last_name = ?");
        $checkUser->execute([$firstnameValue, $lastnameValue]);
        $existingUser = $checkUser->fetch();

        if ($existingUser) {
            echo '<div class="d-flex justify-content-center"><div class="alert alert-warning text-center" role="alert" style="max-width: 400px;">Cet utilisateur est déjà connu!</div></div>';
        } else {
            $date = date("Y-m-d");
            $sqlState = $pdo->prepare("INSERT INTO utilisateur VALUES(null,?,?,?,?,?,?)");
            $sqlState->execute([$firstnameValue, $lastnameValue, $loginValue, $passwordValue, $confirmpasswordValue, $date]);
            header("Location: connexion.php");
            exit();
        }
    }
} else {
    echo '<div class="d-flex justify-content-center"><div class="alert alert-warning text-center" role="alert" style="max-width: 400px;">Veuillez vous connecter !</div></div>';
}
?>



    
</div>
  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <form method="post" class="p-5 border rounded" style="width: 500px;">
    <h3 class="text-center mb-4">sign up</h3>
    <div class="form-group mb-4">
      <label >FirstName</label>
      <input name="firstname" type="text" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="FirstName">
    </div>

    <div class="form-group mb-4">
      <label >LastName</label>
      <input name="lastname" type="text" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="LastName">
    </div>
    <div class="form-group mb-4">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control form-control-lg" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group mb-4">
      <label for="exampleInputPassword1">Password</label>
      <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
    </div>

    <div class="form-group mb-4">
      <label for="exampleInputPassword1">Comfirm Password</label>
      <input name="confirmpassword" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Comfirm Password">
    </div>
    <button name="Add" type="submit" class="btn btn-success w-100 btn-lg">Submit</button>
  </form>
</div>



</body>
</html>