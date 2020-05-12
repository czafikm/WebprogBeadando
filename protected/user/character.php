<?php 
	$query = "SELECT id, username, level, cash, skin FROM users WHERE username = :username";
	$params = [':username' => $_SESSION['username']];
	require_once DATABASE_CONTROLLER;
	$character = getRecord($query, $params);
	if(empty($character)) :
		header('Location: index.php');
	else : 
		switch ($character['skin']) {
			case '1':
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-blood-moon.jpg'?>" class="d-block w-10" alt="Blood Moon"><?php
				break;
			case '2':
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-high-noon.jpg'?>" class="d-block w-10" alt=">High Noon"><?php
				break;
			case '3':
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-odyssey.jpg'?>" class="d-block w-10" alt="Odyssey"><?php
				break;
			case '4':
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-battleboss.jpg'?>" class="d-block w-10" alt="Battleboss"><?php
				break;
			case '0':
					?><img src="<?=PUBLIC_DIR.'Images/yasuo-default.jpg'?>" class="d-block w-10" alt="Blood Moon"><?php
				break;
			
			default:
				# code...
				break;
		}
		?>

		<h2><?=$character['username']?></h2>
		<h4>Szint: <?=$character['level']?></h4>
		<h4>Pénz: <?=$character['cash']?></h4>
	<?php endif;

?>