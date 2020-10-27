<?php

$connection = mysqli_connect("localhost","root","","strongdor");

if(isset($_POST['proizvodbtn']))
{
	$Sifra=$_POST['Sifra'];
    $name = $_POST['naziv'];
    $price = $_POST['cijena'];
    $type = $_POST['vrsta'];
	
	$provjera= "SELECT FROM proizvodi WHERE Sifra='$Sifra'";
	$provjera_run=mysqli_query($connection, $provjera);
	if(!$provjera_run)
	{
		$query = "INSERT INTO proizvodi (Sifra,Naziv,Cijena,Vrsta) VALUES ('$Sifra','$name','$price','$type')";
		$query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            echo "gotovo";
            $_SESSION['success'] =  "Proizvod je dodan uspješno";
            header('Location: proizvodi.php');
        }
        else 
        {
            echo "nije gotovo";
            $_SESSION['status'] =  "Proizvod nije dodan!";
            header('Location: proizvodi.php');
        }
	}
	else {
		echo "<script>alert('Postoji proizvod sa istom šifrom!');</script>";
	}
    
    

}


if(isset($_POST['updatebtn']))
{
	$Sifra=$_POST['edit_sifra'];
	$name = $_POST['edit_name'];
    $vrsta = $_POST['edit_vrsta'];
    $color = $_POST['edit_color'];
	$pcs = $_POST['edit_pcs'];
	$S = $_POST['edit_S'];
	$M = $_POST['edit_M'];
	$L = $_POST['edit_L'];
	$XL = $_POST['edit_XL'];
	$XXL = $_POST['edit_XXL'];
	
	$query = "UPDATE proizvodi SET Sifra='$Sifra', Naziv='$name', Vrsta='$vrsta', Boja='$color', Kolicina='$pcs', S='$S', M='$M', L='$L', XL='$XL', XXL='$XXL' WHERE Sifra='$Sifra'";
	$query_run = mysqli_query($connection, $query);
	
	if(query_run)
	{
		$_SESSION['success']="Podaci su ažurirani";
		header('Location: proizvodi.php');
	}
	else
	{
		$_SESSION['status']="Podaci nisu ažurirani";
		header('Location: proizvodi.php');
	}
}

if(isset($_POST['delete_btn']))
{
	$Sifra=$_POST['delete_sifra'];
	
	$query = "DELETE FROM proizvodi WHERE Sifra='$Sifra'";
	$query_run = mysqli_query($connection, $query);
	
	if(query_run)
	{
		$_SESSION['success']="Proizvod je izbrisan";
		header('Location: proizvodi.php');
	}
	else
	{
		$_SESSION['status']="Proizvod je izbrisan";
		header('Location: proizvodi.php');
	}
	
}

?>