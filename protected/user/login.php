<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $postData = [
    'username' => $_POST['username'],
    'password' => $_POST['password']
  ];

  if(empty($postData['username']) || empty($postData['password'])) {
    echo "Hiányzó adat(ok)!";
  } else if(!UserLogin($postData['username'], $postData['password'])) {
    echo "Hibás felhasználónév vagy jelszó!";
  }

  $postData['password'] = "";
}
?>

<form method="post" class="text-center" >
  <div class="form-group col-md-6 mx-auto">
    <input type="text" class="form-control" placeholder="Username" id="loginUsername" name="username" value="<?= isset($postData) ? $postData['username'] : '';?>">
  </div>
  <div class="form-group col-md-6 mx-auto">
    <input type="password" class="form-control" placeholder="Password" id="loginPassword" name="password" value="">
  </div>
  <button type="submit" class="btn btn-primary col-md-3" name="login">Login</button>
</form>