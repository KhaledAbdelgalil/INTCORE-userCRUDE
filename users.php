<?php 
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('./models/user.php');
	//Database::connect('intcore(hello-world)', 'root', '');
?>
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Users</span>
		<button class="button float-right edit_user" id="0">Add User</button>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Name</th>
	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$users = User::all(safeGet('keywords'));
				foreach ($users as $user) {
			?>
    		<tr>
    			<td><?=$user->id?></td>
    			<td><?=$user->name?></td>
    			<td>
    				<button class="button edit_user" id="<?=$user->id?>">Edit</button>&nbsp;
    				<button class="button delete_user" id="<?=$user->id?>">Delete</button>
				</td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_user').click(function(event) {
			window.location.href = "edituser.php?id="+$(this).attr('id');
		});
	
		$('.delete_user').click(function(){
			var anchor = $(this);
			$.ajax({
				url: './controllers/deleteuser.php',
				type: 'GET',
				dataType: 'json',
				data: {id: anchor.attr('id')},
			})
			.done(function(reponse) {
				if(reponse.status==1) {
					anchor.closest('tr').fadeOut('slow', function() {
						$(this).remove();
					});
				}
			})
			.fail(function() {
				alert("Connection error.");
			})
		});
	});
</script>