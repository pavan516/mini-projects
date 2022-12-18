<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
* ORG       : OM GROUP OF IT SOLUTIONS
* AUTHOR    : Pavan Kumar
* Email     : en.pavankumar@gmail.com
* Contact   : 8520872771
* Project   : VIKRAM DELIVERY SERVICE
*/
  
/**
 * VikramModel
 */
class VikramModel extends CI_Model
{
  # Constructor
  public function __construct()
  {
    # Parent constructor
    parent::__construct();
    
    # Load database
    $this->load->database();

    # Load library session
    $this->load->library('session');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * insertUser
   *
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertUser(array $data)
  {
    # make sure email already exist
    $verifyEmail = $this->db->select('*')->from('users')->where('email', $data['email'])->get()->row_array();
    if(!empty($verifyEmail)) return ['error'=>"Email ".$data['email']." already Exist!"];

    # make sure mobile number already exist
    $verifyMobile = $this->db->select('*')->from('users')->where('mobile', $data['mobile'])->get()->row_array();
    if(!empty($verifyMobile)) return ['error'=>"Mobile-Number ".$data['mobile']." already exist!"];

    # save
    $insert = $this->db->insert('users', $data);
    if(!$insert) {
      return ['error'=>"We are sorry to register your account!"];
    }

    # return response
    return ['success'=>"Successfully Account Created!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * insertAddress
   *
   * @param   array  $data
   * 
   * @return  boolean
   */
  public function insertAddress(array $data)
  {
    # save
    $insert = $this->db->insert('online_address', $data);
    if(!$insert) {
      return ['error'=>"Failed to insert your address!"];
    }

    # return response
    return ['success'=>"Successfully Address Added!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * fetchUsers
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchUsers(array $data=[])
  {
    # init var
    $users = [];

    # build query
    $this->db->select('*')->from('users');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with uuid
    if(isset($data['uuid']) && !empty($data['uuid'])) {
      $this->db->where('uuid',$data['uuid']);
    }

    # filter with email
    if(isset($data['email']) && !empty($data['email'])) {
      $this->db->where('email',$data['email']);
    }

    # filter with mobile
    if(isset($data['mobile']) && !empty($data['mobile'])) {
      $this->db->where('mobile',$data['mobile']);
    }

    # filter with role
    if(isset($data['role']) && !empty($data['role'])) {
      $this->db->where('role',$data['role']);
    }

    # filter with verified
    if(isset($data['verified']) && !empty($data['verified'])) {
      $this->db->where('verified',$data['verified']);
    }

    # filter with status
    if(isset($data['status']) && !empty($data['status'])) {
      $this->db->where('status',$data['status']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $users = $this->db->get()->result_array();

    # expand branch & subject
    $result = [];
    foreach($users as $user) {
      # expand onine address
      if(!empty($user['uuid'])) {
        $user['_addresses'] = $this->db->select('*')->from('online_address')->where('user_uuid', $user['uuid'])->order_by("id", "desc")->get()->result_array();
      }
      $result[] = $user;
    }
    
    # return response
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * fetchOrders
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchOrders(array $data=[])
  {
    # init var
    $orders = [];

    # build query
    $this->db->select('*')->from('orders');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with uuid
    if(isset($data['uuid']) && !empty($data['uuid'])) {
      $this->db->where('uuid',$data['uuid']);
    }

    # filter with order_no
    if(isset($data['order_no']) && !empty($data['order_no'])) {
      $this->db->where('order_no',$data['order_no']);
    }

    # filter with deliveryboy_uuid
    if(isset($data['deliveryboy_uuid']) && !empty($data['deliveryboy_uuid'])) {
      $this->db->where('deliveryboy_uuid',$data['deliveryboy_uuid']);
    }

    # filter with order_type
    if(isset($data['order_type']) && !empty($data['order_type'])) {
      $this->db->where('order_type',$data['order_type']);
    }

    # filter with user_uuid
    if(isset($data['user_uuid']) && !empty($data['user_uuid'])) {
      $this->db->where('user_uuid',$data['user_uuid']);
    }

    # filter with address_uuid
    if(isset($data['address_uuid']) && !empty($data['address_uuid'])) {
      $this->db->where('address_uuid',$data['address_uuid']);
    }

    # filter with payment_status
    if(isset($data['payment_status']) && !empty($data['payment_status'])) {
      $this->db->where('payment_status',$data['payment_status']);
    }

    # filter with delivery_status
    if(isset($data['delivery_status']) && !empty($data['delivery_status'])) {
      $this->db->where('delivery_status',$data['delivery_status']);
    }

    # filter with status
    if(isset($data['status'])) {
      $this->db->where('status',$data['status']);
    }

    # filter with from
    if(isset($data['from']) && !empty($data['from'])) {
      $this->db->where('created_dt >=',$data['from']);
    }

    # filter with to
    if(isset($data['to']) && !empty($data['to'])) {
      $this->db->where('created_dt <=',$data['to']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $orders = $this->db->get()->result_array();

    # expand branch & subject
    $result = [];
    foreach($orders as $order) {
      # expand order items
      if(!empty($order['uuid'])) {
        $order['_products'] = $this->db->select('*')->from('order_items')->where('order_uuid', $order['uuid'])->get()->result_array();
      } else $order['_products'] = [];
      # expand delivery boy
      if(!empty($order['deliveryboy_uuid'])) {
        $order['_deliveryboy'] = $this->db->select('*')->from('users')->where('uuid', $order['deliveryboy_uuid'])->get()->row_array();
      } else $order['_deliveryboy'] = [];
      # expand address
      if(!empty($order['address_uuid'])) {
        if($order['order_type'] == "OFFLINE") {
          $order['_address'] = $this->db->select('*')->from('offline_address')->where('uuid', $order['address_uuid'])->get()->row_array();
        } else {
          $order['_address'] = $this->db->select('*')->from('online_address')->where('uuid', $order['address_uuid'])->get()->row_array();
        }
      } else $order['_address'] = [];
      # expand user
      if(!empty($order['user_uuid'])) {
        if($order['order_type'] == "OFFLINE") {
          $order['_user'] = $this->db->select('*')->from('offline_address')->where('uuid', $order['address_uuid'])->get()->row_array();
        } else {
          $order['_user'] = $this->db->select('*')->from('users')->where('uuid', $order['user_uuid'])->get()->row_array();
        }
      } else $order['_user'] = [];
      # push to an array
      $result[] = $order;
    }
    
    # return response
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * fetchStatistics
   * 
   * @param   array  $params
   * 
   * @return  array
   */
  public function fetchStatistics(array $params=[])
  {
    # init var
    $data = [];

    # build response
    if($params['role'] == "SUPER_ADMIN") {
      # get super admin counts
      $users = $this->db->select('count(id) as count')->from('users')->where('role', 'USERS')->get()->row_array();
      $deliveryboys = $this->db->select('count(id) as count')->from('users')->where('role', 'DELIVERY_BOYS')->get()->row_array();
      $superadmins = $this->db->select('count(id) as count')->from('users')->where('role', 'SUPER_ADMIN')->get()->row_array();
      $liveorders = $this->db->select('count(id) as count')->from('orders')->where('status', 1)->get()->row_array();
      $acceptedorders = $this->db->select('count(id) as count')->from('orders')->where('payment_status', 'PAID')->get()->row_array();
      $rejectedorder = $this->db->select('count(id) as count')->from('orders')->or_where('delivery_status', 'CLOSED_VDS')->or_where('delivery_status', 'CLOSED_USER')->get()->row_array();
      $smsleft = $this->db->select('*')->from('params')->where('code', 'TOTAL_SMS')->get()->row_array();
      $profit = $this->db->select('sum(delivery_charges) as delivery_charges, sum(total_customer_price) as total_customer_price, sum(total_original_price) as total_original_price')->from('orders')->where('payment_status', 'PAID')->get()->row_array();
      
      # statistics
      $data['total_users'] = $users['count'] ?? 0;
      $data['total_deliveryboys'] = $deliveryboys['count'] ?? 0;
      $data['total_superadmins'] = $superadmins['count'] ?? 0;
      $data['total_live_orders'] = $liveorders['count'] ?? 0;
      $data['total_accepted_orders'] = $acceptedorders['count'] ?? 0;
      $data['total_rejected_orders'] = $rejectedorder['count'] ?? 0;
      $data['total_sms_left'] = $smsleft['value'] ?? 0;
      $data['total_profit'] = ($profit['delivery_charges'] + ($profit['total_customer_price'] - $profit['total_original_price'])) ?? 0;
    } else if($params['role'] == "DELIVERY_BOYS") { 
      # get delivery boy counts
      $deliveryboyorders = $this->db->select('count(id) as count')->from('orders')->where('deliveryboy_uuid', $params['uuid'])->get()->row_array();
      
      # statistics
      $data['total_orders'] = $deliveryboyorders['count'] ?? 0;
    } else if($params['role'] == "USERS") {
      # get super admin counts
      $userliveorders = $this->db->select('count(id) as count')->from('orders')->where('status', 1)->where('user_uuid', $params['uuid'])->get()->row_array();
      $useracceptedorders = $this->db->select('count(id) as count')->from('orders')->where('payment_status', 'PAID')->where('user_uuid', $params['uuid'])->get()->row_array();
      $userrejectedorders = $this->db->select('count(id) as count')->from('orders')->where('user_uuid', $params['uuid'])->where('status',0)->where('delivery_status !=', 'DELIVERED')->get()->row_array();
      $userexpenditure = $this->db->select('sum(delivery_charges) as delivery_charges, sum(total_customer_price) as total_customer_price')->from('orders')->where('payment_status', 'PAID')->where('user_uuid', $params['uuid'])->get()->row_array();

      # statistics
      $data['total_live_orders'] = $userliveorders['count'] ?? 0;
      $data['total_accepted_orders'] = $useracceptedorders['count'] ?? 0;
      $data['total_rejected_orders'] = $userrejectedorders['count'] ?? 0;
      $data['total_expenditure'] = ($userexpenditure['delivery_charges'] + $userexpenditure['total_customer_price']) ?? 0;
    }

    # return response
    return $data;
  }
  
}?>