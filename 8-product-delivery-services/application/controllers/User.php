<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User class / controller
 */
class User extends CI_Controller
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
######################################################## ADDRESSES ##############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: address
   */
  public function address()
  {
    # get address
    $data['countries'] = $this->LibraryModel->fetchCountries();
    $data['states'] = $this->LibraryModel->fetchStates();
    $data['cities'] = $this->LibraryModel->fetchCities();
    $data['areas'] = $this->LibraryModel->fetchAreas();
    $data['items'] = $this->LibraryModel->fetchAddress(['user_uuid'=>$this->session->userdata('uuid')]);

    # load address page
    $this->load->view('address', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: insertAddress
   */
  public function insertAddress()
  {
    # area_id is mandatory
    if(empty($this->input->post('area_id'))) {
      $this->session->set_flashdata('error', "Please select Area!");
      redirect('index.php/user/address', 'refresh');
    }

    # address is mandatory
    if(empty($this->input->post('address'))) {
      $this->session->set_flashdata('error', "Please share your Address Area!");
      redirect('index.php/user/address', 'refresh');
    }

    # Body for address
    $address = [];
    $address['uuid'] = $this->LibraryModel->UUID();
    $address['user_uuid'] = $this->session->userdata('uuid');
    $address['name']  = trim($this->input->post('name')) ?? "";
    $address['address'] = trim($this->input->post('address')) ?? "";
    $address['country_id']  = trim($this->input->post('country_id')) ?? 0;
    $address['state_id']  = trim($this->input->post('state_id')) ?? 0;
    $address['city_id']  = trim($this->input->post('city_id')) ?? 0;
    $address['area_id']  = trim($this->input->post('area_id')) ?? 0;
    $address['latitude']  = 0;
    $address['longitude']  = 0;
    $address['google_map_link']  = "";

    # return array
    $insertAddress = $this->LibraryModel->insertAddress($address);
    if(isset($insertAddress['error'])) {
      $this->session->set_flashdata('error', $insertAddress['error']);
      redirect('index.php/user/address', 'refresh');
    }

    # return to address page
    $this->session->set_flashdata('success', $insertAddress['success']);
    redirect('index.php/user/address', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteAddress
   */
  public function deleteAddress($uuid)
  {
    # Delete address
    $deleteAddress = $this->db->delete('address', ['uuid'=>$uuid]);
    if(!$deleteAddress) {
      $this->session->set_flashdata('error', "Failed To Delete Address!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Address!");
    }

    # redirect to address page
    redirect('index.php/user/address', 'refresh');
  }

#################################################################################################################################
#################################################################################################################################
####################################################### ORDERS ##################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: userOrders
   */
  public function userOrders()
  {
    # Load addresses
    $data['addresses'] = $this->LibraryModel->fetchUsers(['uuid'=>$this->session->userdata('uuid')])[0]['_addresses'] ?? [];

    # if request is for get products => do pagination + fetch products
	  if($this->input->post('get') == 'get_products')
		{
      # Parameters
			$page = $this->input->post('page') ?? 1;
			$skey = \strip_tags($this->input->post('skey') ?? "");

      # get all products (based on params)
			$result = $this->LibraryModel->getAllProducts($page,$skey,['status'=>1]);
			$pagination = $this->LibraryModel->create_links($result['total'],10,$page);

			echo json_encode(array("get_products"=>$result['get_products'],"pagination"=>$pagination));
			exit;
		}

    # normal flow of fetching products
    $data['products'] = $this->LibraryModel->fetchProducts(['status'=>1]);
    $data['orders'] = $this->LibraryModel->fetchOrders([
      'user_uuid' => $this->session->userdata('uuid'),
      'status'    => 1
    ]) ?? [];

    # load orders page
    $this->load->view('userorders', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: insertOrder
   */
  public function insertOrder()
  {
    # order
    $products = [];
    $order = [];
    $orderItems = [];
    $salesboy_uuid = "";
    $total_original_price = 0;
    $total_discount_price = 0;
    $total_selling_price = 0;

    try {
      # address is mandatory
      if(empty($this->input->post('address_uuid'))) {
        $this->session->set_flashdata('error', "Address is mandatory!");
        return "error";
      }

      # selected products move to an array
      foreach($this->input->post('products') as $product_uuid => $quantity) {
        if($quantity > 0) {
          $products[$product_uuid] = $quantity;
        }
      }

      # if products is empty return error
      if(empty($products)) {
        $this->session->set_flashdata('error', "No product is selected, please select a product!");
        return "error";
      }

      # get area based on given address
      $address = $this->LibraryModel->fetchAddress(['uuid'=>$this->input->post('address_uuid')]);
      $area_id = $address[0]['_area']['id'];

      # fetch all sales boys
      $salesBoys = $this->LibraryModel->fetchUsers(['role'=>"SALES_BOYS"]);
      if(!empty($salesBoys)) {
        foreach($salesBoys as $salesBoy) {
          if(!empty($salesBoy['_addresses'])) {
            foreach($salesBoy['_addresses'] as $salesboyaddress) {
              if($salesboyaddress['area_id'] == $area_id) {
                $salesboy_uuid = $salesBoy['uuid'];
                break;
              }
            }
          }
        }
      }

      # generate uuid
      $uuid = $this->LibraryModel->UUID();

      # do order calculations
      foreach($products as $product_uuid => $quantity) {
        # fetch product
        $getProduct = $this->LibraryModel->fetchProducts(['uuid'=>$product_uuid])[0];

        # Calculations
        $total_original_price = $total_original_price + ($quantity * $getProduct['original_price']);
        $total_selling_price = $total_selling_price + ($quantity * $getProduct['selling_price']);
        $total_discount_price = $total_discount_price + ($quantity * ($getProduct['original_price'] - $getProduct['selling_price']));
      }

      # create order
      $order = [];
      $order['uuid']                  = $this->LibraryModel->UUID();
      $order['order_no']              = mt_rand(100000,999999);
      $order['salesboy_uuid']         = $salesboy_uuid;
      $order['order_type']            = "ONLINE";
      $order['user_uuid']             = $this->session->userdata('uuid');
      $order['address_uuid']          = trim($this->input->post('address_uuid') ?? "");
      $order['total_original_price']  = $total_original_price ?? 0;
      $order['total_discount_price']  = $total_discount_price ?? 0;
      $order['total_selling_price']   = $total_selling_price ?? 0;
      $order['payment_status']        = "NOT-PAID";
      $order['delivery_status']       = "PENDING"; // PENDING // DELIVERED // CLOSED
      $order['status']                = 1; // 1=LIVE // 0=completed 
      $order['delivered_date']        = null;
      $order['delivered_at']          = null;

      # Insert order
      $this->db->insert('orders', $order);

      # create order items
      foreach($products as $product_uuid => $quantity) {
        $orderItems = [];
        $orderItems['order_uuid']   = $order['uuid'];
        $orderItems['product_uuid'] = $product_uuid;
        $orderItems['quantity']     = $quantity;

        # Insert order items
        $this->db->insert('order_items', $orderItems);
      }

      // # send sms to all super admins
      // $getSuperAdmins = $this->LibraryModel->fetchUsers(['role'=>'SUPER_ADMIN']) ?? [];
      // if(!empty($getSuperAdmins)) {
      //   foreach($getSuperAdmins as $getSuperAdmin) {
      //     # send sms
      //     $message = "New order ".$order['order_no']." received. Please accept & update the delivery charges";
      //     $sendSms = $this->sendSms($getSuperAdmin['mobile'], $message);
      //     if(!$sendSms) {
      //       redirect('index.php/user/orders', 'refresh');
      //     }
      //   }
      // }

    } catch (\Exception $e) {
      $this->session->set_flashdata('error', "Failed to place an order!");
      print_r("error");
    }

    # return to address page
    $this->session->set_flashdata('success', "Order Successfully placed!");
    print_r("success");
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
    $params['user_uuid'] = $this->session->userdata('uuid');
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
    $this->load->view('userordershistory', $data);
  }

}?>