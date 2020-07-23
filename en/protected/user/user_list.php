<script type="text/javascript">document.title = "Yasu - User list"</script>
<?php 
if(array_key_exists('d', $_GET) && !empty($_GET['d']) && array_key_exists('u', $_GET) && !empty($_GET['u'])) {
			$query = "DELETE FROM users WHERE id = :id";
			$params = [':id' => $_GET['d']];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "<div class='text-center' style='font-weight:bold;color:red;'>Error!</div>";
			}
			$myfile = fopen(PROTECTED_DIR."logs/user_delete_logs.txt", "a") or die("Unable to open file!");
			$txt = "Deleted by: ".$_SESSION['username']." | "."Deleted: ".$_GET['u']."\r\n";
			fwrite($myfile, $txt);
			fclose($myfile);
		}
	$query = "SELECT id, username, email, permission, level, cash FROM users";
	require_once DATABASE_CONTROLLER;
	$users = getList($query);
	?>
	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] <2 ) : ?>
	<h1 align="center" style="color:red;">You have no access for this page!</h1>
	<?php else:; ?>
	<?php if(count($users) <= 0) : ?>
		<h1>No users found in the database.</h1>
	<?php else : ?>
		<table class="table table-striped">
			<thead class="thead-dark"  style="font-weight: bold;">
				<tr>
					<th scope="col"  style="font-weight: bold; font-size: 100%;">#</th>
					<th scope="col"  style="font-weight: bold; font-size: 100%;">Username</th>
					<th scope="col"  style="font-weight: bold; font-size: 100%;">E-Mail address</th>
					<th scope="col"  style="font-weight: bold; font-size: 100%;">Level</th>
					<th scope="col"  style="font-weight: bold; font-size: 100%;">Gold</th>
					<th scope="col"  style="font-weight: bold; font-size: 100%;">Permission</th>
					<th scope="col"></th>
					<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] == 3) : ?>
					<th scope="col"></th>
					<?php endif;?>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($users as $u) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$u['username'] ?></td>
						<td><?=$u['email'] ?></td>
						<td><?=$u['level'] ?></td>
						<td><?=$u['cash'] ?></td>
						<td><?=$u['permission'] ?></td>
					<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] == 3) : ?>
						<td><a href="?P=edit_user&u=<?=$u['id'] ?>" >Edit</a></td>
						<?php else: ?>
							<td><a href="?P=edit_user2&u=<?=$u['id'] ?>" >Edit</a></td>
					<?php endif; ?>
					<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] == 3) : ?>
						<?php if($u['username']!=$_SESSION['username']): ?>
							<td><a href="?P=list_user&d=<?=$u['id'] ?>&u=<?=$u['username'] ?>" onclick="return confirm('Really want to delete &quot;<?=$u['username'] ?>&quot; account?')">Delete</a></td>
						<?php else : ?>
							<td></td>
						<?php endif; ?>
					<?php endif; ?>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>