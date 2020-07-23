<script type="text/javascript">document.title = "Yasu - Profil"</script>
<?php 
  $query = "SELECT id, skin1_owned, skin2_owned, skin3_owned, skin4_owned,skin, username, level, cash, skin FROM users WHERE id = :id";
  $params = [':id' => $_GET['u']];
  require_once DATABASE_CONTROLLER;
  $character = getRecord($query, $params);
  switch ($character['skin']) {
    case '0':?>
            <div align="center">
          <img src="<?=PUBLIC_DIR.'Images/yasuo-default.jpg'?>" width="15%" class="d-block" alt="Default">
              <div>
                <h5 style=" font-variant: small-caps; font-weight: bold;">Alapértelmezett</h5>
              </div>
            </div><?php
      break;
      case '1':?>
            <div align="center">
          <img src="<?=PUBLIC_DIR.'Images/yasuo-blood-moon.jpg'?>" class="d-block w-15" alt="Blood Moon">
              <div>
                <h5 style=" font-variant: small-caps; font-weight: bold;">Blood Moon</h5>
              </div>
            </div><?php
      break;
      case '2':?>
            <div align="center">
          <img src="<?=PUBLIC_DIR.'Images/yasuo-high-noon.jpg'?>" class="d-block w-15" alt=">High Noon">
              <div>
                <h5 style=" font-variant: small-caps; font-weight: bold;">High Noon</h5>
              </div>
            </div><?php
      break;
      case '3':?>
            <div align="center">
          <img src="<?=PUBLIC_DIR.'Images/yasuo-odyssey.jpg'?>" class="d-block w-15" alt="Odyssey">
              <div>
                <h5 style=" font-variant: small-caps; font-weight: bold;">Odyssey</h5>
              </div>
            </div><?php
      break;
      case '4':?>
            <div align="center">
          <img src="<?=PUBLIC_DIR.'Images/yasuo-battleboss.jpg'?>" class="d-block w-15" alt="Battleboss">
              <div>
                <h5 style=" font-variant: small-caps; font-weight: bold;">Battleboss</h5>
              </div>
            </div><?php
      break;
    
    default:
      # code...
      break;
  }
?>
  <?php
  if(empty($character)) :
    echo "Hiba a felhasználó betöltése során!";
  else :?>
    <div align="center">
    <hr>
    <h2>Felhasználónév: <?=$character['username']?></h2>
    <h4>Szint: <?=$character['level']?></h4>
    <h4>Pénz: <?=$character['cash']?></h4>
    </div>

  <?php endif;

?>