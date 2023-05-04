<?php
require "../assets/phpqrcode/qrlib.php";
include "../assets/fpdf183/fpdf.php";
include "../assets/fpdf183/fpdf_personalizado.php";
include '../controller/guias-controller.php';

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
$mdl = new GuiaController;

$codigo_guia = $_GET['Id'];
//$codigo_guia = "202210000";
$ruta_qr = "../assets/qr/" . $codigo_guia . "-img.png";

$size = 10;
$level = "Q";
$frameSize = 1;

if (!file_exists($ruta_qr)) {
    QRcode::png($codigo_guia, $ruta_qr, $level, $size, $frameSize);
}

//Fecha de la guia
$Fechaguia = $mdl->ctrMostrarFechaGuia($codigo_guia);
$FechaCreacion = "";
if ($Fechaguia['code'] == 200) {
    $Infoguia = $Fechaguia['data'];
    $FechaCreacion = $Infoguia['Fecha'];
}
if ($FechaCreacion == "") {
    $FechaCreacion = date('Y-m-d H:i:s');
}
$FechaCreacion = date('Y-m-d', strtotime($FechaCreacion));

//Info de la guia
$Fguia = $mdl->ctrMostrarGuia($codigo_guia);
$guia = $Fguia['data'];
//echo json_encode($guia);

$IdCliente = $guia['IdCliente'];
$Cliente = $guia['Cliente'];
$IdOrigen = $guia['IdOrigen'];
$Origen = $guia['Origen'];
$DireccionOrigen = $guia['DireccionOrigen'];
$ColoniaOrigen = $guia['ColoniaOrigen'];
$CPOrigen = $guia['CPOrigen'];
$CiudadOrigen = $guia['CiudadOrigen'];
$EstadoOrigen = $guia['EstadoOrigen'];
$PaisOrigen = $guia['PaisOrigen'];
$IdDestino = $guia['IdDestino'];
$Destino = $guia['Destino'];
$DireccionDestino = $guia['DireccionDestino'];
$ColoniaDestino = $guia['ColoniaDestino'];
$CPDestino = $guia['CPDestino'];
$CiudadDestino = $guia['CiudadDestino'];
$EstadoDestino = $guia['EstadoDestino'];
$PaisDestino = $guia['PaisDestino'];
$Descripcion = $guia['Descripcion'];
$IdChofer = $guia['IdChofer'];
$Chofer = $guia['Chofer'];
$IdVehiculo = $guia['IdVehiculo'];
$MLCodigo = $guia['MLCodigo'];
$FechaExpiracion = $guia['FechaExpiracion'];
$IdVenta = $guia['IdVenta'];
$IdEstatus = $guia['IdEstatus'];
$Estatus = $guia['Estatus'];

$pdf = new PDF();
//$pdf = new PDF_MC_Table();
$pdf->AliasNbPages();
$pdf->AddPage("L");


