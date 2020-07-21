<?php
tcpdf();

$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Report Employee";
$headerstring="by Admin - Nata Software House\nnata.id";

$headerlogo=base_url()."assets/imageslogo-aja.png";

$obj_pdf->SetTitle($title);
//$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);

$obj_pdf->SetHeaderData($headerlogo, PDF_HEADER_LOGO_WIDTH, $title, $headerstring);

$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
//ob_start();
//    // we can have any view part here like HTML, PHP etc
//    $content = ob_get_contents();
//ob_end_clean();
$content='<h1>Hello</h1>';
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('report_'.date("Y-m-d_H_i_s").'.pdf', 'I');
//print_r($obj_pdf->getHeaderData());
//echo PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING;
?>