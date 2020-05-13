<?php
    $query = "SELECT skin1_owned,skin2_owned,skin3_owned,skin4_owned,cash FROM users WHERE username=:username";
    $params = $params = [
      ':username' => $_SESSION['username'],
    ]; 
    require_once DATABASE_CONTROLLER;
    $skins = getRecord($query,$params);

    if(isset($_POST['s']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = $_POST['s'];
      if ($data==20) {
        if ($skins['cash'] < 100) {
          echo "Nincs elég pénzed!";
        }
        else{
          BuySkin($_SESSION['username'],1,);
        }
      }
      else if($data==30){
        if ($skins['cash'] < 200) {
          echo "Nincs elég pénzed!";
        }
        else{
          BuySkin($_SESSION['username'],2,);
        }
      }
      else if($data==40){
        if ($skins['cash']<300) {
          echo "Nincs elég pénzed!";
        }
        else{
          BuySkin($_SESSION['username'],3,);
        }
        
      }
      else if($data==50){
        if ($skins['cash'] < 400) {
          echo "Nincs elég pénzed!";
        }
        else{
          BuySkin($_SESSION['username'],4,);
        }
        
      }
    }

    
    if(!array_key_exists('s', $_GET) || empty($_GET['s']))
        $_GET['s'] = 'home';
      else{
        switch ($_GET['s']){
        case '11': ChangeSkin($_SESSION['username'],0); break;
        case '21': ChangeSkin($_SESSION['username'],1); break;
        case '31': ChangeSkin($_SESSION['username'],2); break;
        case '41': ChangeSkin($_SESSION['username'],3); break;
        case '51': ChangeSkin($_SESSION['username'],4); break;
        }
      }

?>

<div border-style="solid" id="carouselExampleCaptions" data-interval="false" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
</ol>
  <h1 align="center">Válassz egy skint</h1>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="<?=PUBLIC_DIR.'Images/yasuo-default.jpg'?>" class="d-block w-15" alt="Default">
      <div class="carousel-caption d-none d-md-block">
        <h5>Default</h5>
      </div>
    </div>
        <div class="carousel-item">
        <img src="<?=PUBLIC_DIR.'Images/yasuo-blood-moon.jpg'?>" class="d-block w-15" alt="Blood Moon">
      <div class="carousel-caption d-none d-md-block">
        <h5>Blood Moon</h5>
      </div>
    </div>
    <div class="carousel-item">
        <img src="<?=PUBLIC_DIR.'Images/yasuo-high-noon.jpg'?>" class="d-block w-15" alt=">High Noon">
      <div class="carousel-caption d-none d-md-block">
        <h5>High Noon</h5>
      </div>
    </div>
    <div class="carousel-item">
        <img src="<?=PUBLIC_DIR.'Images/yasuo-odyssey.jpg'?>" class="d-block w-15" alt="Odyssey">
      <div class="carousel-caption d-none d-md-block">
        <h5>Odyssey</h5>
      </div>
    </div>
    <div class="carousel-item">
        <img src="<?=PUBLIC_DIR.'Images/yasuo-battleboss.jpg'?>" class="d-block w-15" alt="Battleboss">
      <div class="carousel-caption d-none d-md-block">
        <h5>Battleboss</h5>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<h4 align="center" id="skinCost">Megszerezve!</h4>
  <div class="col text-center">
          <button type="submit" class="btn btn-primary col-md-3" name="buySkin" onclick="myFunction()">Choose/Buy Skin</button>
  </div>

<script type="text/javascript">

function myFunction(){
  var data = 's=' + currentIndex + "" + owned;
    if (owned==1) {
      $.ajax({
      type: 'get',
      data: data,

      }); 
    }
    else{
      jQuery.ajax({
      type: 'POST',
      data: data,

      success:function(response) {
         console.log('s=' + currentIndex + "" + owned)
       },
      }); 
    }

}

var owned = 1;
var totalItems = $('.item').length;
var currentIndex = $('div.active').index() + 1;

$('#carouselExampleCaptions').on('slid.bs.carousel', function() {
    currentIndex = $('div.active').index() + 1;
   $('.num').html(''+currentIndex+'/'+totalItems+'');
   switch(currentIndex){
    case 1:
      owned=1;
      document.getElementById("skinCost").innerHTML = "Megszerezve!";
      break;
    case 2:
      var skin = "<?php echo $skins['skin1_owned'] ?>";
      if (skin=="1") {
        owned=1;
        document.getElementById("skinCost").innerHTML = "Megszerezve!";
      }else{
        owned=0;
        document.getElementById("skinCost").innerHTML = "Ár: 100";
      } 
      break;
    case 3:
      var skin = "<?php echo $skins['skin2_owned'] ?>";
      if (skin=="1") {
        owned = 1;
        document.getElementById("skinCost").innerHTML = "Megszerezve!";
      }else{
        owned=0;
        document.getElementById("skinCost").innerHTML = "Ár: 200";
      } 
      break;
    case 4:
      var skin = "<?php echo $skins['skin3_owned'] ?>";
      if (skin=="1") {
        owned = 1;
        document.getElementById("skinCost").innerHTML = "Megszerezve!";
      }else{
        owned=0;
        document.getElementById("skinCost").innerHTML = "Ár: 300";
      } 
      break;
    case 5:
      var skin = "<?php echo $skins['skin4_owned'] ?>";
      if (skin=="1") {
        owned = 1;
        document.getElementById("skinCost").innerHTML = "Megszerezve!";
      }else{
        owned=0;
        document.getElementById("skinCost").innerHTML = "Ár: 400";
      } 
      break;

    default:
      document.getElementById("skinCost").innerHTML = "ERROR";
      break;
   }
   console.log(currentIndex);
});


</script>