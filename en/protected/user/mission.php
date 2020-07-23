<script type="text/javascript">document.title = "Yasu - Mission"</script>
<?php 
	date_default_timezone_set('Europe/Budapest');
	$query = "SELECT mission_end,mission_on,mission_time FROM users WHERE id = :id";
	$params = [':id' => $_SESSION['uid']];
	require_once DATABASE_CONTROLLER;
	$mission = getRecord($query, $params);
	$currentdate = date("Y-m-d H:i:s", time());
	if ($currentdate>$mission['mission_end'] && $mission['mission_on']==1) {
		$query = "UPDATE users SET mission_on=0, mission_time=0 WHERE id = :id";
			$params = [
				':id' => $_SESSION['uid']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "<div class='text-center' style='font-weight:bold;color:red;'>Error!</div>";
			}
			echo '<script>window.location="index.php?P=mission"</script>';
	}
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['startMission'])) {
			$date = date("Y-m-d H:i:s", strtotime('+'.$_POST['missionTime'].' hours'));
			$postData = [
				'id' => $_SESSION['uid'],
				'mission_end' => $date,
				'mission_time' => $_POST['missionTime']
			];
			$query = "UPDATE users SET mission_end=:mission_end, mission_on=1, mission_time=:mission_time WHERE id = :id";
			$params = [
				':mission_end' => $postData['mission_end'],
				':mission_time' => $postData['mission_time'],
				':id' => $postData['id']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "<div class='text-center' style='font-weight:bold;color:red;'>Error!</div>";
			}
			echo '<script>window.location="index.php?P=mission"</script>';
}
	if(isset($_POST['s']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = $_POST['s'];
      if ($data=="done") {
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
<?php if(isset($mission['mission_on']) && $mission['mission_on'] == 0) : ?>
<h1 id="missionTitle" align="center" style=" font-variant: small-caps; font-weight: bold; margin-bottom: 20px;">Mission</h1>
<form method="post">
	  <div class="text-center">
  		<label id="missionLabel" for="missionTime">Choose how long you want to on a the mission: </label>
	  	<select name="missionTime" id="missionTime">
		    <option id="1hour" value="1">1 hour</option>
		    <option id="2hour" value="2">2 hours</option>
		    <option id="4hour" value="4">4 hours</option>
		    <option id="6hour" value="6">6 hours</option>
	  	</select>
		<div class="col text-center" style="padding-top: 20px;">
			<button type="submit" class="btn btn-primary col-md-2" name="startMission" >GO</button>
		</div>
  	  </div>
</form>
<?php else: ?>
  <div class="text-center" style="margin-bottom: 30px;">
  <img src="<?=IMAGE_DIR.'yasugif.gif'?>">
</div>
<!-- Display the countdown timer in an element -->
<p id="demo" style="font-weight: bold;" align="center">&nbsp;</p>


<script type="text/javascript">
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $mission['mission_end']?>").getTime();
var now = new Date("<?php echo date("Y-m-d H:i:s")?>").getTime();
console.log(new Date("<?php echo $mission['mission_end']?>"));
console.log(new Date("<?php echo date("Y-m-d H:i:s", time())?>"));
var distance = countDownDate-now;
function countdownTimeStart(){


// Update the count down every 1 second
var x = setInterval(function() {

    // Find the distance between now an the count down date
    distance = distance - 1000;
    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 1) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "A küldetés véget ért.";
    	$.ajax({
                type:'POST',
                data:{
                    s:"done"
                },
                success:function(data){
                }
            });
    }
}, 1000);
}
if (countDownDate-now>0) {
	countdownTimeStart();
}

</script>
<?php endif; ?>