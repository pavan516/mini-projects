<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * SalesBoy class / controller
 */
class SalesBoy extends CI_Controller  
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

#################################################################################################################################
#################################################################################################################################
###################################################### ORDERS ###################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: orders
   */
  public function orders()
  {
    # Load live orders
    $data['orders'] = $this->LibraryModel->fetchOrders([
      'salesboy_uuid'=>$this->session->userdata('uuid'),
      'status'=>1
    ]) ?? [];
    
    # load delivery boy orders page
    $this->load->view('salesboyorders', $data);
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: orderDelivered
   */
  public function orderDelivered()
  {
    # Parameter
    $orderUuid = $this->input->post('order_uuid');

    # updateOrder
    $updateOrder = $this->db->where('uuid',$orderUuid)->update('orders', [
      'payment_status'  => "PAID",
      'delivery_status' => "DELIVERED",
      'delivered_date'  => date('Y-m-d'),
      'delivered_at'    => date('Y-m-d H:i:s'),
      'status'          => 0
    ]);
    if(!$updateOrder) {
      $this->session->set_flashdata('error', "Failed to update the order!");
      redirect('index.php/salesboy/orders', 'refresh');
    }

    # return to live orders page
    $this->session->set_flashdata('success', "Successfully Updated Order!");
    redirect('index.php/salesboy/orders', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: ordersHistory
   */
  public function ordersHistory()
  {
    # Get Params
    $params = [];
    $order_from = $this->input->get('order_from') ?? "";
    $order_to = $this->input->get('order_to') ?? "";
    $orderno = $this->input->get('order_no') ?? "";
    
    # Build Params
    $params['salesboy_uuid'] = $this->session->userdata('uuid');
    $params['status'] = 0;
    if(!empty($orderno)) {
      $params['order_no'] = $orderno;
    }
    if(!empty($order_from)) {
      $params['from'] = $order_from;
    }
    if(!empty($order_to)) {
      $params['to'] = $order_to;
    }

    # Load orders
    $data['orders'] = $this->LibraryModel->fetchOrders($params) ?? [];
    $data['statistics'] = $this->LibraryModel->fetchOverview($params)[0] ?? [];

    # load orders page
    $this->load->view('salesboyordershistory', $data);
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

}?>