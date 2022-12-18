<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Home class / controller
 */
class Home extends CI_Controller  
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

    # redirect to login if session does not exist
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
      redirect('index.php/salesboy/orders', 'refresh');
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
      $uploadImage = $this->LibraryModel->uploadImage($filename);
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

    # update address for sales boy
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

    # return to profile page
    $this->session->set_flashdata('success', "Successfully updated profile!");
    redirect('index.php/user/profile/'.$this->session->userdata('uuid'), 'refresh');
  }

}?>