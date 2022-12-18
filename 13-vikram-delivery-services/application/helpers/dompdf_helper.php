<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create_proposal($html, $filename='', $stream=FALSE) 
{
	
    require_once("dompdf/dompdf_config.inc.php");
    

    $dompdf = new DOMPDF();
	
	
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
 	$dompdf->stream($filename.".pdf");
 	  file_put_contents('./assets/pdffile/'.$filename.".pdf", $dompdf->output());
  
        //$dompdf->stream($filename.".pdf"); //file_put_contents('PDF'.$filename.'/'.$filename.".pdf", $this->output());
  
    } else {
		 
        return $dompdf->output();
    }
	

}


function pdf_quotecreate_proposal($html, $filename='', $stream=FALSE) 
{
	
    require_once("dompdf/dompdf_config.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
    if ($stream) {
 	//$dompdf->stream($filename.".pdf");
 	  file_put_contents('./assets/quotepdffile/'.$filename.".pdf", $dompdf->output());
  
        //$dompdf->stream($filename.".pdf"); //file_put_contents('PDF'.$filename.'/'.$filename.".pdf", $this->output());
  
    } else {
		 
        return $dompdf->output();
    }
	
}


function pdf_create_proposals($html, $filename='', $stream=FALSE)
{
	require_once("dompdf/dompdf_config.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
	if ($stream) {
 	  file_put_contents('./assets/pdffile/'.$filename.".pdf", $dompdf->output());

    } else {
		
        return $dompdf->output();
    }
	
}

function pdf_create_proposal_user($html, $filename='', $stream=FALSE)
{
	require_once("dompdf/dompdf_config.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->render();
	if ($stream) {
 	  file_put_contents('./assets/report_pdf/'.$filename.".pdf", $dompdf->output());

    } else {
		
        return $dompdf->output();
    }
}
	

?>