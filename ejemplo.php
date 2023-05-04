<?php
require "assets/phpqrcode/qrlib.php";
$codigo_guia = "202210000";
$ruta_qr = "./assets/qr/" . $codigo_guia . "-img.png";

$size = 10;
$level = "Q";
$frameSize = 3;

QRcode::png($codigo_guia, $ruta_qr, $level, $size, $frameSize);

if (!file_exists($ruta_qr)) {
    echo "Error";
} else {
    echo "true";
}
