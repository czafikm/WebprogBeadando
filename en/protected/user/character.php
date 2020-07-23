<script type="text/javascript">document.title = "Yasu - Character"</script>
<?php 
  $query = "SELECT id, skin1_owned, skin2_owned, skin3_owned, skin4_owned,skin, username, level, cash, skin FROM users WHERE username = :username";
  $params = [':username' => $_SESSION['username']];
  require_once DATABASE_CONTROLLER;
  $character = getRecord($query, $params);
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
      $skin=$_POST['submit'];
      ChangeSkin($character['username'],$skin);

}

?>
  <form method="post">
  <div border-style="solid" id="carouselExampleCaptions" data-interval="false" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li id="slide1" data-target="#carouselExampleCaptions" data-slide-to="0"></li>
    <li id="slide2" data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li id="slide3" data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li id="slide4" data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    <li id="slide5" data-target="#carouselExampleCaptions" data-slide-to="4"></li>
</ol>

  <h1 align="center" style=" font-variant: small-caps; font-weight: bold;">Skins</h1>
  <div class="carousel-inner">
    <div id="item1" class="carousel-item">



<script type="text/javascript">


var activeSkin = "<?php echo $character['skin'] ?>";
  switch(activeSkin){
  case '0':
    document.getElementById("item1").setAttribute("class", "carousel-item active");

    document.getElementById("slide1").classList.add("active");

    break;
}
</script>



          <img src="<?=PUBLIC_DIR.'Images/yasuo-default.jpg'?>" width="15%" class="d-block" alt="Default">
      <div class="carousel-caption d-none d-md-block">
        <h5>Default</h5>
      </div>
    </div>
        <div id="item2" class="carousel-item">


<script type="text/javascript">
  switch(activeSkin){

  case '1':
    document.getElementById("item2").setAttribute("class", "carousel-item active");


    document.getElementById("slide2").classList.add("active");

    break;
}
</script>


          <img src="<?=PUBLIC_DIR.'Images/yasuo-blood-moon.jpg'?>" width="15%" class="d-block" alt="Blood Moon">
      <div class="carousel-caption d-none d-md-block">
        <h5>Blood Moon</h5>
      </div>
    </div>
    <div id="item3" class="carousel-item">



<script type="text/javascript">
  switch(activeSkin){
  case '2':
    document.getElementById("item3").setAttribute("class", "carousel-item active");

    document.getElementById("slide3").classList.add("active");

    break;
}
</script>



        <img src="<?=PUBLIC_DIR.'Images/yasuo-high-noon.jpg'?>" width="15%" class="d-block" alt=">High Noon">
      <div class="carousel-caption d-none d-md-block">
        <h5>High Noon</h5>
      </div>
    </div>
    <div id="item4" class="carousel-item">



<script type="text/javascript">
  switch(activeSkin){
  case '3':
    document.getElementById("item4").setAttribute("class", "carousel-item active");

    document.getElementById("slide4").classList.add("active");

    break;
}
</script>




        <img src="<?=PUBLIC_DIR.'Images/yasuo-odyssey.jpg'?>" width="15%" class="d-block" alt="Odyssey">
      <div class="carousel-caption d-none d-md-block">
        <h5>Odyssey</h5>
      </div>
    </div>
    <div id="item5" class="carousel-item">



<script type="text/javascript">
  switch(activeSkin){
  case '4':
    document.getElementById("item5").setAttribute("class", "carousel-item active");

    document.getElementById("slide5").classList.add("active");

    break;
}
</script>




            <img src="<?=PUBLIC_DIR.'Images/yasuo-battleboss.jpg'?>" width="15%" class="d-block " alt="Battleboss">
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
<div class="text-center">
  <button type="submit" disabled="true" class="btn btn-primary btn btn-primary col-md-3" name="submit"
  value="" id="skinCost">Owned!</button>
</div>
</form>
  <?php
  if(empty($character)) :
    header('Location: index.php');
  else :?>
    <div align="center">
    <hr>
    <h2>Username: <?=$character['username']?></h2>
    <h4>Level: <?=$character['level']?></h4>
    <h4>Gold: <?=$character['cash']?></h4>
    </div>

  <?php endif;

?>

<script type="text/javascript">



  document.getElementById("skinCost").disabled = true;
  document.getElementById("skinCost").innerText = "Activated!";


var totalItems = $('.item').length;
var currentIndex = $('div.active').index() + 1;

$('#carouselExampleCaptions').on('slid.bs.carousel', function() {
    currentIndex = $('div.active').index() + 1;
   $('.num').html(''+currentIndex+'/'+totalItems+'');
   gombok();


   console.log(currentIndex);
});
function gombok(){
       switch(currentIndex){
    case 1:
        if (activeSkin=="0") {
      document.getElementById("skinCost").disabled = true;
      document.getElementById("skinCost").innerText = "Activated!";
    }else{
      document.getElementById("skinCost").disabled = false;
      document.getElementById("skinCost").innerText = "Activate!";
    }

      break;
    case 2:
      var skin = "<?php echo $character['skin1_owned'] ?>";
      if (skin=="1") {
        if (activeSkin=="1") {
      document.getElementById("skinCost").disabled = true;
      document.getElementById("skinCost").innerText = "Activated!";
    }else{
      document.getElementById("skinCost").disabled = false;
      document.getElementById("skinCost").innerText = "Activate!";
          document.getElementById("skinCost").value = "1";
    }
      }else{
        document.getElementById("skinCost").disabled = true;
        document.getElementById("skinCost").innerText = "Not obtained!";

      } 
      break;
    case 3:
      var skin = "<?php echo $character['skin2_owned'] ?>";
      if (skin=="1") {
        if (activeSkin=="2") {
      document.getElementById("skinCost").disabled = true;
      document.getElementById("skinCost").innerText = "Activated!";
    }else{
      document.getElementById("skinCost").disabled = false;
      document.getElementById("skinCost").innerText = "Activate!";
      document.getElementById("skinCost").value = "2";
    }
      }else{
        document.getElementById("skinCost").disabled = true;
        document.getElementById("skinCost").innerText = "Not obtained!";
      } 
      break;
    case 4:
      var skin = "<?php echo $character['skin3_owned'] ?>";
      if (skin=="1") {
        if (activeSkin=="3") {
      document.getElementById("skinCost").disabled = true;
      document.getElementById("skinCost").innerText = "Activated!";
    }else{
      document.getElementById("skinCost").disabled = false;
      document.getElementById("skinCost").innerText = "Activate!";
      document.getElementById("skinCost").value = "3";
    }
      }else{
        document.getElementById("skinCost").disabled = true;
        document.getElementById("skinCost").innerText = "Not obtained!";
      } 
      break;
    case 5:
      var skin = "<?php echo $character['skin4_owned'] ?>";
      if (skin=="1") {
        if (activeSkin=="4") {
      document.getElementById("skinCost").disabled = true;
      document.getElementById("skinCost").innerText = "Activated!";
    }else{
      document.getElementById("skinCost").disabled = false;
      document.getElementById("skinCost").innerText = "Activate!";
      document.getElementById("skinCost").value = "4";
    }
      }else{
        document.getElementById("skinCost").disabled = true;
        document.getElementById("skinCost").innerText = "Not obtained!";

      } 
      break;

    default:
      document.getElementById("skinCost").innerText = "ERROR!";
      break;
   }
}


</script>
