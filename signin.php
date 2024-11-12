<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e commerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php
    include "include/navbar.php";?>
 <?php
if (isset($_POST["Add"])) {
    $loginValue = $_POST["email"];
    $passwordValue = $_POST["password"];
    $confirmpasswordValue = $_POST["confirmpassword"];
    $emailPattern = "/^[a-zA-Z0-9._%+-]+@emsi\.ma$/";
    


    if (empty($loginValue) || empty($passwordValue) || empty($confirmpasswordValue)) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">
                Veuillez remplir les informations.
              </div></div>';
    } elseif ($passwordValue !== $confirmpasswordValue) {
        echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">
                Le mot de passe est incorrect.
              </div></div>';
              

    } elseif (!preg_match($emailPattern, $loginValue)) {
      echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">
              email  est incorespendant.
            </div></div>';
            

  } 
    else {
        require_once "include/database.php";
        $sqlState = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ? AND password = ?");
        $sqlState->execute([$loginValue, $passwordValue]);

        if ($sqlState->rowCount() >= 1) {
            $_SESSION["utilisateur"] = $sqlState->fetch();
            header("Location: admin.php");
            exit(); 
        } else {
            echo '<div class="d-flex justify-content-center"><div class="alert alert-danger text-center" role="alert" style="max-width: 400px;">
                    Email ou mot de passe est invalide.
                  </div></div>';
        }
    }
} else {
   
}
?>



</div>
  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <form method="post" class="p-5 border rounded" style="width: 500px;">
    <h3 class="text-center mb-4">sign in</h3>
    
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