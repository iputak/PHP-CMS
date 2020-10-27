<?php
include('security.php');
$connection = mysqli_connect("localhost","root","","strongdor");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];

    if($password === $confirm_password)
    {
        $query = "INSERT INTO admin (Ime,Email,Zaporka) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            echo "gotovo";
            $_SESSION['success'] =  "Admin je dodan uspješno";
            header('Location: register.php');
        }
        else 
        {
            echo "nije gotovo";
            $_SESSION['status'] =  "Admin nije dodan!";
            header('Location: register.php');
        }
    }
    else 
    {
        echo "zaporka se ne podudara";
        $_SESSION['status'] =  "Zaporka i ponovljena zaporka se ne podudaraju!";
        header('Location: register.php');
    }

}


if(isset($_POST['updatebtn']))
{
	$id=$_POST['edit_id'];
	$username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
	
	$query = "UPDATE admin SET Ime='$username',Email='$email',Zaporka='$password' WHERE Id='$id'";
	$query_run = mysqli_query($connection, $query);
	
	if(query_run)
	{
		$_SESSION['success']="Podaci su ažurirani";
		header('Location: register.php');
	}
	else
	{
		$_SESSION['status']="Podaci nisu ažurirani";
		header('Location: register.php');
	}
}


if(isset($_POST['delete_btn']))
{
	$id=$_POST['delete_id'];
	
	$query = "DELETE FROM admin WHERE Id='$id'";
	$query_run = mysqli_query($connection, $query);
	
	if(query_run)
	{
		$_SESSION['success']="Proizvod je izbrisan";
		header('Location: register.php');
	}
	else
	{
		$_SESSION['status']="Proizvod je izbrisan";
		header('Location: register.php');
	}
	
}


if(isset($_POST['login_btn']))
{
	$email_login= stripslashes($_POST['email']);
	$email_login= mysqli_real_escape_string($connection,$email_login);
	$password_login = stripslashes($_POST['password']);
	$password_login = mysqli_real_escape_string($connection,$password_login);
	$query = "SELECT * FROM admin WHERE Email='$email_login' AND Zaporka='$password_login'";
	$result = mysqli_query($connection, $query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	$ime = $result->fetch_assoc();
	if ($rows == 1) 
	{
		$_SESSION['korisnik'] = $ime["Ime"];
		header("Location: index.php");
	} 
	else
	{
		$_SESSION['status']= 'Krivi podaci';
		header('Location: login.php');
	}
}

if(isset($_POST['pdf_btn']))
{
			$brad = $_POST["pdf_brad"];
			$br = $_POST["pdf_br"];
			$km = $_POST["pdf_km"];
			$dm = $_POST["pdf_dm"];
			$sal = $_POST["pdf_sal"];
			$output = ''; 

			require_once('tcpdf/tcpdf.php'); 
			class MYPDF extends TCPDF {

				//Page header
				public function Header() {
					
					// Set font
					$this->SetFont('helvetica', 'B', 20);

					$this->ImageSVG($file='Slike/logo.svg', $x=15, $y=12, $w='', $h=25, $link='', $align='L', $palign='', $border=0, $fitonpage=false);
									
				}

				// Page footer
				public function Footer() {
					// Position at 15 mm from bottom
					$this->SetY(-15);
					// Set font
					$this->SetFont('helvetica', 'I', 8);
					// Page number
					$this->Cell(0, 10, 'Stranica '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
				}
			}
			
			
			
			$obj_pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 
			$obj_pdf->SetCreator(PDF_CREATOR); 
			$obj_pdf->SetTitle("Statistika"); 
			$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING); 
			$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN)); 
			$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA)); 
			$obj_pdf->SetDefaultMonospacedFont('freeserif'); 
			// margine
			$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '1', PDF_MARGIN_RIGHT); 
			$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			
			$obj_pdf->setPrintHeader(true); 
			$obj_pdf->setPrintFooter(true); 
			$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
			// set image scale factor
			$obj_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
			// set font
			$obj_pdf->SetFont('freeserif', '', 12); 
			// add a page
			$obj_pdf->AddPage(); 
			$content = ''; 
			
			$tbl1 = '
					<br /><br /><br />
					<table border="0" cellspacing="0" margin-top="5" cellpadding="0"> 
						<tr> 
						<th width="75%"></th> 
						<th width="25%"><b>SUS Putak D.O.O.</b></th> 			
						</tr> 
						<tr> 
						<th width="75%"></th> 
						<th width="25%">Klaićeva 7</th> 			
						</tr> 
						<tr> 
						<th width="75%"></th> 
						<th width="25%">10 000 Zagreb, Hrvatska</th> 			
						</tr> 
						<tr> 
						<th width="75%"></th> 
						<th width="25%">T: (01) 1488 828</th> 			
						</tr> 
						<tr> 
						<th width="75%"></th> 
						<th width="25%">Email: susputak@outlook.com</th> 			
						</tr> 

					</table><br /><hr><br />'; 
			$datum = date('j.m.Y.'); 
			$vrijeme = date('H:i:s'); 

			$tbl2 = '
					<table border="0" cellspacing="0" cellpadding="5"> 
						<tr> 
							<th width="100%"><b>STATISTIKA</b></th>  			
						</tr> 
						<tr> 
							<th width="17%">Datum:</th>
							<th width="33%">'.$datum.'</th> 
							<th width="17%">Vrijeme:</th>
							<th width="33%">'.$vrijeme.'</th>  			
						</tr> 
						<tr> 
							<th width="26%">Broj admina:</th>
							<th width="64%">'.$brad.'</th> 							
						</tr> 
						<tr> 
							<th width="26%">Broj vrsta proizvoda:</th>
							<th width="64%">'.$br.'</th> 							
						</tr>  
						<tr> 
							<th width="26%">Broj vrsta kratkih majici:</th>
							<th width="64%">'.$km.'</th> 							
						</tr>
						<tr> 
							<th width="26%">Broj vrsta dugih majici:</th>
							<th width="64%">'.$dm.'</th> 							
						</tr>
						<tr> 
							<th width="26%">Broj vrsta šalica :</th>
							<th width="64%">'.$sal.'</th> 							
						</tr>

					</table>';
							
			//$tekst='<br /><p style="font-size:80%;">Predračun se izdaje u elektronskom obliku i valjan je bez pečata i potpisa.<br />Uplatu izvršiti na IBAN broj računa: HR96 1234 5678 9012 34567, poziv na broj xx </p><br />';
			$obj_pdf->writeHTML($tbl1);
			$obj_pdf->writeHTML($tbl2);
			$obj_pdf->writeHTML($content); 
			//$obj_pdf->writeHTML($tekst);
			
			

			
			
			
			
			$obj_pdf->Output('sample.pdf', 'I'); 
	
}






?>