<script type="text/javascript">document.title = "Yasu - Kinézetek"</script>
<?php
    $query = "SELECT skin1_owned,skin2_owned,skin3_owned,skin4_owned,cash FROM users WHERE username=:username";
    $params = [
      ':username' => $_SESSION['username'],
    ]; 
    require_once DATABASE_CONTROLLER;
    $skins = getRecord($query,$params);
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
      $skin=$_POST['submit'];
      switch ($skin) {
        case '1':
            if ($skins['cash']<100) {
              echo "<div class='text-center' style='font-weight:bold;color:red;'>Nincs elég pénzed!</div>";
            }else{
              BuySkin($_SESSION['username'],1);
            } 
          break;
        case '2':
            if ($skins['cash']<200) {
              echo "<div class='text-center' style='font-weight:bold;color:red;'>Nincs elég pénzed!</div>";
            }else{
              BuySkin($_SESSION['username'],2);
            } 
          break;
        case '3':
            if ($skins['cash']<300) {
              echo "<div class='text-center' style='font-weight:bold;color:red;'>Nincs elég pénzed!</div>";
            }else{
              BuySkin($_SESSION['username'],3);
            } 
          break;
        case '4':
            if ($skins['cash']<400) {
              echo "<div class='text-center' style='font-weight:bold;color:red;'>Nincs elég pénzed!</div>";
            }else{
              BuySkin($_SESSION['username'],4);
            } 
          break;
        
        default:
          break;
      }
}
?>
<form method="post">
  <div border-style="solid" id="carouselExampleCaptions" data-interval="false" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
</ol>
  <h1 align="center" style=" font-variant: small-caps; font-weight: bold;">Válassz egy kinézetet</h1>
  <div class="carousel-inner">
    <div class="carousel-item active">
          <img src="<?=IMAGE_DIR.'yasuo-default.jpg'?>" class="d-block w-15" alt="Default">
      <div class="carousel-caption d-none d-md-block">
        <h5>Alapértelmezett</h5>
      </div>
    </div>
        <div class="carousel-item">
          <img src="<?=IMAGE_DIR.'yasuo-blood-moon.jpg'?>" class="d-block w-15" alt="Blood Moon">
      <div class="carousel-caption d-none d-md-block">
        <h5>Blood Moon</h5>
      </div>
    </div>
    <div class="carousel-item">
        <img src="<?=PIMAGE_DIR.'yasuo-high-noon.jpg'?>" class="d-block w-15" alt=">High Noon">
      <div class="carousel-caption d-none d-md-block">
        <h5>High Noon</h5>
      </div>
    </div>
    <div class="carousel-item">
        <img src="<?=IMAGE_DIR.'yasuo-odyssey.jpg'?>" class="d-block w-15" alt="Odyssey">
      <div class="carousel-caption d-none d-md-block">
        <h5>Odyssey</h5>
      </div>
    </div>
    <div class="carousel-item">
            <img src="<?=IMAGE_DIR.'yasuo-battleboss.jpg'?>" class="d-block w-15" alt="Battleboss">
      <div class="carousel-caption d-none d-md-block">
        <h5>Battleboss</h5>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <i class="fas fa-arrow-left"></i>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <i class="fas fa-arrow-right"></i>
  </a>
</div>
<hr style="height: 0px;">
<h4 class="text-center" id="prices" style=" font-variant: small-caps; font-weight: bold;">&nbsp;</h4>
<div class="text-center">
  <button type="submit" disabled="true" class="btn btn-primary btn btn-primary col-md-3" name="submit"
  value="" id="skinCost">Megszerezve!</button>
</div>
</form>


<script type="text/javascript">




var owned = 1;
var totalItems = $('.item').length;
var currentIndex = $('div.active').index() + 1;

$('#carouselExampleCaptions').on('slid.bs.carousel', function() {
    currentIndex = $('div.active').index() + 1;
   $('.num').html(''+currentIndex+'/'+totalItems+'');
   switch(currentIndex){
    case 1:
      owned=1;
      document.getElementById("skinCost").disabled = true;
      document.getElementById("skinCost").innerText = "Megszerezve!";
      document.getElementById("prices").innerText = '\xa0';
      break;
    case 2:
      var skin = "<?php echo $skins['skin1_owned'] ?>";
      if (skin=="1") {
        owned=1;
          document.getElementById("skinCost").disabled = true;
          document.getElementById("skinCost").innerText = "Megszerezve!";
          document.getElementById("prices").innerText = '\xa0';
      }else{
        owned=0;
        document.getElementById("skinCost").disabled = false;
        document.getElementById("skinCost").innerText = "Vásárlás!";
        document.getElementById("skinCost").value = "1";
        document.getElementById("prices").innerText = "Ár: 100";
      } 
      break;
    case 3:
      var skin = "<?php echo $skins['skin2_owned'] ?>";
      if (skin=="1") {
        owned = 1;
        document.getElementById("skinCost").disabled = true;
        document.getElementById("skinCost").innerText = "Megszerezve!";
        document.getElementById("prices").innerText = '\xa0';
      }else{
        owned=0;
        document.getElementById("skinCost").disabled = false;
        document.getElementById("skinCost").innerText = "Vásárlás!";
        document.getElementById("skinCost").value = "2";
        document.getElementById("prices").innerText = "Ár: 200";
      } 
      break;
    case 4:
      var skin = "<?php echo $skins['skin3_owned'] ?>";
      if (skin=="1") {
        owned = 1;
        document.getElementById("skinCost").disabled = true;
        document.getElementById("skinCost").innerText = "Megszerezve!";
        document.getElementById("prices").innerText = '\xa0';
      }else{
        owned=0;
        document.getElementById("skinCost").disabled = false;
        document.getElementById("skinCost").innerText = "Vásárlás!";
        document.getElementById("skinCost").value = "3";
        document.getElementById("prices").innerText = "Ár: 300";
      } 
      break;
    case 5:
      var skin = "<?php echo $skins['skin4_owned'] ?>";
      if (skin=="1") {
        owned = 1;
        document.getElementById("skinCost").disabled = true;
        document.getElementById("skinCost").innerText = "Megszerezve!";
        document.getElementById("prices").innerText = '\xa0';
      }else{
        owned=0;
        document.getElementById("skinCost").disabled = false;
        document.getElementById("skinCost").innerText = "Vásárlás!";
        document.getElementById("skinCost").value = "4";
        document.getElementById("prices").innerText = "Ár: 400";

      } 
      break;

    default:
      document.getElementById("skinCost").innerText = "ERROR!";
      break;
   }

   console.log(currentIndex);
});


</script>