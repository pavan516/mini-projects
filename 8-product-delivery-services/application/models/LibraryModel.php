<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * LibraryModel
 */
class LibraryModel extends CI_Model
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
    $result['path'] = $filename.'.'.$imageFileType;
    
    # return result
    return $result;
  }
  
#################################################################################################################################
#################################################################################################################################
####################################################   USERS   ##################################################################
#################################################################################################################################
#################################################################################################################################

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
    $insert = $this->db->insert('address', $data);
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
      # expand address
      if(!empty($user['uuid'])) {
        $addresses = $this->db->select('*')->from('address')->where('user_uuid', $user['uuid'])->order_by("id", "desc")->get()->result_array();
        if(!empty($addresses)) {
          foreach($addresses as $address) {
            $address['_area'] = $this->fetchAreas(['id'=>$address['area_id']])[0];
            $user['_addresses'][] = $address;
          }
        } else {
          $user['_addresses'] = [];
        }
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

    # filter with salesboy_uuid
    if(isset($data['salesboy_uuid']) && !empty($data['salesboy_uuid'])) {
      $this->db->where('salesboy_uuid',$data['salesboy_uuid']);
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
      $this->db->where('delivered_date >=',$data['from']);
    }

    # filter with to
    if(isset($data['to']) && !empty($data['to'])) {
      $this->db->where('delivered_date <=',$data['to']);
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
        $products = $this->db->select('*')->from('order_items')->where('order_uuid', $order['uuid'])->get()->result_array();
        if(!empty($products)) {
          foreach($products as $product) {
            $product['_product'] = $this->db->select('*')->from('products')->where('uuid', $product['product_uuid'])->get()->row_array();
            $order['_products'][] = $product;
          }
        }  
      } else $order['_products'] = [];
      # expand sales boy
      if(!empty($order['salesboy_uuid'])) {
        $order['_salesboy'] = $this->db->select('*')->from('users')->where('uuid', $order['salesboy_uuid'])->get()->row_array();
      } else $order['_salesboy'] = [];
      # expand address
      if(!empty($order['address_uuid'])) {
        $order['_address'] = $this->fetchAddress(['uuid', $order['address_uuid']])[0];
      } else $order['_address'] = [];
      # expand user
      if(!empty($order['user_uuid'])) {
        $order['_user'] = $this->db->select('*')->from('users')->where('uuid', $order['user_uuid'])->get()->row_array();
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
      $salesboys = $this->db->select('count(id) as count')->from('users')->where('role', 'SALES_BOYS')->get()->row_array();
      $superadmins = $this->db->select('count(id) as count')->from('users')->where('role', 'SUPER_ADMIN')->get()->row_array();
      $liveorders = $this->db->select('count(id) as count')->from('orders')->where('status', 1)->get()->row_array();
      $ordersdelivered = $this->db->select('count(id) as count')->from('orders')->where('status', 0)->get()->row_array();
      $profit = $this->db->select('sum(total_selling_price) as total_selling_price')->from('orders')->where('payment_status', 'PAID')->get()->row_array();
      $amounttoreceive = $this->db->select('sum(total_selling_price) as total_amount_to_receive')->from('orders')->where('payment_status', 'NOT-PAID')->get()->row_array();
      
      # statistics
      $data['total_users'] = $users['count'] ?? 0;
      $data['total_salesboys'] = $salesboys['count'] ?? 0;
      $data['total_superadmins'] = $superadmins['count'] ?? 0;
      $data['total_live_orders'] = $liveorders['count'] ?? 0;
      $data['total_orders_delivered'] = $ordersdelivered['count'] ?? 0;
      $data['total_profit'] = $profit['total_selling_price'] ?? 0;
      $data['total_amount_to_receive'] = $profit['total_amount_to_receive'] ?? 0;
    } else if($params['role'] == "SALES_BOYS") { 
      # get sales boy counts
      $salesboyorders = $this->db->select('count(id) as count')->from('orders')->where('salesboy_uuid', $params['uuid'])->get()->row_array();
      
      # statistics
      $data['total_orders'] = $salesboyorders['count'] ?? 0;
    } else if($params['role'] == "USERS") {
      # get super admin counts
      $userliveorders = $this->db->select('count(id) as count')->from('orders')->where('status', 1)->where('user_uuid', $params['uuid'])->get()->row_array();
      $ordersdelivered = $this->db->select('count(id) as count')->from('orders')->where('status', 0)->where('user_uuid', $params['uuid'])->get()->row_array();
      $amounttopay = $this->db->select('sum(total_selling_price) as total_amount_to_pay')->from('orders')->where('payment_status', 'NOT-PAID')->where('user_uuid', $params['uuid'])->get()->row_array();
      $userexpenditure = $this->db->select('sum(total_selling_price) as total_selling_price')->from('orders')->where('payment_status', 'PAID')->where('user_uuid', $params['uuid'])->get()->row_array();

      # statistics
      $data['total_live_orders'] = $userliveorders['count'] ?? 0;
      $data['total_orders_delivered'] = $ordersdelivered['count'] ?? 0;
      $data['total_amount_to_pay'] = $amounttopay['total_amount_to_pay'] ?? 0;
      $data['total_expenditure'] = $userexpenditure['total_selling_price'] ?? 0;
    }

    # return response
    return $data;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * fetchOverview
   * 
   * @param   array  $params
   * 
   * @return  array
   */
  public function fetchOverview(array $data=[])
  {
    # init var
    $orders = [];

    # build query
    $this->db->select('count(id) as total_orders, SUM(total_original_price) as total_original_price,SUM(total_discount_price) as total_discount_price,SUM(total_selling_price) as total_selling_price,')->from('orders');

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

    # filter with salesboy_uuid
    if(isset($data['salesboy_uuid']) && !empty($data['salesboy_uuid'])) {
      $this->db->where('salesboy_uuid',$data['salesboy_uuid']);
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
      $this->db->where('delivered_date >=',$data['from']);
    }

    # filter with to
    if(isset($data['to']) && !empty($data['to'])) {
      $this->db->where('delivered_date <=',$data['to']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $orders = $this->db->get()->result_array();
    
    # return response
    return $orders;
  }
  
#################################################################################################################################
#################################################################################################################################
##################################################  LOOKUP METHODS   ############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchCountries
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchCountries(array $data=[])
  {
    # init var
    $countries = [];

    # build query
    $this->db->select('*')->from('countries');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with country_code
    if(isset($data['country_code']) && !empty($data['country_code'])) {
      $this->db->where('country_code',$data['country_code']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $countries = $this->db->get()->result_array();
    
    # return response
    return $countries;
  }
  
  /**
   * fetchStates
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchStates(array $data=[])
  {
    # init var
    $states = [];

    # build query
    $this->db->select('*')->from('states');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with country_id
    if(isset($data['country_id']) && $data['country_id'] !== 0 && !empty($data['country_id'])) {
      $this->db->where('country_id',$data['country_id']);
    }

    # filter with state_code
    if(isset($data['state_code']) && !empty($data['state_code'])) {
      $this->db->where('state_code',$data['state_code']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $states = $this->db->get()->result_array();

    # expand
    $result = [];
    foreach($states as $state) {
      $state['_country'] = $this->fetchCountries(['id'=>$state['country_id']])[0] ?? [];
      $result[] = $state;
    }
    
    # return response
    return $result;
  }
  
  /**
   * fetchCities
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchCities(array $data=[])
  {
    # init var
    $cities = [];

    # build query
    $this->db->select('*')->from('cities');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with state_id
    if(isset($data['state_id']) && $data['state_id'] !== 0 && !empty($data['state_id'])) {
      $this->db->where('state_id',$data['state_id']);
    }

    # filter with city_code
    if(isset($data['city_code']) && !empty($data['city_code'])) {
      $this->db->where('city_code',$data['city_code']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $cities = $this->db->get()->result_array();

    # expand
    $result = [];
    foreach($cities as $city) {
      $city['_state'] = $this->fetchStates(['id'=>$city['state_id']])[0] ?? [];
      $result[] = $city;
    }
    
    # return response
    return $result;
  }
  
  /**
   * fetchAreas
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchAreas(array $data=[])
  {
    # init var
    $areas = [];

    # build query
    $this->db->select('*')->from('areas');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with city_id
    if(isset($data['city_id']) && $data['city_id'] !== 0 && !empty($data['city_id'])) {
      $this->db->where('city_id',$data['city_id']);
    }

    # filter with area_code
    if(isset($data['area_code']) && !empty($data['area_code'])) {
      $this->db->where('area_code',$data['area_code']);
    }

    # filter with pincode
    if(isset($data['pincode']) && !empty($data['pincode'])) {
      $this->db->where('pincode',$data['pincode']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $areas = $this->db->get()->result_array();

    # expand
    $result = [];
    foreach($areas as $area) {
      $area['_city'] = $this->fetchCities(['id'=>$area['city_id']])[0] ?? [];
      $result[] = $area;
    }
    
    # return response
    return $result;
  }

#################################################################################################################################
#################################################################################################################################
##################################################  LOOKUP METHODS   ############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchProducts
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchProducts(array $data=[])
  {
    # init var
    $products = [];

    # build query
    $this->db->select('*')->from('products');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with uuid
    if(isset($data['uuid']) && !empty($data['uuid'])) {
      $this->db->where('uuid',$data['uuid']);
    }

    # filter with code
    if(isset($data['code']) && !empty($data['code'])) {
      $this->db->where('code',$data['code']);
    }

    # filter with batchno
    if(isset($data['batchno']) && !empty($data['batchno'])) {
      $this->db->where('batchno',$data['batchno']);
    }

    # filter with model_year
    if(isset($data['model_year']) && !empty($data['model_year'])) {
      $this->db->where('model_year',$data['model_year']);
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
    $products = $this->db->get()->result_array();

    # return response
    return $products;
  } 
  
#################################################################################################################################
#################################################################################################################################
##################################################  LOOKUP METHODS   ############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchAddress
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchAddress(array $data=[])
  {
    # init var
    $addresses = [];

    # build query
    $this->db->select('*')->from('address');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with uuid
    if(isset($data['uuid']) && !empty($data['uuid'])) {
      $this->db->where('uuid',$data['uuid']);
    }

    # filter with user_uuid
    if(isset($data['user_uuid']) && !empty($data['user_uuid'])) {
      $this->db->where('user_uuid',$data['user_uuid']);
    }

    # filter with country_id
    if(isset($data['country_id']) && strlen($data['country_id'])>0) {
      $this->db->where('country_id',$data['country_id']);
    }

    # filter with state_id
    if(isset($data['state_id']) && strlen($data['state_id'])>0) {
      $this->db->where('state_id',$data['state_id']);
    }

    # filter with city_id
    if(isset($data['city_id']) && strlen($data['city_id'])>0) {
      $this->db->where('city_id',$data['city_id']);
    }

    # filter with area_id
    if(isset($data['area_id']) && strlen($data['area_id'])>0) {
      $this->db->where('area_id',$data['area_id']);
    }

    # order by id desc
    $this->db->order_by("id", "desc"); 

    # result query
    $addresses = $this->db->get()->result_array();

    # expand
    $result = [];
    foreach($addresses as $address) {
      # expand = area
      if($address['area_id'] != 0) {
        $address['_area'] = $this->fetchAreas(['id'=>$address['area_id']])[0] ?? [];
      }
      #push to an array
      $result[] = $address;
    }
    
    # return response
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Get All Products (filters include)
   *
   * @param int     $page
   * @param string  $skey
   * @param array   $data
   *
   * @return  array
   */
  public function getAllProducts(int $page=1, string $skey='', array $data=[]) :array
	{
    # Page No
    $lstart = (\intval($page)-1)*10;

    # List of results
    $lend = 10;

    # search variable
		$skey = \trim($skey);

    # init var
    $products = [];

    # Build query
    $this->db->select('*');

    # filter by id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with uuid
    if(isset($data['uuid']) && !empty($data['uuid'])) {
      $this->db->where('uuid',$data['uuid']);
    }

    # filter with code
    if(isset($data['code']) && !empty($data['code'])) {
      $this->db->where('code',$data['code']);
    }

    # filter with batchno
    if(isset($data['batchno']) && !empty($data['batchno'])) {
      $this->db->where('batchno',$data['batchno']);
    }

    # filter with model_year
    if(isset($data['model_year']) && !empty($data['model_year'])) {
      $this->db->where('model_year',$data['model_year']);
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

    # search with name
    if(!empty($skey)) {
      $this->db->like('name', $skey);
		}

    # force
    $this->db->order_by("id", "desc");

    # get count
    $total = $this->db->count_all_results('products', FALSE);
    if($lstart < 0){
      $lstart = 0;
			$this->db->limit($lend,$lstart);
		} else {
      $this->db->limit($lend,$lstart);
		}

    # fetch products - exec query
    $products = $this->db->get()->result();

    # return result
    return array('get_products'=>$products,'total'=>$total);
	}

	public function create_links($total_rows=0, $per_page=0, $cur_page=0,$num_links=2)
	{
		if ($total_rows == 0 OR $per_page == 0)
		return '';
		
		$num_pages = (int) ceil($total_rows / $per_page);
	
		if ($num_pages === 1)
		return '';

		
		if($cur_page > $num_pages)
			$cur_page = $num_pages;		

		if($cur_page<$num_links)
		{
			$start	= 1;
			if($num_links > $num_pages) 
				$end = $num_pages;	
			else
				$end = $num_links;
		}
		else
		{
			$start	= $cur_page;
			if(($cur_page + $num_links) > $num_pages) 
				$end = $num_pages;	
			else
				$end = $num_links;
		}
		
		$output = '';
		// Render the "First" link.
		if ($cur_page > 1)
		$output .= '<li page="1"><a aria-label="First"  href="javascript:void(0);"> <span aria-hidden="true">First</span></a></li>';

       
      
		// Render the "Previous" link.
		if ($cur_page !== 1 && $cur_page>1)
		$output .= '<li page="'.($cur_page-1).'"><a href="javascript:void(0);">Previous</li></a>';

		for ($loop = $start; $loop <= $end; $loop++)
		{ 
			if (intval($cur_page) == intval($loop))
				$output .= "<li page='$loop' class='active'><a href='javascript:void(0);'>".$loop."</a></li>";
			else
				$output .= "<li page='$loop'><a href='javascript:void(0);'>".$loop."</a></li>";
		}	
		
		if ($cur_page < $num_pages)
		{
			$i = $cur_page + 1;
			$output .= "<li page='$i'><a href='javascript:void(0);'>Next</a></li>";
		}

		if($cur_page < $num_pages-1)
		$output .= "<li page='$num_pages'><a href='javascript:void(0);'>Last</a></li>";
		//var_dump($output);die;  
		return $output;
	}

}?>