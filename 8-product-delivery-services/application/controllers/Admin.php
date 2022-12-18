<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Admin class / controller
 */
class Admin extends CI_Controller  
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
######################################################## PRODUCTS ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method Name : products
   */
  public function products()
  {
    # get products
    $data['products'] = $this->LibraryModel->fetchProducts();

    # load products page
    $this->load->view('products', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : insertProduct
   */
  public function insertProduct()
  {
    # Init vars
    $body = [];
    $imagePath = "";

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {
      # upload image
      $filename = "uploads/products/images/user_".rand(1,1000000000);
      $uploadImage = $this->LibraryModel->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to products page
        redirect('index.php/products', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }
    	
    # Build product body
    $body['uuid'] = $this->LibraryModel->UUID();
    $body['name'] = $this->input->post('name') ?? "";
    $body['code'] = $this->input->post('code') ?? "";
    $body['original_price'] = $this->input->post('original_price') ?? "";
    $body['currency'] = $this->input->post('currency') ?? "";
    $body['image'] = $imagePath;
    $body['details'] = $this->input->post('details') ?? "";
    $body['tags'] = $this->input->post('tags') ?? "";
    $body['ratings'] = $this->input->post('ratings') ?? "";
    $body['discount_pct'] = $this->input->post('discount_pct') ?? 0;
    $body['selling_price'] = (int)trim(rtrim($this->input->post('selling_price'), " ".$this->input->post('currency')) ?? "");
    $body['batchno'] = $this->input->post('batchno') ?? "";
    $body['model_year'] = $this->input->post('model_year') ?? null;
    $body['quantity'] = $this->input->post('quantity') ?? 0;
    $body['status'] = $this->input->post('status') ?? 1;

    # insert product
    $insert = $this->db->insert('products', $body);
    if(!$insert) {
      $this->session->set_flashdata('error', "Failed to create product!");
      redirect('index.php/products', 'refresh');
    }
    
    # load products page
    $this->session->set_flashdata('success', "successfully product created!");
    redirect('index.php/products', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : editProduct
   */
  public function editProduct($uuid)
  {
    # get product
    $data['product'] = $this->LibraryModel->fetchProducts(['uuid'=>$uuid])[0] ?? [];

    # load edit product page
    $this->load->view('editproduct', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : updateProduct
   */
  public function updateProduct()
  {
    # Init vars
    $body = [];

    # get product
    $getProduct = $this->LibraryModel->fetchProducts(['uuid'=>$this->input->post('uuid')])[0] ?? [];

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {
      # unlink old image
      unlink("uploads/products/images/".basename($getProduct['image']));
      # upload image
      $filename = "uploads/products/images/user_".rand(1,1000000000);
      $uploadImage = $this->LibraryModel->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to products page
        redirect('index.php/products', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # Build product body
    $body['name'] = $this->input->post('name') ?? $getProduct['name'];
    $body['code'] = $this->input->post('code') ?? $getProduct['code'];
    $body['original_price'] = $this->input->post('original_price') ?? $getProduct['original_price'];
    $body['currency'] = $this->input->post('currency') ?? $getProduct['currency'];
    if(!empty($_FILES["image"]["name"])) $body['image'] = $imagePath;
    $body['details'] = $this->input->post('details') ?? $getProduct['details'];
    $body['tags'] = $this->input->post('tags') ?? $getProduct['tags'];
    $body['ratings'] = $this->input->post('ratings') ?? $getProduct['ratings'];
    $body['discount_pct'] = $this->input->post('discount_pct') ?? $getProduct['discount_pct'];
    $body['selling_price'] = (int)trim(rtrim($this->input->post('selling_price'), " ".$this->input->post('currency')) ?? "");
    $body['batchno'] = $this->input->post('batchno') ?? $getProduct['batchno'];
    $body['model_year'] = $this->input->post('model_year') ?? $getProduct['model_year'];
    $body['quantity'] = $this->input->post('quantity') ?? $getProduct['quantity'];
    $body['status'] = $this->input->post('status') ?? $getProduct['status'];

    # update product
    $insert = $this->db->where('uuid', $this->input->post('uuid'))->update('products', $body);
    if(!$insert) {
      $this->session->set_flashdata('error', "Failed to update product!");
      redirect('index.php/product/edit/'.$this->input->post('uuid'), 'refresh');
    }
    
    # load products page
    $this->session->set_flashdata('success', "successfully product updated!");
    redirect('index.php/product/edit/'.$this->input->post('uuid'), 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteProduct
   */
  public function deleteProduct($uuid)
  {
    # get product
    $getProduct = $this->LibraryModel->fetchProducts(['uuid'=>$this->input->post('uuid')])[0] ?? [];

    # delete image if exist
    if(!empty($getProduct['image'])) {
      # unlink old image
      unlink("uploads/products/images/".basename($getProduct['image']));
    }
    
    # Delete Product
    $deleteProduct = $this->db->delete('products', ['uuid'=>$uuid]);
    if(!$deleteProduct) {
      $this->session->set_flashdata('error', "Failed To Delete Product!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Product!");
    }

    # load products page
    redirect('index.php/products', 'refresh');
  }

#################################################################################################################################
#################################################################################################################################
######################################################### ORDERS ################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: liveOrders
   */
  public function liveOrders()
  {
    # Load live orders
    $data['orders'] = $this->LibraryModel->fetchOrders(['status'=>1]) ?? [];
    $data['salesboys'] = $this->LibraryModel->fetchUsers(['role'=>"SALES_BOYS"]) ?? [];
    
    # load orders page
    $this->load->view('liveorders', $data);
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
    $this->load->view('ordershistory', $data);
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: orderUpdate
   */
  public function orderUpdate($oderUuid)
  {
    # Post Params
    $salesboy_uuid = $this->input->post('salesboy_uuid') ?? "";
    if(empty($salesboy_uuid)) {
      $this->session->set_flashdata('error', "Please select sales boy!");
      redirect('index.php/orders/live', 'refresh');
    }

    # update order
    $update = $this->db->where('uuid', $oderUuid)->update('orders', ['salesboy_uuid'=>$salesboy_uuid]);
    if(!$update) {
      $this->session->set_flashdata('error', "Failed to assign sales boy!");
      redirect('index.php/orders/live', 'refresh');
    }
    
    # load orders page
    $this->session->set_flashdata('success', "Successfully assigned sales boy!");
    redirect('index.php/orders/live', 'refresh');
  }
   
#################################################################################################################################
#################################################################################################################################
#################################################### SUPER ADMINS ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: superadmins
   */
  public function superadmins()
  {
    # send users data
    $data['items'] = $this->LibraryModel->fetchUsers(['role'=>'SUPER_ADMIN']);

    # load superadmins page
    $this->load->view('superadmins', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: insertSuperadmin
   */
  public function insertSuperadmin()
  {
    # Init vars
    $body = [];
    $imagePath = "";

    # validation for mobile
    if(strlen($this->input->post('mobile')) != 10) {
      $this->session->set_flashdata('error', "Invalid Mobile Number!");
      redirect('index.php/superadmin/create', 'refresh');
    }

    # Validation for password
    if(strlen($this->input->post('password')) < 6) {
      $this->session->set_flashdata('error', "Password must contain 6 characters!");
      redirect('index.php/superadmin/create', 'refresh');
    }

    # OTP
    $otp = mt_rand(100000,999999);

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {
      # upload image
      $filename = "uploads/users/images/user_".rand(1,1000000000);
      $uploadImage = $this->LibraryModel->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to superadmin page
        redirect('index.php/superadmin/create', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # Parameters
    $body['uuid'] = $this->LibraryModel->UUID();
    $body['name'] = trim($this->input->post('name'));
    $body['email']  = trim($this->input->post('email'));
    $body['mobile'] = trim($this->input->post('mobile'));
    $body['password']  = md5((string)trim($this->input->post('password')));
    $body['image']  = $imagePath;
    $body['role']  = "SUPER_ADMIN";
    $body['verified']  = 1; // 0 = not verified | 1 = verified
    $body['otp'] = $otp;
    $body['status'] = $this->input->post('status');; // 0 = deleted | 1 = active

    # return array
    $register = $this->LibraryModel->insertUser($body);
    if(isset($register['error'])) {
      $this->session->set_flashdata('error', $register['error']);
      redirect('index.php/superadmin/create', 'refresh');
    }

    # return to sales boys page
    $this->session->set_flashdata('success', $register['success']);
    redirect('index.php/superadmins', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteSuperadmin
   */
  public function deleteSuperadmin($uuid)
  {
    # Delete super admin
    $delete = $this->db->delete('users', ['uuid'=>$uuid]);
    if(!$delete) {
      $this->session->set_flashdata('error', "Failed To Delete Super Admin!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Super Admin!");
    }

    # redirect to superadmins page
    redirect('index.php/superadmins', 'refresh');
  }

#################################################################################################################################
#################################################################################################################################
####################################################### USERS ###################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: users
   */
  public function users()
  {
    # send users data
    $data['items'] = $this->LibraryModel->fetchUsers(['role'=>'USERS']);

    # load users page
    $this->load->view('users', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: userView
   */
  public function userView($userUuid)
  {
    # Get Params
    $params = [];
    $order_from = $this->input->get('order_from') ?? "";
    $order_to = $this->input->get('order_to') ?? "";
    $orderno = $this->input->get('order_no') ?? "";
    
    # Build Params
    $params['user_uuid'] = $userUuid;
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

    # get user data
    $user = $this->LibraryModel->fetchUsers(['uuid'=>$userUuid])[0];

    # Load orders
    $data['user'] = $user;
    $data['orders'] = $this->LibraryModel->fetchOrders($params) ?? [];
    $data['statistics'] = $this->LibraryModel->fetchOverview($params)[0] ?? [];

    # load orders page
    $this->load->view('userview', $data);
  }

#################################################################################################################################
#################################################################################################################################
##################################################### SALES BOYS ################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: salesBoys
   */
  public function salesBoys()
  {
    # send sales boys data
    $data['items'] = $this->LibraryModel->fetchUsers(['role'=>'SALES_BOYS']);
    
    # load sales boy page
    $this->load->view('salesboys', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: insertSalesBoy
   */
  public function insertSalesBoy()
  {
    # Init vars
    $body = [];
    $imagePath = "";

    # validation for mobile
    if(strlen($this->input->post('mobile')) != 10) {
      $this->session->set_flashdata('error', "Invalid Mobile Number!");
      redirect('index.php/salesboys', 'refresh');
    }

    # Validation for password
    if(strlen($this->input->post('password')) < 6) {
      $this->session->set_flashdata('error', "Password must contain 6 characters!");
      redirect('index.php/salesboys', 'refresh');
    }

    # OTP
    $otp = mt_rand(100000,999999);

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {
      # upload image
      $filename = "uploads/users/images/user_".rand(1,1000000000);
      $uploadImage = $this->LibraryModel->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to users page
        redirect('index.php/salesboys', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # Parameters
    $body['uuid'] = $this->LibraryModel->UUID();
    $body['name'] = trim($this->input->post('name'));
    $body['email']  = trim($this->input->post('email'));
    $body['mobile'] = trim($this->input->post('mobile'));
    $body['password']  = md5((string)trim($this->input->post('password')));
    $body['image']  = $imagePath;
    $body['role']  = "SALES_BOYS";
    $body['verified']  = 1; // 0 = not verified | 1 = verified
    $body['otp'] = $otp;
    $body['status'] = $this->input->post('status');; // 0 = deleted | 1 = active

    # return array
    $register = $this->LibraryModel->insertUser($body);
    if(isset($register['error'])) {
      $this->session->set_flashdata('error', $register['error']);
      redirect('index.php/salesboys', 'refresh');
    }
    
    # return to sales boys page
    $this->session->set_flashdata('success', $register['success']);
    redirect('index.php/salesboys', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: salesBoyEdit
   */
  public function salesBoyEdit($uuid)
  {
    # get sales boy address
    $data['user'] = $this->LibraryModel->fetchUsers(['uuid'=>$uuid])[0];
    $data['countries'] = $this->LibraryModel->fetchCountries();
    $data['states'] = $this->LibraryModel->fetchStates();
    $data['cities'] = $this->LibraryModel->fetchCities();
    $data['areas'] = $this->LibraryModel->fetchAreas();
    $data['items'] = $this->LibraryModel->fetchAddress(['user_uuid'=>$uuid]);
    
    # load sales boy orders page
    $this->load->view('salesboyedit', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: salesBoyView
   */
  public function salesBoyView($salesBoyUuid)
  {
    # Get Params
    $params = [];
    $order_from = $this->input->get('order_from') ?? "";
    $order_to = $this->input->get('order_to') ?? "";
    $orderno = $this->input->get('order_no') ?? "";
    
    # Build Params
    $params['salesboy_uuid'] = $salesBoyUuid;
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

    # get user data
    $user = $this->LibraryModel->fetchUsers(['uuid'=>$salesBoyUuid])[0];

    # Load orders
    $data['user'] = $user;
    $data['orders'] = $this->LibraryModel->fetchOrders($params) ?? [];
    $data['statistics'] = $this->LibraryModel->fetchOverview($params)[0] ?? [];

    # load orders page
    $this->load->view('salesboyview', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: insertSalesBoyAddress
   */
  public function insertSalesBoyAddress()
  {
    # area_id is mandatory
    if(empty($this->input->post('area_id'))) {
      $this->session->set_flashdata('error', "Please select Area!");
      redirect('index.php/salesboy/edit/'.$this->input->post('user_uuid'), 'refresh');
    }

    # verify address
    $address = $this->LibraryModel->fetchAddress(['user_uuid'=>$this->input->post('user_uuid'), 'area_id'=>$this->input->post('area_id')]);
    if(!empty($address)) {
      $this->session->set_flashdata('error', "This area is already mapped to current user!");
      redirect('index.php/salesboy/edit/'.$this->input->post('user_uuid'), 'refresh');
    }

    # Body for address
    $address = [];
    $address['uuid'] = $this->LibraryModel->UUID();
    $address['user_uuid'] = trim($this->input->post('user_uuid')) ?? "";
    $address['name']  = "";
    $address['address'] = "";
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
    redirect('index.php/salesboy/edit/'.$this->input->post('user_uuid'), 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteSalesBoyAddress
   */
  public function deleteSalesBoyAddress($uuid, $userUuid)
  {
    # Delete address
    $deleteAddress = $this->db->delete('address', ['uuid'=>$uuid]);
    if(!$deleteAddress) {
      $this->session->set_flashdata('error', "Failed To Delete Address!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Address!");
    }

    # redirect to address page
    redirect('index.php/salesboy/edit/'.$userUuid, 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteSalesBoy
   */
  public function deleteSalesBoy($uuid)
  {
    # Delete delevery boy
    $deleteSalesBoy = $this->db->delete('users', ['uuid'=>$uuid]);
    if(!$deleteSalesBoy) {
      $this->session->set_flashdata('error', "Failed To Delete Sales Boy!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Sales Boy!");
    }

    # redirect to sales boys page
    redirect('index.php/salesboys', 'refresh');
  }

#################################################################################################################################
#################################################################################################################################
######################################################  COUNTRIES   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method Name : country
   */
  public function country()
  {
    # get countries
    $data['countries'] = $this->LibraryModel->fetchCountries();
    
    # load countries page
    $this->load->view('countries', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : insertCountry
   */
  public function insertCountry()
  {
    # paramaeters
    $code = strtoupper(trim($this->input->post('country_code') ?? ''));
    $name = trim($this->input->post('country_name') ?? '');

    # get country
    $country = $this->LibraryModel->fetchCountries(['country_code'=>$code]);
    if(!empty($country)) {
      $this->session->set_flashdata('error', "country code already exist!");
      redirect('index.php/country', 'refresh');
    }

    # build body & insert
    $body = [];
    $body['country_code'] = $code;
    $body['country_name'] = $name;

    # insert country
    $insert = $this->db->insert('countries', $body);
    if(!$insert) {
      $this->session->set_flashdata('error', "Failed to create country!");
      redirect('index.php/country', 'refresh');
    }
    
    # load countries page
    $this->session->set_flashdata('success', "successfully country created!");
    redirect('index.php/country', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : updateCountry
   */
  public function updateCountry($id)
  {
    # paramaeters
    $code = strtoupper(trim($this->input->post('country_code') ?? ''));
    $name = trim($this->input->post('country_name') ?? '');

    # get country
    $country = $this->LibraryModel->fetchCountries(['id'=>$id])[0];
    
    # verify code
    $verifyCode = $this->LibraryModel->fetchCountries(['country_code'=>$code]);
    if(!empty($verifyCode)) {
      foreach($verifyCode as $item) {
        if($item['id'] != $id) {
          $this->session->set_flashdata('error', "country code already exist!");
          redirect('index.php/country', 'refresh');
        }
      }
    }

    # build body & update
    $body = [];
    $body['country_code'] = $code ?? $country['country_code'];
    $body['country_name'] = $name ?? $country['country_name'];

    # update country
    $update = $this->db->where('id',$id)->update('countries', $body);
    if(!$update) {
      $this->session->set_flashdata('error', "Failed to update country!");
      redirect('index.php/country', 'refresh');
    }
    
    # load countries page
    $this->session->set_flashdata('success', "successfully updated country!");
    redirect('index.php/country', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteCountry
   */
  public function deleteCountry($id)
  {
    # Delete country
    $deleteCountry = $this->db->delete('countries', ['id'=>$id]);
    if(!$deleteCountry) {
      $this->session->set_flashdata('error', "Failed To Delete Country!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Country!");
    }

    # load countries page
    redirect('index.php/country', 'refresh');
  }

#################################################################################################################################
#################################################################################################################################
#######################################################  STATES   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method Name : state
   */
  public function state()
  {
    # get countries & states
    $data['countries'] = $this->LibraryModel->fetchCountries();
    $data['states'] = $this->LibraryModel->fetchStates();
    
    # load states page
    $this->load->view('states', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : insertState
   */
  public function insertState()
  {
    # paramaeters
    $code = strtoupper(trim($this->input->post('state_code') ?? ''));
    $name = trim($this->input->post('state_name') ?? '');
    $countryId = $this->input->post('country_id') ?? 0;

    # get state
    $state = $this->LibraryModel->fetchStates(['country_id'=>$countryId, 'state_code'=>$code]);
    if(!empty($state)) {
      $this->session->set_flashdata('error', "state code already exist!");
      redirect('index.php/state', 'refresh');
    }

    # build body & insert
    $body = [];
    $body['country_id'] = $countryId;
    $body['state_code'] = $code;
    $body['state_name'] = $name;

    # insert state
    $insert = $this->db->insert('states', $body);
    if(!$insert) {
      $this->session->set_flashdata('error', "Failed to create state!");
      redirect('index.php/state', 'refresh');
    }
    
    # load states page
    $this->session->set_flashdata('success', "successfully state created!");
    redirect('index.php/state', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : updateState
   */
  public function updateState($id)
  {
    # paramaeters
    $code = strtoupper(trim($this->input->post('state_code') ?? ''));
    $name = trim($this->input->post('state_name') ?? '');
    $countryId = $this->input->post('country_id') ?? '';

    # get state
    $state = $this->LibraryModel->fetchStates(['id'=>$id])[0];
    
    # verify code
    $verifyCode = $this->LibraryModel->fetchStates(['country_id'=>$countryId, 'state_code'=>$code]);
    if(!empty($verifyCode)) {
      foreach($verifyCode as $item) {
        if($item['id'] != $id) {
          $this->session->set_flashdata('error', "state code already exist!");
          redirect('index.php/state', 'refresh');
        }
      }
    }

    # build body & update
    $body = [];
    $body['country_id'] = $this->input->post('country_id') ?? $state['country_id'];
    $body['state_code'] = $code ?? $state['state_code'];
    $body['state_name'] = $name ?? $state['state_name'];

    # update state
    $update = $this->db->where('id',$id)->update('states', $body);
    if(!$update) {
      $this->session->set_flashdata('error', "Failed to update state!");
      redirect('index.php/state', 'refresh');
    }
    
    # load states page
    $this->session->set_flashdata('success', "successfully updated state!");
    redirect('index.php/state', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteState
   */
  public function deleteState($id)
  {
    # Delete State
    $deleteState = $this->db->delete('states', ['id'=>$id]);
    if(!$deleteState) {
      $this->session->set_flashdata('error', "Failed To Delete State!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted State!");
    }

    # load states page
    redirect('index.php/state', 'refresh');
  }

#################################################################################################################################
#################################################################################################################################
#######################################################  CITIES   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method Name : city
   */
  public function city()
  {
    # get countries, states & cities
    $data['countries'] = $this->LibraryModel->fetchCountries();
    $data['states'] = $this->LibraryModel->fetchStates();
    $data['cities'] = $this->LibraryModel->fetchCities();
    
    # load cities page
    $this->load->view('cities', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : insertCity
   */
  public function insertCity()
  {
    # paramaeters
    $code = strtoupper(trim($this->input->post('city_code') ?? ''));
    $name = trim($this->input->post('city_name') ?? '');
    $stateId = $this->input->post('state_id') ?? 0;

    # validation
    if($stateId == 0) {
      $this->session->set_flashdata('error', "Please select state!");
      redirect('index.php/city', 'refresh');
    }
    
    # get city
    $city = $this->LibraryModel->fetchCities(['state_id'=>$stateId, 'city_code'=>$code]);
    if(!empty($city)) {
      $this->session->set_flashdata('error', "city code already exist!");
      redirect('index.php/city', 'refresh');
    }

    # build body & insert
    $body = [];
    $body['state_id'] = $stateId;
    $body['city_code'] = $code;
    $body['city_name'] = $name;

    # insert city
    $insert = $this->db->insert('cities', $body);
    if(!$insert) {
      $this->session->set_flashdata('error', "Failed to create city!");
      redirect('index.php/city', 'refresh');
    }
    
    # load cities page
    $this->session->set_flashdata('success', "successfully city created!");
    redirect('index.php/city', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : updateCity
   */
  public function updateCity($id)
  {
    # paramaeters
    $code = strtoupper(trim($this->input->post('city_code') ?? ''));
    $name = trim($this->input->post('city_name') ?? '');
        
    # get city
    $city = $this->LibraryModel->fetchCities(['id'=>$id])[0];
    
    # verify code
    $verifyCode = $this->LibraryModel->fetchCities(['state_id'=>$city['state_id'], 'city_code'=>$code]);
    if(!empty($verifyCode)) {
      foreach($verifyCode as $item) {
        if($item['id'] != $id) {
          $this->session->set_flashdata('error', "city code already exist!");
          redirect('index.php/city', 'refresh');
        }
      }
    }

    # build body & update
    $body = [];
    $body['city_code'] = $code ?? $city['city_code'];
    $body['city_name'] = $name ?? $city['city_name'];

    # update city
    $update = $this->db->where('id',$id)->update('cities', $body);
    if(!$update) {
      $this->session->set_flashdata('error', "Failed to update city!");
      redirect('index.php/city', 'refresh');
    }
    
    # load cities page
    $this->session->set_flashdata('success', "successfully updated city!");
    redirect('index.php/city', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteCity
   */
  public function deleteCity($id)
  {
    # Delete City
    $deleteCity = $this->db->delete('cities', ['id'=>$id]);
    if(!$deleteCity) {
      $this->session->set_flashdata('error', "Failed To Delete City!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted City!");
    }

    # load cities page
    redirect('index.php/city', 'refresh');
  }

#################################################################################################################################
#################################################################################################################################
#######################################################  AREAS   ################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method Name : area
   */
  public function area()
  {
    # get countries, states & cities
    $data['countries'] = $this->LibraryModel->fetchCountries();
    $data['states'] = $this->LibraryModel->fetchStates();
    $data['cities'] = $this->LibraryModel->fetchCities();
    $data['areas'] = $this->LibraryModel->fetchAreas();
    
    # load areas page
    $this->load->view('areas', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : insertArea
   */
  public function insertArea()
  {
    # paramaeters
    $code = strtoupper(trim($this->input->post('area_code') ?? ''));
    $name = trim($this->input->post('area_name') ?? '');
    $pincode = trim($this->input->post('pincode') ?? '');
    $cityId = $this->input->post('city_id') ?? 0;

    # validation
    if($cityId == 0) {
      $this->session->set_flashdata('error', "Please select city!");
      redirect('index.php/area', 'refresh');
    }
    
    # get area
    $area = $this->LibraryModel->fetchAreas(['city_id'=>$cityId, 'area_code'=>$code]);
    if(!empty($area)) {
      $this->session->set_flashdata('error', "area code already exist!");
      redirect('index.php/area', 'refresh');
    }

    # build body & insert
    $body = [];
    $body['city_id'] = $cityId;
    $body['area_code'] = $code;
    $body['area_name'] = $name;
    $body['pincode'] = $pincode;

    # insert area
    $insert = $this->db->insert('areas', $body);
    if(!$insert) {
      $this->session->set_flashdata('error', "Failed to create area!");
      redirect('index.php/area', 'refresh');
    }
    
    # load areas page
    $this->session->set_flashdata('success', "successfully area created!");
    redirect('index.php/area', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : updateArea
   */
  public function updateArea($id)
  {
    # paramaeters
    $code = strtoupper(trim($this->input->post('area_code') ?? ''));
    $name = trim($this->input->post('area_name') ?? '');
    $pincode = trim($this->input->post('pincode') ?? '');
        
    # get area
    $area = $this->LibraryModel->fetchAreas(['id'=>$id])[0];
    
    # verify code
    $verifyCode = $this->LibraryModel->fetchAreas(['city_id'=>$area['city_id'], 'area_code'=>$code]);
    if(!empty($verifyCode)) {
      foreach($verifyCode as $item) {
        if($item['id'] != $id) {
          $this->session->set_flashdata('error', "area code already exist!");
          redirect('index.php/area', 'refresh');
        }
      }
    }

    # build body & update
    $body = [];
    $body['area_code'] = $code ?? $area['area_code'];
    $body['area_name'] = $name ?? $area['area_name'];
    $body['pincode'] = $pincode ?? $area['pincode'];

    # update area
    $update = $this->db->where('id',$id)->update('areas', $body);
    if(!$update) {
      $this->session->set_flashdata('error', "Failed to update area!");
      redirect('index.php/area', 'refresh');
    }
    
    # load cities page
    $this->session->set_flashdata('success', "successfully updated area!");
    redirect('index.php/area', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteArea
   */
  public function deleteArea($id)
  {
    # Delete Area
    $deleteArea = $this->db->delete('areas', ['id'=>$id]);
    if(!$deleteArea) {
      $this->session->set_flashdata('error', "Failed To Delete Area!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Area!");
    }

    # load areas page
    redirect('index.php/area', 'refresh');
  }
  
}?>