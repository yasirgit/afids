<?php
	
require_once('config/lang/eng.php');
require_once('tcpdf.php');

// Extend the TCPDF class to create custom Header and Footer
class RWTCPDF extends TCPDF {
    // properties
    var $reportTitle;
    var $includeHeader; 
    var $reportTemplate;

    public function Header() {
    	if ($this->includeHeader) {
    		if ($this->reportTemplate == 'stdReport') {
	        // Logo
  	      $this->ImageEPS(K_PATH_IMAGES.'aflogo_west_ill3.eps', 13, 10, 35);
    	    // Set font
      	  $this->SetFont('helvetica', 'B', 20);
        	// Line break
        	$this->Ln(20);
					$style2 = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(54, 121, 190));
					$this->Line(13, 25, 203, 25, $style2);
				}
    		if ($this->reportTemplate == 'application') {
	        // Logo
  	      $this->ImageEPS(K_PATH_IMAGES.'aflogo_west_ill3.eps', 13, 7, 45);
    	    $this->SetY(10);
      	  $this->SetFont('helvetica', 'B', 20);
  				$this->SetTextColor(232, 53, 66);
					$this->Cell(0, 15, 'Membership Application', 0, 1, 'C');
				}
    		if ($this->reportTemplate == 'itinerary') {
	        // Logo
  	      $this->ImageEPS(K_PATH_IMAGES.'aflogo_west_ill3.eps', 13, 7, 60);
    	    $this->SetY(10);
      	  $this->SetFont('helvetica', '', 8);
  				$this->SetTextColor(232, 53, 66);
					//$this->Cell(0, 15, 'Waiver and Release of Liability', 0, 1, 'C');
					$html = "<p style='text-align:center'>3161 Donald Douglas Loop South<br/>Santa Monica, CA  90405<br/>(310) 390-2958 | (310) 397-9636 FAX | 24-hour hotline (888) 4-AN-ANGEL</p>";
					$this->writeHTMLCell(0, 0, 60, 15, $html, 0, 1, 0, true, 'C');
				}
			}
    }
    
    // Page footer
    public function Footer() {
    	if ($this->includeHeader) {
        	if ($this->reportTemplate == 'stdReport') {
        	// Position at 1.5 cm from bottom
        	$this->SetY(-20);
					$style2 = array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(54, 121, 190));
					$this->Line(13, 260, 203, 260, $style2);
        	// Set font
        	$this->SetTextColor(54, 121, 190);
        	$this->SetFont('dejavusanscondensed', '', 8);
        	// Page number
        	$this->SetX(13);
        	$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 0, 'L');
        	$this->ImageEPS(K_PATH_IMAGES.'aflogo_west_ill3.eps', 175, 261, 25);
				}
    	}
    }
}

function createPDF($htmltable, $reportTitle, $outputDest, $reportTemplate) {
	global $l;
	
	$templateFileName = '/var/www/html/web/reports/lib/printTemplates.xml';
	$templateXML = simplexml_load_file($templateFileName);
	if (!$templateXML) {
		// throw and error
		$errMsg = "The report definition file was not passed";
		echo $errMsg;
		exit;
	}	
	$xpathQuery = ".//reportTemplate[@id = '".$reportTemplate."']";
	$thisTemplate = $templateXML->xpath($xpathQuery);

	if ($thisTemplate[0]->includeHeader == 'true') {
		$pdf = new RWTCPDF($thisTemplate[0]->pageOrientation, $thisTemplate[0]->pdfUnit, strval($thisTemplate[0]->pdfPageFormat), true, 'UTF-8', false);
		$pdf->includeHeader = true;		
	} else {
		$pdf = new RWTCPDF($thisTemplate[0]->pageOrientation, $thisTemplate[0]->pdfUnit, strval($thisTemplate[0]->pdfPageFormat), true, 'UTF-8', false);
		$pdf->includeHeader = false;
	}
	$pdf->reportTitle = $reportTitle;
	$pdf->reportTemplate = $reportTemplate;

	// set document information
	$pdf->SetCreator($thisTemplate[0]->creator);
	$pdf->SetAuthor($thisTemplate[0]->author);
	$pdf->SetTitle('TCPDF Example 001');
	$pdf->SetSubject('TCPDF Tutorial');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	//set margins
	$pdf->SetMargins($thisTemplate[0]->pageMarginLeft, $thisTemplate[0]->pageMarginTop, $thisTemplate[0]->pageMarginRight);

	//set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, $thisTemplate[0]->pageMarginBottom);

	//set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

	//set some language-dependent strings
	$pdf->setLanguageArray($l); 

	// ---------------------------------------------------------

	// add a page
	$pdf->AddPage();

	if ($thisTemplate[0]->includeTitle == 'true') {
		// output the report title
		$pdf->SetFont('helvetica', 'B', 16);
  	$pdf->SetTextColor(232, 53, 66);
		$pdf->Cell(0, 15, $reportTitle, 0, 1, 'C');
	}

	// set font
  $pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont($thisTemplate[0]->dataFont, '', $thisTemplate[0]->dataFontSize);

	// output the HTML content
	$pdf->writeHTML($htmltable, true, 0, true, 0);

	// ---------------------------------------------------------

	//Close and output PDF document
	if ($outputDest == 'browser') {
		$pdf->Output('example_001.pdf', 'I');
		return true;
	}
	if ($outputDest == 'string') {
		$pdfString = $pdf->Output('example_001.pdf', 'S');
		return $pdfString;
	}
	if ($outputDest == 'file') {
		// generate a unique filename
		$pdf->Output('example_001.pdf', 'F');
		return $fileName;
	}
	if ($outputDest == 'download') {
		$pdf->Output('example_001.pdf', 'D');
		return true;
	}
}
?>