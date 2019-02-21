<?php 
	include_once("./controllers/common.php");
	include_once('./components/head.php');
	include_once('./models/s_user.php');
	
	$id = safeGet('id');
	//Database::connect('intcore(hello-world)', 'root', '');
	$user = new S_user();
	$user->get_by_id($id);
?>

    <h2 class="mt-4"><?=($id)?"Edit":"Add"?> S_User</h2>

    <form action="controllers/S_User_controller.php" method="post">
    	<input type="hidden" name="id" value="<?=$user->get('id')?>">
		<div class="card">
			<div class="card-body">
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="name" value="<?=$user->get('name')?>" required>
					</div>
					<br>
					<br>

					<label for="inputEmail3" class="col-sm-2 col-form-label">Street</label>
					<div class="col-sm-10">
						
						<input class="form-control" type="text" name="street" value="<?=$user->get('street')?>" required>
					</div>
				</div>
		    	<div class="form-group">
		    		<button class="button float-right" name="model" value="s_user" type="submit">Add</button>
		    	</div>
		    </div>
		</div>
    </form>

<?php include_once('./components/tail.php') ?>