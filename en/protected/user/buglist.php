<script type="text/javascript">document.title = "Yasu - Buglist"</script>
<?php 
if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			$query = "DELETE FROM bug WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "<div class='text-center' style='font-weight:bold;color:red;'>Error!</div>";
			}
}else if(array_key_exists('j', $_GET) && !empty($_GET['j'])){
			$query = "UPDATE bug SET bugDangerLevel = 0 WHERE id = :id";
			$params = [
				':id' => $_GET['j'],
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "<div class='text-center' style='font-weight:bold;color:red;'>Unexpected error!</div>";
			}
}
	$query = "SELECT id,username, subject, message, bugDangerLevel FROM bug";
	require_once DATABASE_CONTROLLER;
	$bugs = getList($query);
	?>
	<?php if(count($bugs) <= 0) : ?>
		<div class='text-center' style='font-weight:bold;color:red;'>There are no bugreports in the database.</div>
	<?php else : ?>
		<h1 align="center" style=" font-variant: small-caps; font-weight: bold; margin-bottom: 20px;">Bug report</h1>
		<table id="dtBasicExample" class="table table-striped table-sm" style="table-layout: fixed;">
			<thead class="thead-dark">
				<tr>
					<th scope="col" style="font-weight: bold; font-size: 100%; width: 5%;">#</th>
					<th scope="col" style="font-weight: bold; font-size: 100%; width: 15%;">Username</th>
					<th scope="col" style="font-weight: bold; font-size: 100%; width: 20%;">Subject</th>
					<th scope="col" style="font-weight: bold; font-size: 100%; width: 45%;">Report</th>
					<th scope="col" class="text-center" style="font-weight: bold; font-size: 100%; width: 15%;">Priority</th>
					<th scope="col" class="text-center" style="font-weight: bold; font-size: 100%; width: 15%;">Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($bugs as $b) : ?>
					<?php $i++; ?>
					<?php if($b['bugDangerLevel']==1) :?>
					<tr class="yellow darken-2">
					<?php elseif($b['bugDangerLevel']==2) :?>
					<tr class="orange darken-3">
					<?php elseif($b['bugDangerLevel']==3) :?>
					<tr class="danger-color">
					<?php elseif($b['bugDangerLevel']==0) :?>
					<tr class="success-color">
					<?php endif; ?>
						<th style="vertical-align: middle;" scope="row"><?=$i ?></th>
						<td style="vertical-align: middle;"><?=$b['username'] ?></td>
						<td style="vertical-align: middle;"><?=$b['subject'] ?></td>
						<td style="vertical-align: middle;"><?=$b['message'] ?></td>
						<td style="vertical-align: middle; font-weight: bold; font-size: 90%;" class="text-center"><?=$b['bugDangerLevel'] ?></td>
						<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] == 3) : ?>
							<?php if($b['bugDangerLevel']==0) :?>
							<td style="vertical-align: middle;  font-weight: bold; font-size: 90%;" class="text-center">Fixed!</td>
							<?php else :?>
							<td style="vertical-align: middle;  font-weight: bold; font-size: 90%;" class="text-center"><a href="?P=buglist&j=<?=$b['id'] ?>" onclick="return confirm('Biztosan javítva lett a &quot;<?=$b['username'] ?>&quot; által bejelentett hiba?')">Fixed?</a></td>
							<?php endif; ?>
						<?php else :?>
							<?php if($b['bugDangerLevel']==0) :?>
							<td style="vertical-align: middle;  font-weight: bold; font-size: 90%;" class="text-center">Fixed!</td>
							<?php else :?>
							<td style="vertical-align: middle;  font-weight: bold; font-size: 90%;" class="text-center">Not Fixed</td>
							<?php endif; ?>
						<?php endif; ?>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
	<script type="text/javascript">
		$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
	</script>

