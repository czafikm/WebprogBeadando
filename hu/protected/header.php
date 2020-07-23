<?php 
date_default_timezone_set('Europe/Budapest');
if(IsUserLoggedIn()){
  $query = "SELECT cash,mission_end,mission_on,mission_time FROM users WHERE id = :id";
  $params = [':id' => $_SESSION['uid']];
  require_once DATABASE_CONTROLLER;
  $datas = getRecord($query, $params);

	$currentdate = date("Y-m-d H:i:s", time());
	if ($currentdate>$datas['mission_end'] && $datas['mission_on']==1) {
		$query = "SELECT username, level, mission_time FROM users WHERE id = :id";
			$params = [':id' => $_SESSION['uid']];
			require_once DATABASE_CONTROLLER;
			$character = getRecord($query, $params);
			$gold;
			switch ($character['mission_time']) {
				case '1':
					$gold=50;
					break;
				case '2':
					$gold=120;
					break;
				case '4':
					$gold=300;
					break;
				case '6':
					$gold=500;
					break;
				
				default:
					$gold=200;
					break;
			}
			$query = "UPDATE users SET cash=cash+:cash,level=level+1,mission_on=0,mission_time=0 WHERE id=:id";
			$params = [
				':id' => $_SESSION['uid'],
				':cash' => $gold
			];

			if(executeDML($query, $params)) {
					echo '<script>window.location="index.php?P=character"</script>';
			}
		}
}
?>
<div id="header">
	<img class="header" src="<?=IMAGE_DIR.'yasuoneveldefejlec.png'?>">
	<div id="flag">
    	<a id="lang_en" ><img  style="top: 20px; right: 56px;" src="<?=IMAGE_DIR.'flag_en.png'?>"></a>
    	<a id="lang_hu" ><img  style="top: 20px; right: 16px;" src="<?=IMAGE_DIR.'flag_hu.png'?>"></a>
    	<?php if(IsUserLoggedIn()) : ?>
    	<img  style="top: 2%; left: 16px;" src="<?=IMAGE_DIR.'goldcoin.png'?>">
    	<span style="top: 1.7%; left: 60px; position: absolute; font-family: 'Josefin Sans', sans-serif; font-size: 120%">
    	<?php 
    	echo $datas['cash']; 
    	?>
    	</span>
    	<?php endif; ?>
	</div>
</div>
<script type="text/javascript">
$('#lang_en').click(function(){
	var current = window.location.href;
	var asd = current.split("?");
	if (asd[1]==null) {
		window.location.href='/yasuo/en/index.php';
	}
	else window.location.href='/yasuo/en/index.php?'+asd[1];
	document.cookie = "language=EN;path=/";
});
$('#lang_hu').click(function(){
	var current = window.location.href;
	var asd = current.split("?");
	if (asd[1]==null) {
		window.location.href='/yasuo/hu/index.php';
	}
	else window.location.href='/yasuo/hu/index.php?'+asd[1];
	document.cookie = "language=HU;path=/";
});


</script>