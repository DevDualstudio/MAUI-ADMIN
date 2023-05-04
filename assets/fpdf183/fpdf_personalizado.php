<?php
class PDF extends FPDF
{
    var $widths;
    var $aligns;
    var $styles;
    var $texto_footer;

    /*
    // Cabecera de página
    function Header()
    {
        // Logo
        //$this->Image('logo.png',10,8,33);
        // Título
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(45);
        $this->Cell(100, 10, "Título", 0, 0, 'C');
        $this->Ln(5);
    }
    */

    // Pie de página
    function Footer()
    {
        /*
        $tf = $this->texto_footer;
        // Posición: a 1,8 cm del final
        $this->SetY(-18);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Pie de página
        $this->Cell(200, 10, utf8_decode($tf), 0, 0, 'L');
        // Número de página
        $this->Cell(0, 10, utf8_decode(' Página') . $this->PageNo() . '/{nb}', 0, 0, 'R');
        */
    }

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetFooter($ft)
    {
        //Set the array of column footer
        $this->texto_footer = $ft;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function SetStyles($s)
    {
        //Set the array of column style
        $this->styles = $s;
    }




    var $imageKey = '';

    public function setImageKey($key)
    {
        $this->imageKey = $key;
    }

    public function Row($data)
    {

        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = 5 * $nb;
        $this->CheckPageBreak($h);

        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            $x = $this->GetX();
            $y = $this->GetY();
            $this->Rect($x, $y, $w, $h);
            //modify functions for image 
            $mk = 0;
            if ($mk === $i) {
                $ih = $h - 0.5;
                $iw = $w - 0.5;
                $ix = $x + 0.25;
                $iy = $y + 0.25;

                $this->MultiCell($w, 5, $this->Image($data[$i], $ix, $iy, $iw, $ih), 0, $a);
            } else {
                $this->MultiCell($w, 5, $data[$i], 0, $a);
            }

            $this->SetXY($x + $w, $y);
        }
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }
}
