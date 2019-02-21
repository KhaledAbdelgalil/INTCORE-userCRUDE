<?php 
	include_once("./controllers/common.php");
	include_once('./components/head.php');
	include_once('./models/hosipital.php');
	$id = safeGet('id');
	//Database::connect('intcore(hello-world)', 'root', '');
	$user = new Hosipital();
	$user->get_by_id($id);
?>

    <h2 class="mt-4"><?=($id)?"Edit":"Add"?> S_User</h2>

    <form action="controllers/Hosipital_controller.php" method="post">
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

					<label for="inputEmail3" class="col-sm-2 col-form-label">phone</label>
					<div class="col-sm-10">
						
						<input class="form-control" type="text" name="phone" value="<?=$user->get('phone')?>" required>
					</div>
				</div>
		    	<div class="form-group">
		    		<button class="button float-right" name="model" value="hos" type="submit">Add</button>
		    	</div>
		    </div>
		</div>
    </form>

<?php include_once('./components/tail.php') ?>