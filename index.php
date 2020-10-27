<?php
include('security.php');

include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<a href="includes/header.php"></a>


<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Kontrolna ploča</h1>
		
	</div>
	<div class="row">&nbsp &nbsp &nbsp &nbsp<p>  Dobrodošli u SUS - sustav za upravljanje sadržajem.</p></div>

       
		  <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Broj Admina</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
							$connection = mysqli_connect("localhost","root","","strongdor");
							
							$query = "SELECT Id FROM admin ORDER BY Id";
							$query_run=mysqli_query($connection, $query);
							
							$row = mysqli_num_rows($query_run);
							$brad = $row;
							echo ''.$brad.'';
						?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Broj proizvoda</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
							$connection = mysqli_connect("localhost","root","","strongdor");
							
							$query = "SELECT Sifra FROM proizvodi ORDER BY Sifra";
							$query_run=mysqli_query($connection, $query);
							
							$row = mysqli_num_rows($query_run);
							$br = $row;
							echo ''.$br.'';
						?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
	   <!-- Content Row -->
          <div class="row">
			<div class="col-lg-6 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">SUS-Putak</h6>
                </div>
                <div class="card-body">
                  <p>SUS-Putak je sustav koji omogućuje upravljanje sadržajem.</p>
				  <p>Na kontrolnoj ploči se nalazi statistički dio sa okvirnim brojkama o broju administratora na sustavu te količini vrsta proizvoda.</p>
          		  <p>Na dnu kontrolne ploče se nalazi gumb za kreiranje pdf datoteke sa okvirnim podacima.</p>
				  <p>S lijeve strane se nalazi izbornik preko kojeg se mogu vidjeti podaci o adminima i proizvodima. Isti su podaci promjenjivi, tj. mogu se uređivati i brisati.</p>
				</div>
              </div>

            </div>	
            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Broj vrsta proizvoda</h6>
                </div>
                <div class="card-body">
				  <?php
					$connection = mysqli_connect("localhost","root","","strongdor");
						
					$query = "SELECT Sifra FROM proizvodi WHERE Vrsta ='kratke' ORDER BY Sifra";
					$query_run=mysqli_query($connection, $query);
					$row = mysqli_num_rows($query_run);
			
					$km=$row;
					$pkm=round((float)($km/$br)*100);
					
				  ?>
	              <h4 class="small font-weight-bold">Kratke majice<span class="float-right"><?php echo $pkm; ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $pkm; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  
				  <?php
					$connection = mysqli_connect("localhost","root","","strongdor");
						
					$query = "SELECT Sifra FROM proizvodi WHERE Vrsta ='duge' ORDER BY Sifra";
					$query_run=mysqli_query($connection, $query);
					$row = mysqli_num_rows($query_run);
			
					$dm=$row;
					$pdm=round((float)($dm/$br)*100);
					
				  ?>
				  <h4 class="small font-weight-bold">Duge majice <span class="float-right"><?php echo $pdm; ?>%</span></h4>
				  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $pdm; ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  
				  <?php
					$connection = mysqli_connect("localhost","root","","strongdor");
						
					$query = "SELECT Sifra FROM proizvodi WHERE Vrsta ='salice' ORDER BY Sifra";
					$query_run=mysqli_query($connection, $query);
					$row = mysqli_num_rows($query_run);
			
					$sal=$row;
					$psal=round((float)($sal/$br)*100);
					
				  ?>
				  <h4 class="small font-weight-bold">Šalice <span class="float-right"><?php echo $psal; ?>%</span></h4>

				  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $psal; ?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>

            </div>

            
          </div>
		<form action="code.php" method="post">
			<input type="hidden" name="pdf_brad" value="<?php echo ''.$brad.'';?>">
			<input type="hidden" name="pdf_br" value="<?php echo ''.$br.'';?>">
			<input type="hidden" name="pdf_km" value="<?php echo ''.$km.'';?>">
			<input type="hidden" name="pdf_dm" value="<?php echo ''.$dm.'';?>">
			<input type="hidden" name="pdf_sal" value="<?php echo ''.$sal.'';?>">
			<button type="submit" name="pdf_btn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Statistički izvještaj</button>
		</form>
 
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>