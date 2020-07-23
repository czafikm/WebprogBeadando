<script type="text/javascript">document.title = "Yasu - Toplist"</script>
<?php 
	$query = "SELECT id, username, level, cash FROM users ORDER BY level DESC, cash DESC";
	require_once DATABASE_CONTROLLER;
	$users = getList($query);
	?>
	<?php if(count($users) <= 0) : ?>
		<h1>No users found in the database.</h1>
	<?php else : ?>
		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col" style="font-weight: bold; font-size: 100%;">Username</th>
					<th scope="col" style="font-weight: bold; font-size: 100%;">Level</th>
					<th scope="col" style="font-weight: bold; font-size: 100%;">Gold</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($users as $u) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><a href="?P=profile&u=<?=$u['id'] ?>"><?=$u['username'] ?></a></td>
						<td><?=$u['level'] ?></td>
						<td><?=$u['cash'] ?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; 
	?>

