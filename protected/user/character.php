<?php 
	$query = "SELECT id, username, level, cash, skin FROM users WHERE username = :username";
	$params = [':username' => $_SESSION['username']];
	require_once DATABASE_CONTROLLER;
	$character = getRecord($query, $params);
	if(empty($character)) :
		header('Location: index.php');
	else :?>
		<div align="center"><?php 
		switch ($character['skin']) {
			case '1':
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-blood-moon.jpg'?>" width="15%" alt="Blood Moon"><?php
				break;
			case '2':
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-high-noon.jpg'?>" width="15%" alt=">High Noon"><?php
				break;
			case '3':
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-odyssey.jpg'?>" width="15%" alt="Odyssey"><?php
				break;
			case '4':
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-battleboss.jpg'?>" width="15%" alt="Battleboss"><?php
				break;
			case '0':
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-default.jpg'?>" width="15%" alt="Blood Moon"><?php
				break;
			
			default:
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-default.jpg'?>" width="15%" alt="Blood Moon"><?php
				break;
		}
		?>
		<hr>
		<h2>Felhasználónév: <?=$character['username']?></h2>
		<h4>Szint: <?=$character['level']?></h4>
		<h4>Pénz: <?=$character['cash']?></h4>
		</div>

	<?php endif;

?>