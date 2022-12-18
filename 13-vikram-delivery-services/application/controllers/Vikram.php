<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* ORG       : OM GROUP OF IT SOLUTIONS
* AUTHOR    : Pavan Kumar
* Email     : en.pavankumar@gmail.com
* Contact   : 8520872771
* Project   : VIKRAM DELIVERY SERVICE
*/

/**
 * Vikram class / controller
 */
class Vikram extends CI_Controller  
{
  # Constructor
  function __construct()
  {
    # Parent constructor
    parent:: __construct();

    # Models
    $this->load->model('VikramModel');
  
    # Helpers
    $this->load->helper('url');

    # Library
    $this->load->library('session');

    # default time zone
    date_default_timezone_set('Asia/Kolkata');

    # redirect to home if session exist
    if(empty($this->session->userdata('mobile'))) {
      # return
      redirect('auth/login', 'refresh');
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
      redirect('orders/live', 'refresh');
    } else if($this->session->userdata('role') == "DELIVERY_BOYS") {
      redirect('deliveryboy/orders', 'refresh');
    } else {
      redirect('user/orders', 'refresh');
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
      $data['statistic'] = $this->VikramModel->fetchStatistics(['role'=>'SUPER_ADMIN']);
    } else if($this->session->userdata('role') == "DELIVERY_BOYS") {
      $data['statistic'] = $this->VikramModel->fetchStatistics(['uuid'=>$this->session->userdata('uuid'), 'role'=>'DELIVERY_BOYS']);
    } else if($this->session->userdata('role') == "USERS") {
      $data['statistic'] = $this->VikramModel->fetchStatistics(['uuid'=>$this->session->userdata('uuid'), 'role'=>'USERS']);
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
    $data['items'] = $this->VikramModel->fetchUsers(['role'=>'DELIVERY_BOYS']);

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
      redirect('deliveryboy/create', 'refresh');
    }

    # Validation for password
    if(strlen($this->input->post('password')) < 6) {
      $this->session->set_flashdata('error', "Password must contain 6 characters!");
      redirect('deliveryboy/create', 'refresh');
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
        redirect('deliveryboy/create', 'refresh');
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
    $body['role']  = "DELIVERY_BOYS";
    $body['verified']  = 1; // 0 = not verified | 1 = verified
    $body['otp'] = $otp;
    $body['status'] = $this->input->post('status');; // 0 = deleted | 1 = active

    # return array
    $register = $this->VikramModel->insertUser($body);
    if(isset($register['error'])) {
      $this->session->set_flashdata('error', $register['error']);
      redirect('deliveryboy/create', 'refresh');
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
    $insertAddress = $this->VikramModel->insertAddress($address);
    if(isset($insertAddress['error'])) {
      $this->session->set_flashdata('error', $insertAddress['error']);
      redirect('deliveryboys', 'refresh');
    }

    # return to delivery boys page
    $this->session->set_flashdata('success', $register['success']);
    redirect('deliveryboys', 'refresh');
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
    redirect('deliveryboys', 'refresh');
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: users
   */
  public function users()
  {
    # send users data
    $data['items'] = $this->VikramModel->fetchUsers(['role'=>'USERS']);

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
    $data['items'] = $this->VikramModel->fetchUsers(['role'=>'SUPER_ADMIN']);

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
      redirect('superadmin/create', 'refresh');
    }

    # Validation for password
    if(strlen($this->input->post('password')) < 6) {
      $this->session->set_flashdata('error', "Password must contain 6 characters!");
      redirect('superadmin/create', 'refresh');
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
        redirect('superadmin/create', 'refresh');
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
    $register = $this->VikramModel->insertUser($body);
    if(isset($register['error'])) {
      $this->session->set_flashdata('error', $register['error']);
      redirect('superadmin/create', 'refresh');
    }

    # return to delivery boys page
    $this->session->set_flashdata('success', $register['success']);
    redirect('superadmins', 'refresh');
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
    redirect('superadmins', 'refresh');
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: userProfile
   */
  public function userProfile($uuid)
  {
    # get user
    $data['item'] = $this->VikramModel->fetchUsers(['uuid'=>$uuid])[0];

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
        redirect('user/profile/'.$this->session->userdata('uuid'), 'refresh');
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
    if($this->session->userdata('role')=="DELIVERY_BOYS") {
      $address['address'] = trim($this->input->post('address'));
      $updateAddress = $this->db->where('uuid', $this->input->post('address_uuid'))->update('online_address', $address);
    }

    # update address
    if(!$updateUser || !$updateAddress) {
      $this->session->set_flashdata('error', "Failed to update profile!");
      redirect('user/profile/'.$this->input->post('uuid'), 'refresh');
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
    redirect('user/profile/'.$this->session->userdata('uuid'), 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: address
   */
  public function address()
  {
    # get address
    $data['items'] = $this->VikramModel->fetchUsers(['uuid'=>$this->session->userdata('uuid')])[0]['_addresses'];

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
    # Address
    $addresss = [];

    # address / google_map_link is mandatory
    if(empty($this->input->post('google_map_link')) && empty($this->input->post('address'))) {
      $this->session->set_flashdata('error', "Google Map Link / Address is mandatory");
      redirect('user/address', 'refresh');
    }

    # Body for address
    $address['uuid'] = $this->UUID();
    $address['user_uuid'] = $this->session->userdata('uuid');
    $address['name']  = trim($this->input->post('name'));
    $address['address'] = trim($this->input->post('address'));
    $address['city']  = trim($this->input->post('city'));
    $address['state']  = trim($this->input->post('state'));
    $address['country']  = trim($this->input->post('country'));
    $address['pincode']  = trim($this->input->post('pincode'));
    $address['latitude']  = 0;
    $address['longitude']  = 0;
    $address['google_map_link']  = trim($this->input->post('google_map_link'));

    # return array
    $insertAddress = $this->VikramModel->insertAddress($address);
    if(isset($insertAddress['error'])) {
      $this->session->set_flashdata('error', $insertAddress['error']);
      redirect('user/address', 'refresh');
    }

    # return to address page
    $this->session->set_flashdata('success', $insertAddress['success']);
    redirect('user/address', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deleteAddress
   */
  public function deleteAddress($uuid)
  {
    # Delete address
    $deleteAddress = $this->db->delete('online_address', ['uuid'=>$uuid]);
    if(!$deleteAddress) {
      $this->session->set_flashdata('error', "Failed To Delete Address!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Address!");
    }

    # redirect to address page
    redirect('user/address', 'refresh');
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: userOrders
   */
  public function userOrders()
  {
    # Load addresses
    $data['addresses'] = $this->VikramModel->fetchUsers(['uuid'=>$this->session->userdata('uuid')])[0]['_addresses'] ?? [];
    $data['orders'] = $this->VikramModel->fetchOrders([
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
    $order = [];
    $orderItems = [];

    try {
      # address is mandatory
      if(empty($this->input->post('address_uuid')) && empty($this->input->post('name'))) {
        $this->session->set_flashdata('error', "Address is mandatory!");
        redirect('user/orders', 'refresh');
      }

      # creat address if address_uuid is empty
      if(empty($this->input->post('address_uuid'))) {
        # Body for address
        $address['uuid'] = $this->UUID();
        $address['user_uuid'] = $this->session->userdata('uuid');
        $address['name']  = trim($this->input->post('name'));
        $address['address'] = trim($this->input->post('address')) ?? "";
        $address['city']  = trim($this->input->post('city'));
        $address['state']  = trim($this->input->post('state'));
        $address['country']  = trim($this->input->post('country'));
        $address['pincode']  = trim($this->input->post('pincode'));
        $address['latitude']  = 0;
        $address['longitude']  = 0;
        $address['google_map_link']  = trim($this->input->post('google_map_link')) ?? "";

        # Insert Address
        $this->VikramModel->insertAddress($address);
      }

      # create order
      $order = [];
      $order['uuid']                  = $this->UUID();
      $order['order_no']              = mt_rand(100000,999999);
      $order['deliveryboy_uuid']      = "";
      $order['order_type']            = "ONLINE";
      $order['user_uuid']             = $this->session->userdata('uuid');
      $order['address_uuid']          = trim($this->input->post('address_uuid') ?? $address['uuid']);
      $order['total_original_price']  = 0;
      $order['total_customer_price']  = 0;
      $order['delivery_charges']      = 0;
      $order['currency']              = "INR";
      $order['payment_status']        = "NOT-PAID";
      $order['delivery_status']       = "PENDING_VDS"; // PENDING_VDS // PENDING_USER // ACCEPTED // DELIVERYBOY_ASSIGNED // ARRIVING // DELIVERED // CLOSED_VDS // CLOSED_USER
      $order['status']                = 1; // 1=LIVE // 0=completed 
      $order['exp_delivery_at']       = null;
      $order['delivered_at']          = null;
      $order['exp_delivery_mins']     = 0;
      
      # Insert order
      $this->db->insert('orders', $order);
      
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

      # send sms to all super admins
      $getSuperAdmins = $this->VikramModel->fetchUsers(['role'=>'SUPER_ADMIN']) ?? [];
      if(!empty($getSuperAdmins)) {
        foreach($getSuperAdmins as $getSuperAdmin) {
          # send sms
          $message = "New order ".$order['order_no']." received. Please accept & update the delivery charges";
          $sendSms = $this->sendSms($getSuperAdmin['mobile'], $message);
          if(!$sendSms) {
            redirect('user/orders', 'refresh');
          }
        }
      }
      
    } catch (\Exception $e) {
      $this->session->set_flashdata('error', "Failed to place an order, please try later OR please contact (vikram : 8187848405) for support!");
      redirect('user/orders', 'refresh');
    }

    # return to address page
    $this->session->set_flashdata('success', "Order Successfully placed!");
    return "success";
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: liveOrders
   */
  public function liveOrders()
  {
    # Load live orders
    $data['orders'] = $this->VikramModel->fetchOrders(['status'=>1]) ?? [];
    $data['deliveryboys'] = $this->VikramModel->fetchUsers(['role'=>"DELIVERY_BOYS"]) ?? [];
    
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
      redirect('orders/live', 'refresh');
    }

    # get order
    $order = $this->VikramModel->fetchOrders(['uuid'=>$orderUuid])[0] ?? [];

    # send sms to all super admins
    if($this->input->post('delivery_status') == "PENDING_USER") {
      # message
      $message = $order['_user']['name']." your order ".$order['order_no']." has been ACCEPTED by VDS. Please open app & accept order";
    } else if($this->input->post('delivery_status') == "CLOSED_VDS") {
      # message
      $message = $order['_user']['name']." your order ".$order['order_no']." has been rejected by VDS";
    }
    # send sms
    $sendSms = $this->sendSms($order['_user']['mobile'], $message);
    if(!$sendSms) {
      redirect('orders/live', 'refresh');
    }

    # return to live orders page
    $this->session->set_flashdata('success', "Order Successfully placed!");
    redirect('orders/live', 'refresh');
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
      redirect('user/orders', 'refresh');
    }

    # get order
    $order = $this->VikramModel->fetchOrders(['uuid'=>$orderUuid])[0] ?? [];

    # send sms to all super admins
    if($this->input->post('delivery_status') == "ACCEPTED") {
      $getSuperAdmins = $this->VikramModel->fetchUsers(['role'=>'SUPER_ADMIN']) ?? [];
      if(!empty($getSuperAdmins)) {
        foreach($getSuperAdmins as $getSuperAdmin) {
          # send sms
          $message = $order['_user']['name']." accepted the order ".$order['order_no'].". Please assign the delivery boy";
          $sendSms = $this->sendSms($getSuperAdmin['mobile'], $message);
          if(!$sendSms) {
            redirect('user/orders', 'refresh');
          }
        }
      }
    }

    # return to live orders page
    $this->session->set_flashdata('success', "Order Updated!");
    redirect('user/orders', 'refresh');
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
    if(empty($this->input->post('deliveryboy_uuid'))) {
      $this->session->set_flashdata('error', "Delivery Boy Not Selected!");
      redirect('orders/live', 'refresh');
    }

    # Body
    $body = [];
    $body['deliveryboy_uuid'] = $this->input->post('deliveryboy_uuid');
    $body['delivery_status'] = "DELIVERYBOY_ASSIGNED";

    # updateOrder
    $updateOrder = $this->db->where('uuid',$orderUuid)->update('orders', $body);
    if(!$updateOrder) {
      $this->session->set_flashdata('error', "Failed to update the order, retry again after sometime!");
      redirect('orders/live', 'refresh');
    }

    # return to live orders page
    $this->session->set_flashdata('success', "Order Successfully Updated!");
    redirect('orders/live', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deliveryboyOrders
   */
  public function deliveryboyOrders()
  {
    # Load live orders
    $data['orders'] = $this->VikramModel->fetchOrders([
      'deliveryboy_uuid'=>$this->session->userdata('uuid'),
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
    $data['statistic'] = $this->VikramModel->fetchStatistics(['role'=>'DELIVERY_BOYS', 'uuid'=>$uuid]);
    $data['orders'] = $this->VikramModel->fetchOrders(['deliveryboy_uuid'=>$uuid]) ?? [];
    
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
    $data['statistic'] = $this->VikramModel->fetchStatistics(['role'=>'USERS', 'uuid'=>$uuid]);
    $data['orders'] = $this->VikramModel->fetchOrders(['user_uuid'=>$uuid]) ?? [];
    
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
    $orderItems = $this->VikramModel->fetchOrders(['uuid'=>$orderUuid])[0]['_products'] ?? [];
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
      redirect('deliveryboy/orders', 'refresh');
    }

    # return to live orders page
    $this->session->set_flashdata('success', "Successfully Updated Order Prices!");
    redirect('deliveryboy/orders', 'refresh');
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
      redirect('deliveryboy/orders', 'refresh');
    }

    # return to live orders page
    $this->session->set_flashdata('success', "Successfully Updated Order Prices!");
    redirect('deliveryboy/orders', 'refresh');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: deliveryboyOrdersHistory
   */
  public function deliveryboyOrdersHistory()
  {
    # Load live orders
    $data['orders'] = $this->VikramModel->fetchOrders([
      'deliveryboy_uuid'=>$this->session->userdata('uuid'),
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
    $data['orders'] = $this->VikramModel->fetchOrders($params) ?? [];
    
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
    $data['orders'] = $this->VikramModel->fetchOrders($params) ?? [];

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
      $order['deliveryboy_uuid']      = "";
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
      $this->session->set_flashdata('error', "Failed to place an order, please try later OR please contact (vikram : 8187848405) for support!");
      redirect('user/orders', 'refresh');
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
   * Sender Ids: WEBSMS | TESTID
   * 
   * @param   string    $number   - Mobile Number
   * 
   * @return  boolean   success = 1 | failue = 0
   */
  public function sendSms($number, $message)
  {
    # variables
    $username = "pavan@aparna";
    $password = "Pavan@aparna";
    $sender   = "WEBSMS";

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

}?>