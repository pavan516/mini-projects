<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Management class / controller
 */
class Management extends CI_Controller  
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
   * Method: index
   */
  public function index()
  {
    # redrect to home page
    if($this->session->userdata('role') == "SUPER_ADMIN") {
      redirect('index.php/orders/live', 'refresh');
    } else if($this->session->userdata('role') == "SALES_BOYS") {
      redirect('index.php/deliveryboy/orders', 'refresh');
    } else {
      redirect('index.php/user/orders', 'refresh');
    }
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: home
   */
  public function home()
  {
    # Init variables
    $data = [];

    # get statistics
    if($this->session->userdata('role') == "SUPER_ADMIN") {
      $data['statistic'] = $this->LibraryModel->fetchStatistics(['role'=>'SUPER_ADMIN']);
    } else if($this->session->userdata('role') == "SALES_BOYS") {
      $data['statistic'] = $this->LibraryModel->fetchStatistics(['uuid'=>$this->session->userdata('uuid'), 'role'=>'SALES_BOYS']);
    } else if($this->session->userdata('role') == "USERS") {
      $data['statistic'] = $this->LibraryModel->fetchStatistics(['uuid'=>$this->session->userdata('uuid'), 'role'=>'USERS']);
    }

    # body to send to home
    $this->load->view('home', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deliveryboys
   */
  public function deliveryboys()
  {
    # send delivery boys data
    $data['items'] = $this->LibraryModel->fetchUsers(['role'=>'SALES_BOYS']);

    # load delivery boy page
    $this->load->view('deliveryboys', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: createDeliveryboy
   */
  public function createDeliveryboy()
  {
    # load delivery boy page
    $this->load->view('createdeliveryboy');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: insertDeliveryboy
   */
  public function insertDeliveryboy()
  {
    # Init vars
    $body = [];
    $imagePath = "";

    # validation for mobile
    if(strlen($this->input->post('mobile')) != 10) {
      $this->session->set_flashdata('error', "Invalid Mobile Number!");
      redirect('index.php/deliveryboy/create', 'refresh');
    }

    # Validation for password
    if(strlen($this->input->post('password')) < 6) {
      $this->session->set_flashdata('error', "Password must contain 6 characters!");
      redirect('index.php/deliveryboy/create', 'refresh');
    }

    # OTP
    $otp = mt_rand(100000,999999);

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {
      # upload image
      $filename = "uploads/users/images/user_".rand(1,1000000000);
      $uploadImage = $this->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to users page
        redirect('index.php/deliveryboy/create', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # Parameters
    $body['uuid'] = $this->UUID();
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
      redirect('index.php/deliveryboy/create', 'refresh');
    }
    
    # Body for address
    $address['uuid'] = $this->UUID();
    $address['user_uuid'] = $body['uuid'];
    $address['name']  = "";
    $address['address'] = trim($this->input->post('address'));
    $address['city']  = trim($this->input->post('city'));
    $address['state']  = trim($this->input->post('state'));
    $address['country']  = trim($this->input->post('country'));
    $address['pincode']  = trim($this->input->post('pincode'));
    $address['latitude']  = 0;
    $address['longitude']  = 0;
    $address['google_map_link']  = "";
    
    # Insert Address
    $insertAddress = $this->LibraryModel->insertAddress($address);
    if(isset($insertAddress['error'])) {
      $this->session->set_flashdata('error', $insertAddress['error']);
      redirect('index.php/deliveryboys', 'refresh');
    }

    # return to delivery boys page
    $this->session->set_flashdata('success', $register['success']);
    redirect('index.php/deliveryboys', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteDeliveryboy
   */
  public function deleteDeliveryboy($uuid)
  {
    # Delete delevery boy
    $deleteDeliveryBoy = $this->db->delete('users', ['uuid'=>$uuid]);
    if(!$deleteDeliveryBoy) {
      $this->session->set_flashdata('error', "Failed To Delete Delevery Boy!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Delevery Boy!");
    }

    # redirect to delivery boys page
    redirect('index.php/deliveryboys', 'refresh');
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

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
   * Method: createSuperadmin
   */
  public function createSuperadmin()
  {
    # load delivery boy page
    $this->load->view('createsuperadmin');
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
      $uploadImage = $this->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to users page
        redirect('index.php/superadmin/create', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # Parameters
    $body['uuid'] = $this->UUID();
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

    # return to delivery boys page
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
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: userProfile
   */
  public function userProfile($uuid)
  {
    # get user
    $data['item'] = $this->LibraryModel->fetchUsers(['uuid'=>$uuid])[0];

    # load profile page
    $this->load->view('profile', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: updateProfile
   */
  public function updateProfile()
  {
    # Init vars
    $body = [];
    $address = [];
    $updateAddress = true;
    $imagePath = "";

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {
      # upload image
      $filename = "uploads/users/images/user_".rand(1,1000000000);
      $uploadImage = $this->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to users page
        redirect('index.php/user/profile/'.$this->session->userdata('uuid'), 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # Parameters
    $body['name'] = trim($this->input->post('name'));
    $body['email']  = trim($this->input->post('email'));
    if(!empty($imagePath)) $body['image'] = $imagePath;

    # update user data
    $updateUser = $this->db->where('uuid', $this->session->userdata('uuid'))->update('users', $body);

    # update address for delivery boy
    if($this->session->userdata('role')=="SALES_BOYS") {
      $address['address'] = trim($this->input->post('address'));
      $updateAddress = $this->db->where('uuid', $this->input->post('address_uuid'))->update('address', $address);
    }

    # update address
    if(!$updateUser || !$updateAddress) {
      $this->session->set_flashdata('error', "Failed to update profile!");
      redirect('index.php/user/profile/'.$this->input->post('uuid'), 'refresh');
    } else {
      # unset session data
      $this->session->unset_userdata('name');
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('image');
      # set new data in session
      $this->session->set_userdata('name',$this->input->post('name'));
      $this->session->set_userdata('email',$this->input->post('name'));
      if(!empty($imagePath)) $this->session->set_userdata('image',$imagePath);
    }

    # return to delivery boys page
    $this->session->set_flashdata('success', "Successfully updated profile!");
    redirect('index.php/user/profile/'.$this->session->userdata('uuid'), 'refresh');
  }

#################################################################################################################################
#################################################################################################################################
##################################################### USER ADDRESSES ############################################################
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
    $address['uuid'] = $this->UUID();
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
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: userOrders
   */
  public function userOrders()
  {
    # Load addresses
    $data['addresses'] = $this->LibraryModel->fetchUsers(['uuid'=>$this->session->userdata('uuid')])[0]['_addresses'] ?? [];
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
   * Method: insertUserOrder
   */
  public function insertUserOrder()
  {
    # order
    $products = [];
    $order = [];
    $orderItems = [];
    $salesboy_uuid = "";

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

      # fetch all delivery boys
      $deliveryBoys = $this->LibraryModel->fetchUsers(['role'=>"SALES_BOYS"]);
      if(!empty($deliveryBoys)) {
        foreach($deliveryBoys as $deliveryBoy) {
          if(!empty($deliveryBoy['_addresses'])) {
            foreach($deliveryBoy['_addresses'] as $deliveryboyaddress) {
              if($deliveryboyaddress['area_id'] == $area_id) {
                $salesboy_uuid = $deliveryBoy['uuid'];
                break;
              }
            }
          }
        }
      }
      
      # create order
      $order = [];
      $order['uuid']                  = $this->UUID();
      $order['order_no']              = mt_rand(100000,999999);
      $order['salesboy_uuid']         = $salesboy_uuid;
      $order['order_type']            = "ONLINE";
      $order['user_uuid']             = $this->session->userdata('uuid');
      $order['address_uuid']          = trim($this->input->post('address_uuid') ?? "");
      $order['payment_status']        = "NOT-PAID";
      $order['delivery_status']       = "PENDING"; // PENDING // DELIVERED // CLOSED
      $order['status']                = 1; // 1=LIVE // 0=completed 
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
   * Method: liveOrders
   */
  public function liveOrders()
  {
    # Load live orders
    $data['orders'] = $this->LibraryModel->fetchOrders(['status'=>1]) ?? [];
    $data['deliveryboys'] = $this->LibraryModel->fetchUsers(['role'=>"SALES_BOYS"]) ?? [];
    
    # load orders page
    $this->load->view('liveorders', $data);
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: vdsUpdateStatus
   */
  public function vdsUpdateStatus()
  {
    # Parameter
    $orderUuid = $this->input->post('order_uuid');

    # add minutes to the current date time
    $minutes_to_add = $this->input->post('exp_delivery_at') ?? 60;
    $currentDateTime = new DateTime(date('Y-m-d H:i:s'));
    $currentDateTime->add(new DateInterval('PT' . $minutes_to_add . 'M'));
    $finalDateTime = $currentDateTime->format('Y-m-d H:i:s');

    # Body
    $body = [];
    $body['delivery_charges'] = $this->input->post('delivery_charges') ?? 25;
    if($this->input->post('delivery_status') == "CLOSED_VDS") {
      $body['delivery_status'] = "CLOSED_VDS";
      $body['status'] = 0;
    } else {
      $body['delivery_status'] = $this->input->post('delivery_status') ?? "PENDING_USER";
    }
    $body['exp_delivery_at'] = $finalDateTime;
    $body['exp_delivery_mins'] = $this->input->post('exp_delivery_at');

    # updateOrder
    $updateOrder = $this->db->where('uuid',$orderUuid)->update('orders', $body);
    if(!$updateOrder) {
      $this->session->set_flashdata('error', "Failed to update the order, retry again after sometime!");
      redirect('index.php/orders/live', 'refresh');
    }

    # get order
    $order = $this->LibraryModel->fetchOrders(['uuid'=>$orderUuid])[0] ?? [];

    // # send sms to all super admins
    // if($this->input->post('delivery_status') == "PENDING_USER") {
    //   # message
    //   $message = $order['_user']['name']." your order ".$order['order_no']." has been ACCEPTED by VDS. Please open app & accept order";
    // } else if($this->input->post('delivery_status') == "CLOSED_VDS") {
    //   # message
    //   $message = $order['_user']['name']." your order ".$order['order_no']." has been rejected by VDS";
    // }
    // # send sms
    // $sendSms = $this->sendSms($order['_user']['mobile'], $message);
    // if(!$sendSms) {
    //   redirect('index.php/orders/live', 'refresh');
    // }

    # return to live orders page
    $this->session->set_flashdata('success', "Order Successfully placed!");
    redirect('index.php/orders/live', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: userUpdateStatus
   */
  public function userUpdateStatus()
  {
    # Parameter
    $orderUuid = $this->input->post('order_uuid');

    # Body
    $body = [];
    if($this->input->post('delivery_status') == "CLOSED_USER") {
      $body['delivery_status'] = "CLOSED_USER";
      $body['status'] = 0;
    } else {
      $body['delivery_status'] = $this->input->post('delivery_status') ?? "ACCEPTED";
    }

    # updateOrder
    $updateOrder = $this->db->where('uuid',$orderUuid)->update('orders', $body);
    if(!$updateOrder) {
      $this->session->set_flashdata('error', "Failed to update the order, retry again after sometime!");
      redirect('index.php/user/orders', 'refresh');
    }

    # get order
    $order = $this->LibraryModel->fetchOrders(['uuid'=>$orderUuid])[0] ?? [];

    // # send sms to all super admins
    // if($this->input->post('delivery_status') == "ACCEPTED") {
    //   $getSuperAdmins = $this->LibraryModel->fetchUsers(['role'=>'SUPER_ADMIN']) ?? [];
    //   if(!empty($getSuperAdmins)) {
    //     foreach($getSuperAdmins as $getSuperAdmin) {
    //       # send sms
    //       $message = $order['_user']['name']." accepted the order ".$order['order_no'].". Please assign the delivery boy";
    //       $sendSms = $this->sendSms($getSuperAdmin['mobile'], $message);
    //       if(!$sendSms) {
    //         redirect('index.php/user/orders', 'refresh');
    //       }
    //     }
    //   }
    // }

    # return to live orders page
    $this->session->set_flashdata('success', "Order Updated!");
    redirect('index.php/user/orders', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: vdsUpdateDeliveryboy
   */
  public function vdsUpdateDeliveryboy()
  {
    # Parameter
    $orderUuid = $this->input->post('order_uuid');

    # address is mandatory
    if(empty($this->input->post('salesboy_uuid'))) {
      $this->session->set_flashdata('error', "Delivery Boy Not Selected!");
      redirect('index.php/orders/live', 'refresh');
    }

    # Body
    $body = [];
    $body['salesboy_uuid'] = $this->input->post('salesboy_uuid');
    $body['delivery_status'] = "DELIVERYBOY_ASSIGNED";

    # updateOrder
    $updateOrder = $this->db->where('uuid',$orderUuid)->update('orders', $body);
    if(!$updateOrder) {
      $this->session->set_flashdata('error', "Failed to update the order, retry again after sometime!");
      redirect('index.php/orders/live', 'refresh');
    }

    # return to live orders page
    $this->session->set_flashdata('success', "Order Successfully Updated!");
    redirect('index.php/orders/live', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deliveryboyOrders
   */
  public function deliveryboyOrders()
  {
    # Load live orders
    $data['orders'] = $this->LibraryModel->fetchOrders([
      'salesboy_uuid'=>$this->session->userdata('uuid'),
      'status'=>1
    ]) ?? [];
    
    # load delivery boy orders page
    $this->load->view('deliveryboyorders', $data);
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deliveryboyView
   */
  public function deliveryboyView($uuid)
  {
    # Load delivery boy
    $data['statistic'] = $this->LibraryModel->fetchStatistics(['role'=>'SALES_BOYS', 'uuid'=>$uuid]);
    $data['orders'] = $this->LibraryModel->fetchOrders(['salesboy_uuid'=>$uuid]) ?? [];
    
    # load delivery boy orders page
    $this->load->view('deliveryboyview', $data);
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: userView
   */
  public function userView($uuid)
  {
    # Load delivery boy
    $data['statistic'] = $this->LibraryModel->fetchStatistics(['role'=>'USERS', 'uuid'=>$uuid]);
    $data['orders'] = $this->LibraryModel->fetchOrders(['user_uuid'=>$uuid]) ?? [];
    
    # load delivery boy orders page
    $this->load->view('userview', $data);
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: orderItemUpdate
   */
  public function orderItemUpdate($id)
  {
    # update each order
    $updateOrderItem = $this->db->where('id',$id)->update('order_items',[
      'original_price'  =>  $this->input->post('orderitem')['original_price'] ?? 0,
      'customer_price'  =>  $this->input->post('orderitem')['customer_price'] ?? 0,
      'purchased_from'  =>  $this->input->post('orderitem')['purchased_from'] ?? "",
      'shop_mobile_no'  =>  $this->input->post('orderitem')['shop_mobile_no'] ?? "",
      'available'       =>  $this->input->post('orderitem')['available'] ?? 0
    ]);
    if(!$updateOrderItem) {
      print_r("Failed to update prices, please try later!");exit;
    }

    # return to live orders page
    print_r("successfully updated prices!");exit;
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deliveryboyOrderUpdateStatus
   */
  public function deliveryboyOrderUpdateStatus()
  {
    # Parameter
    $orderUuid = $this->input->post('order_uuid');

    # Init var
    $orgPrice = 0;
    $customerPrice = 0;

    # fetch order items
    $orderItems = $this->LibraryModel->fetchOrders(['uuid'=>$orderUuid])[0]['_products'] ?? [];
    if(!empty($orderItems)) {
      foreach($orderItems as $orderItem) {
        $orgPrice = $orgPrice + $orderItem['original_price'];
        $customerPrice = $customerPrice + $orderItem['customer_price'];
      }
    }

    # updateOrder
    $updateOrder = $this->db->where('uuid',$orderUuid)->update('orders', [
      'delivery_status'=>"ARRIVING",
      'total_original_price'=>$orgPrice,
      'total_customer_price'=>$customerPrice
      ]);
    if(!$updateOrder) {
      $this->session->set_flashdata('error', "Failed to update the order prices, please click on completed!");
      redirect('index.php/deliveryboy/orders', 'refresh');
    }

    # return to live orders page
    $this->session->set_flashdata('success', "Successfully Updated Order Prices!");
    redirect('index.php/deliveryboy/orders', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deliveryboyOrderDelivered
   */
  public function deliveryboyOrderDelivered()
  {
    # Parameter
    $orderUuid = $this->input->post('order_uuid');

    # updateOrder
    $updateOrder = $this->db->where('uuid',$orderUuid)->update('orders', [
      'payment_status'  => "PAID",
      'delivery_status' => "DELIVERED",
      'status'          => 0,
      'delivered_at'    => date('Y-m-d H:i:s')
    ]);
    if(!$updateOrder) {
      $this->session->set_flashdata('error', "Failed to update the order prices, please click on completed!");
      redirect('index.php/deliveryboy/orders', 'refresh');
    }

    # return to live orders page
    $this->session->set_flashdata('success', "Successfully Updated Order Prices!");
    redirect('index.php/deliveryboy/orders', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deliveryboyOrdersHistory
   */
  public function deliveryboyOrdersHistory()
  {
    # Load live orders
    $data['orders'] = $this->LibraryModel->fetchOrders([
      'salesboy_uuid'=>$this->session->userdata('uuid'),
      'status'=>0
    ]) ?? [];
    
    # load delivery boy orders page
    $this->load->view('deliveryboyordershistory', $data);
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
    $year = $this->input->get('year') ?? "";
    $month = $this->input->get('month') ?? "";
    $orderdate = $this->input->get('order_date') ?? "";
    $ordertype = $this->input->get('order_type') ?? "";
    $orderno = $this->input->get('order_no') ?? "";
    
    # Build Params
    $params['status'] = 0;
    if(!empty($orderno)) {
      $params['order_no'] = $orderno;
    }
    if(!empty($ordertype)) {
      $params['order_type'] = $ordertype;
    }
    if(!empty($orderdate)) {
      $params['from'] = $orderdate;
      $todate = (new DateTime($orderdate))->modify('+1 day');
      $params['to'] = $todate->format('Y-m-d');
    }
    if(!empty($year) && !empty($month)) {
      $params['from'] = $year.'-'.$month.'-01';
      $params['to'] = $year.'-'.$month.'-31';
    } else if(!empty($month)) {
      $params['from'] = date('Y').'-'.$month.'-01';
      $params['to'] = date('Y').'-'.$month.'-31';
    } else if(!empty($year)) {
      $params['from'] = $year.'-01-01';
      $params['to'] = $year.'-12-31';
    }

    # Load live orders
    $data['orders'] = $this->LibraryModel->fetchOrders($params) ?? [];
    
    # load orders page
    $this->load->view('ordershistory', $data);
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: userOrdersHistory
   */
  public function userOrdersHistory()
  {
    # Get Params
    $params = [];
    $year = $this->input->get('year') ?? "";
    $month = $this->input->get('month') ?? "";
    $orderdate = $this->input->get('order_date') ?? "";
    $ordertype = $this->input->get('order_type') ?? "";
    $orderno = $this->input->get('order_no') ?? "";
    
    # Build Params
    $params['user_uuid'] = $this->session->userdata('uuid');
    $params['status'] = 0;
    if(!empty($orderno)) {
      $params['order_no'] = $orderno;
    }
    if(!empty($ordertype)) {
      $params['order_type'] = $ordertype;
    }
    if(!empty($orderdate)) {
      $params['from'] = $orderdate;
      $todate = (new DateTime($orderdate))->modify('+1 day');
      $params['to'] = $todate->format('Y-m-d');
    }
    if(!empty($year) && !empty($month)) {
      $params['from'] = $year.'-'.$month.'-01';
      $params['to'] = $year.'-'.$month.'-31';
    } else if(!empty($month)) {
      $params['from'] = date('Y').'-'.$month.'-01';
      $params['to'] = date('Y').'-'.$month.'-31';
    } else if(!empty($year)) {
      $params['from'] = $year.'-01-01';
      $params['to'] = $year.'-12-31';
    }

    # Load addresses
    $data['orders'] = $this->LibraryModel->fetchOrders($params) ?? [];

    # load orders page
    $this->load->view('userordershistory', $data);
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: createOrders
   */
  public function createOrders()
  {
    # load delivery boy page
    $this->load->view('createofflineorder');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: insertOfflineOrder
   */
  public function insertOfflineOrder()
  { 
    try {
      # create offline address
      $address = [];
      $address['uuid'] = $this->UUID();
      $address['user_name'] = trim($this->input->post('name')) ?? "";
      $address['user_mobile'] = trim($this->input->post('mobile')) ?? "";
      $address['address'] = trim($this->input->post('name'));
      $address['google_map_link'] = trim($this->input->post('google_map_link'));
      $address['city'] = trim($this->input->post('city'));
      $address['state'] = trim($this->input->post('state'));
      $address['country'] = trim($this->input->post('country'));
      $address['pincode'] = trim($this->input->post('pincode'));
      $address['latitude'] = 0;
      $address['longitude'] = 0;

      # Insert address
      $offlineAddress = $this->db->insert('offline_address', $address);

      # add minutes to the current date time
      $minutes_to_add = $this->input->post('exp_delivery_at') ?? 60;
      $currentDateTime = new DateTime(date('Y-m-d H:i:s'));
      $currentDateTime->add(new DateInterval('PT' . $minutes_to_add . 'M'));
      $finalDateTime = $currentDateTime->format('Y-m-d H:i:s');

      # create an order
      $order = [];
      $order['uuid']                  = $this->UUID();
      $order['order_no']              = mt_rand(100000,999999);
      $order['salesboy_uuid']      = "";
      $order['order_type']            = "OFFLINE";
      $order['user_uuid']             = "";
      $order['address_uuid']          = $address['uuid'];
      $order['total_original_price']  = 0;
      $order['total_customer_price']  = 0;
      $order['delivery_charges']      = $this->input->post('delivery_charges');
      $order['currency']              = "INR";
      $order['payment_status']        = "NOT-PAID";
      $order['delivery_status']       = "ACCEPTED"; // PENDING_VDS // PENDING_USER // ACCEPTED // DELIVERYBOY_ASSIGNED // ARRIVING // DELIVERED // CLOSED_VDS // CLOSED_USER
      $order['status']                = 1; // 1=LIVE // 0=completed 
      $order['exp_delivery_at']       = $finalDateTime;
      $order['delivered_at']          = null;
      $order['exp_delivery_mins']     = $this->input->post('exp_delivery_at');

      # Insert order
      $insertOrder = $this->db->insert('orders', $order);

      # create order items
      foreach($this->input->post('orders') as $item) {
        $orderItems = [];
        $orderItems['order_uuid']     = $order['uuid'];
        $orderItems['product']        = trim($item['product']);
        $orderItems['quantity']       = trim($item['quantity']);
        $orderItems['units']          = trim($item['units']);
        $orderItems['original_price'] = 0;
        $orderItems['customer_price'] = 0;
        $orderItems['purchased_from'] = "";
        $orderItems['shop_mobile_no'] = "";
        $orderItems['available']      = 1; // 1 = yes available // 0 = not available

        # Insert order items
        $this->db->insert('order_items', $orderItems);
      }

    } catch (\Exception $e) {
      $this->session->set_flashdata('error', "Failed to place an order, please try later OR please contact (mrsoft : 8008344615) for support!");
      redirect('index.php/user/orders', 'refresh');
    }

    # return to address page
    $this->session->set_flashdata('success', "Order Successfully placed!");
    return "success";
  }

#################################################################################################################################
#################################################################################################################################
################################################   CUSTOM METHODS   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method Name : UUID
   * Description : Generate our own uuid's
   * 
   * @param   boolean   $trim - false
   * 
   * @return  string    UUID
   */
  public function UUID($trim = false)
  {
    # Format
    $format = ($trim == false) ? '%04x%04x-%04x-%04x-%04x-%04x%04x%04x' : '%04x%04x%04x%04x%04x%04x%04x%04x';

    # generate UUID
    $uuid = sprintf($format,
      # 32 bits for "time_low"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),
      # 16 bits for "time_mid"
      mt_rand(0, 0xffff),
      # 16 bits for "time_hi_and_version", four most significant bits holds version number 4
      mt_rand(0, 0x0fff) | 0x4000,
      # 16 bits, 8 bits for "clk_seq_hi_res", 8 bits for "clk_seq_low", two most significant bits holds zero and one for variant DCE1.1
      mt_rand(0, 0x3fff) | 0x8000,
      # 48 bits for "node"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
    
    return $uuid ?? "";
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: uploadImage
   */
  public function uploadImage($filename)
  {
    # Init var
    $result = [];

    # get file extension
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      return ['error'=>"Sorry, only JPG, JPEG, PNG & GIF files are allowed!"];
    }

    # make sure file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check == false) {
      return ['error'=>"Uploaded file is not an image!"];
    }

    # upload file
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $filename.'.'.$imageFileType)) {
      return ['error'=>"Sorry, there was an error uploading your file!"];
    }

    # Build response
    $result['path'] = base_url().$filename.'.'.$imageFileType;
    
    # return result
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method Name : sendSms
   * Description : Send SMS
   * Sender Ids: sender id
   * 
   * @param   string    $number   - Mobile Number
   * 
   * @return  boolean   success = 1 | failue = 0
   */
  public function sendSms($number, $message)
  {
    # variables
    $username = ""; // username
    $password = ""; // password
    $sender   = ""; // sender id

    try {
      # URL
      $curlInit = curl_init("login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')); 
      
      # Initiate curl
      curl_setopt($curlInit, CURLOPT_RETURNTRANSFER, true);

      # send request & get response
      $response = curl_exec($curlInit);

      # decode into array
      $response = json_decode(ltrim(rtrim($response,'"'), '"'), true);
      
      # close curl
      curl_close($curlInit);

      # Insert sms log
      $this->db->insert('sms_logs', [
        "status"=>$response['status'],
        "mobilenumbers"=>$response['mobilenumbers'],
        "remainingcredits"=>$response['remainingcredits'],
        "msgcount"=>$response['msgcount'],
        "selectedRoute"=>$response['selectedRoute'],
        "refid"=>$response['refid'],
        "senttime"=>$response['senttime']
      ]);

      # Update sms count
      $this->db->where('code',"TOTAL_SMS")->update('params',['value'=>$response['remainingcredits']]);

    } catch (\Exception $e) {
      # return false
      return false;
    }
    
    # return true
    return true;
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
   
#################################################################################################################################
#################################################################################################################################
#####################################################  PRODUCTS  ################################################################
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
      $uploadImage = $this->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to users page
        redirect('index.php/products', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }
    	
    # Build product body
    $body['uuid'] = $this->UUID();
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

  /**
   * Method Name : viewProduct
   */
  public function viewProduct($uuid)
  {
    # get product
    $data['product'] = $this->LibraryModel->fetchProducts(['uuid'=>$uuid])[0] ?? [];

    # load view product page
    $this->load->view('viewproduct', $data);
  }
  
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
      $uploadImage = $this->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to users page
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
      redirect('index.php/product/view/'.$this->input->post('uuid'), 'refresh');
    }
    
    # load products page
    $this->session->set_flashdata('success', "successfully product updated!");
    redirect('index.php/product/view/'.$this->input->post('uuid'), 'refresh');
  }

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
   
  /**
   * Method: searchProducts
   */
  public function searchProducts()
  {
    print_r($this->input->post('search'));exit;
    
    # load products page
    redirect('index.php/products', 'refresh');
  }
   
}?>