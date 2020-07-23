<script type="text/javascript">document.title = "Yasu - Login"</script>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $postData = [
    'username' => $_POST['username'],
    'password' => $_POST['password']
  ];

  if(empty($postData['username']) || empty($postData['password'])) {
    echo "<div class='text-center' style='font-weight:bold;color:red;'>Missing data(s)!</div>";
  } else if(!UserLogin($postData['username'], $postData['password'])) {
    echo "<div class='text-center' style='font-weight:bold;color:red;'>Wrong username or password!</div>";
  }

  $postData['password'] = "";
}
?>

<form method="post" class="text-center" style="margin-top: 20px;">
  <div class="form-group col-md-6 mx-auto">
    <input type="text" class="form-control" placeholder="Username" id="loginUsername" name="username" value="<?= isset($postData) ? $postData['username'] : '';?>">
  </div>
  <div class="form-group col-md-6 mx-auto">
    <input type="password" class="form-control" placeholder="Password" id="loginPassword" name="password" value="">
  </div>
  <button type="submit" class="btn btn-primary col-md-3" name="login">Login</button>
</form>
