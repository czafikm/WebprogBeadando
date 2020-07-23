<script type="text/javascript">document.title = "Yasu - Bejelentkezés"</script>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $postData = [
    'username' => $_POST['username'],
    'password' => $_POST['password']
  ];

  if(empty($postData['username']) || empty($postData['password'])) {
    echo "<div class='text-center' style='font-weight:bold;color:red;'>Hiányzó adat(ok)!</div>";
  } else if(!UserLogin($postData['username'], $postData['password'])) {
    echo "<div class='text-center' style='font-weight:bold;color:red;'>Hibás felhasználónév vagy jelszó!</div>";
  }

  $postData['password'] = "";
}
?>

<form method="post" class="text-center" style="margin-top: 20px;">
  <div class="form-group col-md-6 mx-auto">
    <input type="text" class="form-control" placeholder="Felhasználónév" id="loginUsername" name="username" value="<?= isset($postData) ? $postData['username'] : '';?>">
  </div>
  <div class="form-group col-md-6 mx-auto">
    <input type="password" class="form-control" placeholder="Jelszó" id="loginPassword" name="password" value="">
  </div>
  <button type="submit" class="btn btn-primary col-md-3" name="login">Bejelentkezés</button>
</form>