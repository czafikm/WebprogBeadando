<?php 
if(array_key_exists('d', $_GET) && !empty($_GET['d'])) {
			$query = "DELETE FROM users WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba törlés közben!";
			}
		}
	$query = "SELECT id, username, first_name, last_name, email, permission, level, cash FROM users";
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
					<th scope="col">Username</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Email</th>
					<th scope="col">Level</th>
					<th scope="col">Money</th>
					<th scope="col">Permission</th>
					<th scope="col">Szerkesztés</th>
					<th scope="col">Törlés</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($users as $u) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$u['username'] ?></td>
						<td><?=$u['first_name'] ?></td>
						<td><?=$u['last_name'] ?></td>
						<td><?=$u['email'] ?></td>
						<td><?=$u['level'] ?></td>
						<td><?=$u['cash'] ?></td>
						<td><?=$u['permission'] ?></td>
						<td><a href="?P=edit_user&u=<?=$u['id'] ?>">Edit</a></td>
						<td><a href="?P=list_user&d=<?=$u['id'] ?>">Delete</a></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>