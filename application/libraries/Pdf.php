<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    public function Header() {
        // Title
        $this->SetFont('dejavusans', 'B', 15);
        //$this->Cell(0, 15, "FORM CUTI", false, 1, 'C', 0, '', 0, false, 'M', 'M');
        //$this->Cell(0, 15, "KOMISI YUDISIAL", false, 1, 'C', 0, '', 0, false, 'M', 'M');
    }
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */