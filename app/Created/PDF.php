<?php

namespace App\Created;

use Codedge\Fpdf\Fpdf\Fpdf;

class PDF extends Fpdf {

    public $associazione;

    function assoc($assoc) {
        $this->associazione = $assoc;
    }

    function Header() {
        $this->Line(148.5, 0, 148.5, 210);
        $x = $this->Getx();
        $y = $this->Gety();
        $this->SetFont('Arial', 'I', 8);
        $this->MultiCell(135, 6, 'copia associazione', 0, "R");
        $this->Setxy(297 - 135 - $x, $y);
        $this->MultiCell(135, 6, 'copia socio', 0, "R");
        $this->Ln(2);
        $this->SetFont('Arial', 'B', 12);
        //$this->Cell(60);
        $x = $this->Getx();
        $y = $this->Gety();
        $this->MultiCell(135, 6, iconv('UTF-8', 'windows-1252', $this->associazione->name_asso_rid) . "\n" . "CF " . $this->associazione->cf . " P.I. "
                . $this->associazione->vat_number . "\n" . iconv('UTF-8', 'windows-1252', $this->associazione->vat) . " - " .
                iconv('UTF-8', 'windows-1252', $this->associazione->cap) . " "
                . iconv('UTF-8', 'windows-1252', $this->associazione->city) . " (" . $this->associazione->province . ")\ntel. e fax. "
//                iconv('UTF-8', 'windows-1252', $this->associazione->telefono)
                . " cell. " . $this->associazione->assoc_data->cel . "\n" . iconv('UTF-8', 'windows-1252', $this->associazione->assoc_data->web), 0, "C");
        $this->Setxy(297 - 135 - $x, $y);
        $this->MultiCell(135, 6, iconv('UTF-8', 'windows-1252', $this->associazione->name_asso_rid) . "\n" . "CF " . $this->associazione->cf . " P.I. "
                . $this->associazione->vat_number . "\n" . iconv('UTF-8', 'windows-1252', $this->associazione->vat) . " - " .
                iconv('UTF-8', 'windows-1252', $this->associazione->cap) . " "
                . iconv('UTF-8', 'windows-1252', $this->associazione->city) . " (" . $this->associazione->province . ")\ntel. e fax. "
//                iconv('UTF-8', 'windows-1252', $this->associazione->telefono)
                . " cell. " . $this->associazione->assoc_data->cel . "\n" . iconv('UTF-8', 'windows-1252', $this->associazione->web), 0, "C");
    }

    function Footer() {
        $this->Setxy(0, 200);
        $this->Cell(148, 6, "DOME SOLUTIONS", 0, 0, "C");
        $this->Setxy(149, 200);
        $this->Cell(148, 6, "DOME SOLUTIONS", 0, 0, "C");
    }

}
