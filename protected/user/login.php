<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $postData = [
    'username' => $_POST['username'],
    'password' => $_POST['password']
  ];

  if(empty($postData['username']) || empty($postData['password'])) {
    echo "Hiányzó adat(ok)!";
  } else if(!UserLogin($postData['username'], $postData['password'])) {
    echo "Hibás felhasználónév cím vagy jelszó!";
  }

  $postData['password'] = "";
}
?>

<form method="post">
  <div class="form-group">
    <label for="loginUsername">Username</label>
    <input type="text" class="form-control" id="loginUsername" aria-describedby="Username" name="username" value="<?= isset($postData) ? $postData['username'] : '';?>">
  </div>
  <div class="form-group">
    <label for="loginPassword">Password</label>
    <input type="password" class="form-control" id="loginPassword" name="password" value="">
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>