//Columna 1
$pdf->Image('../assets/images/titulo.png', 10, 15, 140, 18);
$pdf->Ln(25);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(150, 10, utf8_decode("REMITENTE"), 0, 0, 'L', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(65, 10, utf8_decode("NOMBRE DEL REMITENTE: "), 0, 0, 'L', 0);
$pdf->Cell(85, 10, utf8_decode($Cliente), 0, 0, 'L', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 10, utf8_decode("CALLE Y NÚMERO: "), 0, 0, 'L', 0);
$pdf->Cell(110, 10, utf8_decode($DireccionOrigen), 0, 0, 'L', 0);
$pdf->Ln(4);
$pdf->Cell(40, 10, utf8_decode("COLONIA: "), 0, 0, 'L', 0);
$pdf->Cell(110, 10, utf8_decode($ColoniaOrigen), 0, 0, 'L', 0);
$pdf->Ln(4);
$pdf->Cell(40, 10, utf8_decode("CIUDAD: "), 0, 0, 'L', 0);
$pdf->Cell(110, 10, utf8_decode($CiudadOrigen), 0, 0, 'L', 0);
$pdf->Ln(4);
$pdf->Cell(40, 10, utf8_decode("ESTADO: "), 0, 0, 'L', 0);
$pdf->Cell(110, 10, utf8_decode($EstadoOrigen), 0, 0, 'L', 0);
$pdf->Ln(4);
$pdf->Cell(40, 10, utf8_decode("C.P. "), 0, 0, 'L', 0);
$pdf->Cell(110, 10, utf8_decode($CPOrigen), 0, 0, 'L', 0);
$pdf->Ln(4);
$pdf->Cell(150, 10, utf8_decode("TELÉFONO:"), 0, 0, 'L', 0);
$pdf->Ln(12);

$pdf->SetLineWidth(0.4);
$pdf->Line(10, 80, 145, 80);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(150, 10, utf8_decode("DESTINATARIO"), 0, 0, 'L', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(65, 10, utf8_decode("NOMBRE DEL DESTINATARIO: "), 0, 0, 'L', 0);
$pdf->Cell(85, 10, utf8_decode($Destino), 0, 0, 'L', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(40, 10, utf8_decode("CALLE Y NÚMERO:"), 0, 0, 'L', 0);
$pdf->Cell(110, 10, utf8_decode($DireccionDestino), 0, 0, 'L', 0);
$pdf->Ln(5);
$pdf->Cell(40, 10, utf8_decode("COLONIA:"), 0, 0, 'L', 0);
$pdf->Cell(110, 10, utf8_decode($ColoniaDestino), 0, 0, 'L', 0);
$pdf->Ln(5);
$pdf->Cell(40, 10, utf8_decode("CIUDAD:"), 0, 0, 'L', 0);
$pdf->Cell(110, 10, utf8_decode($CiudadDestino), 0, 0, 'L', 0);
$pdf->Ln(5);
$pdf->Cell(40, 10, utf8_decode("ESTADO:"), 0, 0, 'L', 0);
$pdf->Cell(110, 10, utf8_decode($EstadoDestino), 0, 0, 'L', 0);
$pdf->Ln(5);
$pdf->Cell(55, 10, utf8_decode("TELÉFONO:"), 0, 0, 'L', 0);
$pdf->Cell(55, 10, utf8_decode("PAÍS: " . $PaisDestino), 0, 0, 'L', 0);
$pdf->Cell(30, 10, utf8_decode("C.P. " . $CPDestino), 0, 0, 'L', 0);
$pdf->Ln(10);
$pdf->SetLineWidth(0.4);
$pdf->Line(10, 128, 145, 128);

$pdf->SetFont('Arial', '', 12);
/*
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(150, 10, utf8_decode("SEGURO:"), 0, 0, 'L', 0);
$pdf->Ln(8);
$pdf->Cell(150, 10, utf8_decode("RFC:"), 0, 0, 'L', 0);
$pdf->Ln(10);
$pdf->SetLineWidth(0.4);
$pdf->Line(10, 155, 145, 155);
*/

$pdf->Cell(40, 10, utf8_decode("CONTENIDO"), 0, 0, 'L', 0);
$pdf->Cell(110, 10, utf8_decode($Descripcion), 0, 0, 'L', 0);
$pdf->Ln(8);
$pdf->Cell(40, 10, utf8_decode("DEL PAQUETE:"), 0, 0, 'L', 0);
$pdf->Ln(10);


//Columna 2
$pdf->SetY(0);
$pdf->Image('../assets/images/titulo2.png', 160, 15, 130, 55);
$pdf->Ln(75);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(150, 10, utf8_decode(""), 0, 0, 'L', 0);
$pdf->Cell(60, 10, utf8_decode("TIPO DE ENVIO: "), 0, 0, 'L', 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, utf8_decode("FECHA DE ENVÍO: "), 0, 0, 'L', 0);
$pdf->Cell(30, 10, utf8_decode($FechaCreacion), 0, 0, 'L', 0);
$pdf->Ln(8);

$pdf->Cell(150, 10, utf8_decode(""), 0, 0, 'L', 0);
$pdf->Cell(60, 10, utf8_decode("TERRESTRE"), 0, 0, 'L', 0);
$pdf->Cell(40, 10, utf8_decode("VIGENCIA GUÍA: "), 0, 0, 'L', 0);
$pdf->Cell(30, 10, utf8_decode($FechaExpiracion), 0, 0, 'L', 0);
$pdf->Ln(8);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(150, 10, utf8_decode(""), 0, 0, 'L', 0);
$pdf->Cell(150, 10, utf8_decode("PAQUETE:"), 0, 0, 'L', 0);
$pdf->Ln(8);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(150, 10, utf8_decode(""), 0, 0, 'L', 0);
$pdf->Cell(150, 10, utf8_decode($Descripcion), 0, 0, 'L', 0);
$pdf->Ln(8);
$pdf->SetLineWidth(0.4);
$pdf->Line(160, 110, 288, 110);

$pdf->Image($ruta_qr, 160, 115, 50, 50);
//$pdf->Rect(160, 125, 50, 50);

//Salida y nombre del archivo
$pdf->Output('i', 'guia-' . $codigo_guia . ".pdf");
