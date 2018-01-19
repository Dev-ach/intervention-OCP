
<?php
require('fpdf/fpdf.php');

include 'functions/main-functions.php';
include 'functions/ocpinter.func.php';
$posts=get_ocpinter();
foreach($posts as $post){
        $dest1 = $post->dest;
        $contact1 = $post->contact;
        $categorie1 = $post->categorie;
        $urgence1 = $post->urg;
        $service1 = $post->serv;
        $titre1 = $post->titre;
        $description1 = $post->description;
        $hpdescription= $post->hpdescription;
     }
$msg = nl2br($description1);
$msg = str_replace("<br />", "\n", $description1);

$msg1 = nl2br($hpdescription);
$msg1 = str_replace("<br />", "\n", $hpdescription);

$pdf = new FPDF ();
$pdf->AddPage();
$pdf->SetFont('Arial' , '', 9);
$pdf->Image('img/ocp.png',10 ,8, 10, 10, 'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Ln(10);

$pdf->Cell(18, 10, '', 0);
$pdf->Ln(10);

$pdf->Cell(150, 10, 'Direction Executive Operations Industrielles', 0);
$pdf->SetFont('Arial' , '', 9);
$pdf->Cell(50, 10, 'El Jadida, le '.date('d-m-Y').'', 0);
$pdf->Ln(5);
$pdf->Cell(150, 10, 'Direction Site de Jorf Lasfar', 0);
$pdf->Ln(5);
$pdf->Cell(150, 10, utf8_decode('Tél 05 23 34 52 30 / 05 23 34 50 94'), 0);
$pdf->Ln(5);
$pdf->Cell(150, 10, 'Fax 05 23 34 50 92 ', 0);
$pdf->Ln(9);
$pdf->SetFont('Arial' , 'U', 10);
$pdf->Cell(150, 10, utf8_decode($post->urg), 0);



$pdf->Cell(70, 8, '', 0);
$pdf->Ln(20);
$pdf->SetFont('Arial' , 'B', 11);
$pdf->Cell(70, 8, '', 0);

$pdf->Cell(10, 8, utf8_decode($dest1), 0);
$pdf->Ln(8);

$pdf->SetFont('Arial' , '', 13);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(80, 8, utf8_decode($contact1), 0);
$pdf->Ln(8);


$pdf->Ln(10);
$pdf->SetFont('Arial' , 'U', 11);
$pdf->Cell(17, 8, 'Urgence :'.utf8_decode($urgence1), 0);
$pdf->SetFont('Arial' , '', 10);


$pdf->Ln(10);
$pdf->SetFont('Arial' , 'U', 11);
$pdf->Cell(17, 8, 'Categorie :'.utf8_decode($categorie1), 0);
$pdf->SetFont('Arial' , '', 10);


$pdf->Ln(10);
$pdf->SetFont('Arial' , 'U', 11);
$pdf->Cell(17, 8, 'Service :'.utf8_decode($service1), 0);
$pdf->SetFont('Arial' , '', 10);


$pdf->Ln(10);
$pdf->SetFont('Arial' , 'U', 11);
$pdf->Cell(17, 8, 'Titre :'.utf8_decode($titre1), 0);
$pdf->SetFont('Arial' , '', 10);

$pdf->Ln(10);
$pdf->Cell(150, 10, 'Description :', 0);
$pdf->SetFont('Arial' , '', 9);
$pdf->Ln(10);
$pdf->SetFont('Arial' , '', 10);
$pdf->MultiCell(0, 10, utf8_decode($msg), 1, "C", 0);

$pdf->Ln(10);
$pdf->Cell(150, 10, 'Description HP:', 0);
$pdf->SetFont('Arial' , '', 9);
$pdf->Ln(10);
$pdf->SetFont('Arial' , '', 10);
$pdf->MultiCell(0, 10, utf8_decode($msg1), 1, "C", 0);



$pdf->output();


?>