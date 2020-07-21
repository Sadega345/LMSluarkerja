<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dompdf_helper
 *
 * @author Parimal
 */
function pdf_create($html, $filename = '', $stream = TRUE, $set_paper = '',$orientation="") {
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);

    if ($set_paper != '') {
        $dompdf->set_paper($set_paper, $orientation);
    }
    $dompdf->set_base_path(base_url().'assets/vendor/font-awesome/css/font-awesome.min.css');
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename . ".pdf");
    } else {
        //return $dompdf->output();
        $dompdf->stream($filename.".pdf", array("Attachment" => false));
    }
}
