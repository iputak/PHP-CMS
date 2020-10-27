<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novi proizvod</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="novi_proizvod.php" method="POST">

        <div class="modal-body">
			<div class="form-group">
                <label> Šifra </label>
                <input type="text" name="Sifra" class="form-control" placeholder="Unesite šifru proizvoda">
            </div>
            <div class="form-group">
                <label> Naziv </label>
                <input type="text" name="naziv" class="form-control" placeholder="Unesite naziv">
            </div>
            <div class="form-group">
                <label>Cijena</label>
                <input type="text" name="cijena" class="form-control" placeholder="Unesite cijenu">
            </div>
            <div class="form-group">
                <label>Vrsta</label>
                <select name="vrsta">
					<option selected>Odaberite vrstu</option>
					<option value="kratke">Kratka majica</option>
					<option value="duge">Duga majica</option>
					<option value="salice">Šalica</option>
				</select>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
            <button type="submit" name="proizvodbtn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Spremi</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Proizvodi
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Novi proizvod
            </button>
    </h6>
  </div>

  <div class="card-body">
	<?php
	 if(isset($_SESSION['success']) && $_SESSION['success'] !='')
	{
		echo '<h2> '.$_SESSION['success'].' <h2>';
		unset($_SESSION['success']);
	}
	 if(isset($_SESSION['status']) && $_SESSION['status'] !='')
	{
		echo '<h2> '.$_SESSION['status'].' <h2>';
		unset($_SESSION['status']);
	}
	
	?>
	
	
    <div class="table-responsive">
	<?php
		$connection = mysqli_connect("localhost","root","","strongdor");
		
		$query="SELECT * FROM proizvodi";
		$query_run=mysqli_query($connection, $query);
	?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Šifra proizvoda</th>
			<th>Naziv</th>
		<!--	<th>Slika</th>   -->
			<th>Kategorija</th>
			<th>Boja</th>
			<th>Količina</th>
			<th>S</th>
			<th>M</th>
			<th>L</th>
			<th>XL</th>
			<th>XXL</th>
			<th>Uredi </th>
			<th>Izbriši </th>
          </tr>
        </thead>
        <tbody>
		<?php
		if(mysqli_num_rows($query_run) > 0)
		{
			while($row = mysqli_fetch_assoc($query_run))
			{
				?>
			<tr>
				<td><?php echo $row['Sifra']; ?> </td>
				<td><?php echo $row['Naziv']; ?> </td>
			<!--	<td><?php echo $row['Slika']; ?> </td> -->
				<td><?php echo $row['Vrsta']; ?> </td>
				<td><?php echo $row['Boja']; ?> </td>
				<td><?php echo $row['Kolicina']; ?> </td>
				<td><?php echo $row['S']; ?> </td>
				<td><?php echo $row['M']; ?> </td>
				<td><?php echo $row['L']; ?> </td>
				<td><?php echo $row['XL']; ?> </td>
				<td><?php echo $row['XXL']; ?> </td>
				<td>
					<form action="proizvod_edit.php" method="post">
						<input type="hidden" name="edit_sifra" value="<?php echo $row['Sifra']; ?>">
						<button  type="submit" name="edit_btn" class="btn btn-success">Uredi</button>
					</form>
				</td>
				<td>
					<form action="novi_proizvod.php" method="post">
						<input type="hidden" name="delete_sifra" value="<?php echo $row['Sifra']; ?>">
						<button type="submit" name="delete_btn" class="btn btn-danger"> Izbriši</button>
					</form></td>
				</tr>
			<?php
			}
		}
		else{
			echo "Nema zapisa";
		}
		?>
	 
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>