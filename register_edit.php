<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Uredi admina</h6>
  </div>
  <div class="card-body">
  <?php 
  
	$connection = mysqli_connect("localhost","root","","strongdor");
	
	if(isset($_POST['edit_btn']))
	{
		$id = $_POST['edit_id'];
		
		$query = "SELECT * FROM admin WHERE Id='$id' ";
		$query_run = mysqli_query($connection, $query);
		foreach($query_run as $row)
		{
			?>
		<form action="code.php" method="POST">	
			<input type="hidden" name="edit_id" value="<?php echo $row['Id'] ?>">
			<div class="form-group">
				<label> Korisničko ime </label>
				<input type="text" name="edit_username" value="<?php echo $row['Ime'] ?>" class="form-control" placeholder="Unesite korisničko ime">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="edit_email" value="<?php echo $row['Email'] ?>" class="form-control" placeholder="Unesite email">
			</div>
			<div class="form-group">
				<label>Zaporka</label>
				<input type="password" name="edit_password" value="<?php echo $row['Zaporka'] ?>" class="form-control" placeholder="Unesite zaporku">
			</div>
				<a href="register.php" class="btn btn-danger">Prekid</a>
				<button type="submit" name="updatebtn" class="btn btn-primary">Ažuriraj</button>
		</form>
		<?php
		}
	}
?>	
		
		
	
  
	
    
  </div>
</div>
</div>
</div>
<!-- /.container-fluid -->



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>