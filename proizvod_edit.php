<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Uredi proizvod</h6>
  </div>
  <div class="card-body">
  <?php 
  
	$connection = mysqli_connect("localhost","root","","strongdor");
	
	if(isset($_POST['edit_btn']))
	{
		$id = $_POST['edit_sifra'];
		
		$query = "SELECT * FROM proizvodi WHERE Sifra='$id' ";
		$query_run = mysqli_query($connection, $query);
		foreach($query_run as $row)
		{
			?>
		<form action="novi_proizvod.php" method="POST">	
			<input type="hidden" name="edit_sifra" value="<?php echo $row['Sifra'] ?>">
			<div class="form-group">
                <label> Šifra </label>
                <input type="text" name="edit_sifra" value="<?php echo $row['Sifra'] ?>" class="form-control" placeholder="Unesite šifru proizvoda">
            </div>
			<div class="form-group">
				<label>Naziv</label>
				<input type="text" name="edit_name" value="<?php echo $row['Naziv'] ?>" class="form-control" placeholder="Unesite naziv">
			</div>
			<div class="form-group">
				<label>Kategorija</label>
				<select name="edit_vrsta" value="<?php echo $row['Vrsta'] ?>" class="form-control">			
					<option value="kratke">Kratka majica</option>
					<option value="duge">Duga majica</option>
					<option value="salice">Šalica</option>
				</select>
			</div>
			<div class="form-group">
				<label>Boja</label>
				<input type="text" name="edit_color" value="<?php echo $row['Boja'] ?>" class="form-control" placeholder="Unesite boju">
			</div>
			
			<div class="form-group">
				<label>Količina</label>
				<input type="text" name="edit_pcs" value="<?php echo $row['Kolicina'] ?>" class="form-control" placeholder="Unesite količinu">
			</div>
			
			<div class="form-group">
				<label>S</label>
				<input type="text" name="edit_S" value="<?php echo $row['S'] ?>" class="form-control" placeholder="Unesite broj komada S veličina">
			</div>
			
			<div class="form-group">
				<label>M</label>
				<input type="text" name="edit_M" value="<?php echo $row['M'] ?>" class="form-control" placeholder="Unesite broj komada M veličina">
			</div>
			
			<div class="form-group">
				<label>L</label>
				<input type="text" name="edit_L" value="<?php echo $row['L'] ?>" class="form-control" placeholder="Unesite broj komada L veličina">
			</div>
			
			<div class="form-group">
				<label>XL</label>
				<input type="text" name="edit_XL" value="<?php echo $row['XL'] ?>" class="form-control" placeholder="Unesite broj komada XL veličina">
			</div>
			
			<div class="form-group">
				<label>XXL</label>
				<input type="text" name="edit_XXL" value="<?php echo $row['XXL'] ?>" class="form-control" placeholder="Unesite broj komada XXL veličina">
			</div>
			
			
				<a href="proizvodi.php" class="btn btn-danger">Prekid</a>
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