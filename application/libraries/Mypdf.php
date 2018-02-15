<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'white_logo.png';
        $this->Image($image_file, 8, 8, 45, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', '', 12);
        // Title
        
        $this->Ln(0);        
        $this->Cell(200, 0, 'KEMENTERIAN KELAUTAN DAN PERIKANAN', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(7);        
        $this->Cell(200, 0, 'STASIUN KIPM KELAS II MAMUJU', 0, false, 'C', 0, '', 0, false, 'M', 'M');   
        $this->Ln(7);        
        $this->Cell(200, 0, 'LABORATORIUM UJI', 0, false, 'C', 0, '', 0, false, 'M', 'M');   
        
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    
}