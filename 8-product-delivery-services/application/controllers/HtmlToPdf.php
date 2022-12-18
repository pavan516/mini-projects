<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * HtmlToPdf class / controller
 */
class HtmlToPdf extends CI_Controller  
{
  # Constructor
  function __construct()
  {
    # Parent constructor
    parent:: __construct();

    # Models
    $this->load->model('LibraryModel');
  
    # Helpers
    $this->load->helper('url');

    # Library
    $this->load->library('session');

    # default time zone
    date_default_timezone_set('Asia/Kolkata');

    # redirect to home if session exist
    if(empty($this->session->userdata('mobile'))) {
      # return
      redirect('index.php/auth/login', 'refresh');
    }

    # Configurations
    set_time_limit(0);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: downloadOrderBill
   */
  public function downloadOrderBill($oderUuid)
  {
    try {

      # init var
      $data = [];

      # get order
      $data['order'] = $this->LibraryModel->fetchOrders(['uuid'=>$oderUuid])[0] ?? [];

      # headers
      ob_clean();
      header('Content-type: application/pdf');
      header('Content-Disposition: inline; filename=order_bill.pdf');
      header('Content-Transfer-Encoding: binary');
      header('Accept-Ranges: bytes');

      # load library
      $mpdf = new \Mpdf\Mpdf();
      $html = $this->load->view('order_bill',$data,true);
      $mpdf->WriteHTML($html);
      $mpdf->Output('order_bill.pdf','D');
    } catch (\Exception $e) {
      $this->session->set_flashdata('error', "Failed To Download Your Bill!");
      redirect($this->input->post('url'), 'refresh');
    }

    # return to address page
    $this->session->set_flashdata('success', "Your Bill Downloaded!");
    redirect($this->input->post('url'), 'refresh');
  }

}?>