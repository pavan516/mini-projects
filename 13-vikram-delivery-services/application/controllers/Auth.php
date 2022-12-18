<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* ORG       : OM GROUP OF IT SOLUTIONS
* AUTHOR    : Pavan Kumar
* Email     : en.pavankumar@gmail.com
* Contact   : 8520872771
* Project   : VIKRAM DELIVERY SERVICE
*/
  
/**
 * Auth class / controller
 */
class Auth extends CI_Controller  
{
  # Constructor
  function __construct()
  {
    # Parent constructor
    parent:: __construct();

    # Models
    $this->load->model('AuthModel');
  
    # Helpers
    $this->load->helper('url');

    # Library
    $this->load->library('session');

    # Configurations
    set_time_limit(0);
  }
 
#################################################################################################################################
#################################################################################################################################
#######################################################   REGISTRATION   ########################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: register
   */
  public function register()
  {
    # load register page
    $this->load->view('auth/register');
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: insertUser
   */
  public function insertUser()
  {
    # Init var
    $body = [];

    # validation for mobile
    if(strlen($this->input->post('mobile')) != 10) {
      $this->session->set_flashdata('error', "Invalid Mobile Number!");
      redirect('auth/register', 'refresh');
    }

    # Validation for password
    if(strlen($this->input->post('password')) < 6) {
      $this->session->set_flashdata('error', "Password must contain 6 characters!");
      redirect('auth/register', 'refresh');
    }

    # OTP
    $otp = mt_rand(100000,999999);

    # Parameters
    $body['uuid'] = $this->UUID();
    $body['name'] = $this->input->post('name');
    $body['email']  = $this->input->post('email');
    $body['mobile'] = trim($this->input->post('mobile'));
    $body['password']  = md5((string)trim($this->input->post('password')));
    $body['image']  = "";
    $body['role']  = "USERS";
    $body['verified']  = 0; // 0 = not verified | 1 = verified
    $body['otp'] = $otp;
    $body['status'] = 1; // 0 = deleted | 1 = active

    # return array with user data
    $register = $this->AuthModel->insertUser($body);
    if(isset($register['error'])) {
      $this->session->set_flashdata('error', $register['error']);
      redirect('auth/register', 'refresh');
    }

    # send sms
    $message = "Thank You ".$body['name']." For Registering In Vikram Delivery Services, Your OTP Is ".$otp;
    $sendSms = $this->sendSms($body['mobile'], $message);
    if(!$sendSms) {
      $this->session->set_flashdata('error', "Failed to send OTP, please contact (vikram : 8187848405) for support!");
      redirect('auth/register', 'refresh');
    }

    # return to verification page
    $this->session->set_flashdata('success', $register['success']);
    redirect('auth/verify/otp/'.$body['mobile'], 'refresh');
  }
 
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: verifyOtp
   */
  public function verifyOtp($mobile)
  {
    # get the user
    $user = $this->db->select('*')->from('users')->where('mobile', $mobile)->get()->row_array();
    if(empty($user)) {
      $this->session->set_flashdata('error', "This mobile number not yet registered!");
      redirect('auth/register', 'refresh');
    }

    # redirect to verify user page
    $this->load->view('auth/verifyuser', $user);
  }
 
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: forceVerify
   */
  public function forceVerify($uuid)
  {
    # get the user
    $user = $this->db->select('*')->from('users')->where('uuid', $uuid)->get()->row_array();
    if(empty($user)) {
      $this->session->set_flashdata('error', "Invalid User!");
      redirect('users', 'refresh');
    }

    # Update user
    $update = $this->db->where('uuid',$uuid)->update('users',['verified'=>1]);
    if(!$update) {
      $this->session->set_flashdata('error', "Failed to verify user!");
      redirect('users', 'refresh');
    }

    # redirect to users page
    $this->session->set_flashdata('success', "User Verified By Super Admin Successfully!");
    redirect('users', 'refresh');
  }
 
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: verifyUser
   */
  public function verifyUser()
  {
    # parameters
    $mobile = $this->input->post('mobile') ?? "";
    $otp = $this->input->post('otp') ?? "";
    $userOtp = $this->input->post('user_otp') ?? "";

    # get the user
    $user = $this->db->select('*')->from('users')->where('mobile', $mobile)->get()->row_array();
    if(empty($user)) {
      $this->session->set_flashdata('error', "Failed to authenticate your mobile number!");
      redirect('auth/register', 'refresh');
    }

    # confirm otp
    if($otp != $userOtp) {
      $this->session->set_flashdata('error', "Invalid OTP, If you are finding issue with verifying your account - please contact (vikram : 8187848405) for support!");
      $this->load->view('auth/verifyuser', ['mobile'=>$mobile, 'otp'=>$otp]);
    }

    # Update user
    $this->db->where('mobile',$mobile)->update('users',['verified'=>1]);

    # redirect to home page with success message
    $this->session->set_flashdata('success', "Your account has been verified successfully!");
    redirect('auth/login', 'refresh');
  }
 
#################################################################################################################################
#################################################################################################################################
#######################################################   LOGIN   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: login
   */
  public function login()
  {
    # load login page
    $this->load->view('auth/login');
  }
 
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: userLogin
   */
  public function userLogin()
  {
    # Parameters
    $mobile = trim($this->input->post('mobile'));
    $pass  = trim($this->input->post('password'));

    # return error/success msg
    $login = $this->AuthModel->login($mobile, $pass);
    if(isset($login['error'])) {
      $this->session->set_flashdata('error', $login['error']);
      redirect('auth/login', 'refresh');
    }
    
    # return
    redirect('', 'refresh');
  }
 
#################################################################################################################################
#################################################################################################################################
#################################################   FORGOT PASSWORD   ###########################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: forgotPassword
   */
  public function forgotPassword()
  {
    # load forgot password page
    $this->load->view('auth/forgotpassword');
  }
 
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: verifyOtpToResetPass
   */
  public function verifyOtpToResetPass()
  {
    # Parameter
    $mobile = trim($this->input->post('mobile'));

    # get the user
    $user = $this->db->select('*')->from('users')->where('mobile', $mobile)->get()->row_array();
    if(empty($user)) {
      $this->session->set_flashdata('error', "This mobile number not yet registered!");
      redirect('auth/forgotpassword', 'refresh');
    }
    
    # OTP
    $otp = mt_rand(100000,999999);

    # Update user
    $this->db->where('mobile',$mobile)->update('users',['otp'=>$otp]);

    # get updated user
    $user = $this->db->select('*')->from('users')->where('mobile', $mobile)->get()->row_array();

    # send sms
    $message = "Hi, ".$user['name']." Your OTP: ".$otp." To reset your password";
    $sendSms = $this->sendSms($user['mobile'], $message);
    if(!$sendSms) {
      $this->session->set_flashdata('error', "Failed to send OTP, please contact (vikram : 8187848405) for support!");
      redirect('auth/forgotpassword', 'refresh');
    }

    # redirect to reset password page
    $this->session->set_flashdata('success', 'OTP sent to your mobile: '.$user['mobile'].' Please wait for 30 seconds to receive OTP, If not received - Please contact : 8187848405');
    $this->load->view('auth/resetpassword', $user);
  }
 
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: resetPassword
   */
  public function resetPassword()
  {
    # parameters
    $mobile = $this->input->post('mobile') ?? "";
    $otp = $this->input->post('otp') ?? "";
    $userOtp = $this->input->post('user_otp') ?? "";
    $password = $this->input->post('password') ?? "";

    # get the user
    $user = $this->db->select('*')->from('users')->where('mobile', $mobile)->get()->row_array();
    if(empty($user)) {
      $this->session->set_flashdata('error', "This mobile number not yet registered!");
      redirect('auth/forgotpassword', 'refresh');
    }

    # Validation for password
    if(strlen($password) < 6) {
      $this->session->set_flashdata('error', "Password must contain 6 characters!");
      $this->load->view('auth/resetpassword', $user);
    }
    
    # If otp & user otp is not same
    if($otp != $userOtp) {
      $this->session->set_flashdata('error', "Invalid OTP, If you are finding an issue with verifying your account - please contact (vikram : 8187848405) for support!");
      $this->load->view('auth/resetpassword', $user);
    } else {
      # Update user
      $this->db->where('mobile',$mobile)->update('users',['password'=>md5((string)$password)]);

      # redirect to home page with success message
      $this->session->set_flashdata('success', "Your password has been reset successfully!");
      redirect('auth/login', 'refresh');
    }
  }
 
#################################################################################################################################
#################################################################################################################################
#################################################   LOGOUT SESSION   ############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: logout
   */
  public function logout()
  {
    # make sure session exist
    if(!empty($this->session->userdata('mobile'))) {
      # unset session data
      $this->session->unset_userdata('id');
      $this->session->unset_userdata('uuid');
      $this->session->unset_userdata('name');
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('mobile');
      $this->session->unset_userdata('password');
      $this->session->unset_userdata('image');
      $this->session->unset_userdata('role');
      $this->session->unset_userdata('verified');
      $this->session->unset_userdata('otp');
      $this->session->unset_userdata('status');
      $this->session->unset_userdata('image');
      $this->session->unset_userdata('created_dt');
      $this->session->unset_userdata('modified_dt');
    }

    # return
    redirect('', 'refresh');
  }
  
#################################################################################################################################
#################################################################################################################################
#################################################   CHANGE PASSWORD   ###########################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: changePassword
   */
  public function changePassword()
  {
    # parameters
    $oldPass = trim($this->input->post('old_pass') ?? "");
    $newPass = trim($this->input->post('new_pass') ?? "");
    $repeatPass = trim($this->input->post('repeat_pass') ?? "");

    # Validation for password
    if(strlen($this->input->post('new_pass')) < 6) {
      $this->session->set_flashdata('error', "Password must contain 6 characters!");
      redirect('user/profile/'.$this->session->userdata('uuid'), 'refresh');
    }

    # get the user
    $user = $this->db->select('*')->from('users')->where('mobile', $this->session->userdata('mobile'))->get()->row_array();
    if(empty($user)) {
      $this->session->set_flashdata('error', "Please try later!");
      redirect('user/profile/'.$this->session->userdata('uuid'), 'refresh');
    }

    # verify old password
    if(md5((string)$oldPass) != $user['password']) {
      $this->session->set_flashdata('error', "In-correct old password!");
      redirect('user/profile/'.$this->session->userdata('uuid'), 'refresh');
    }

    # make sure new & repeat password are same
    if($newPass != $repeatPass) {
      $this->session->set_flashdata('error', "Passwords doesn't match!");
      redirect('user/profile/'.$this->session->userdata('uuid'), 'refresh');
    }

    # update password
    $update = $this->db->where('uuid', $this->session->userdata('uuid'))->update('users', ['password'=>md5((string)$newPass)]);
    if(!$update) {
      $this->session->set_flashdata('error', "Failed to change password, Please try after sometime!");
      redirect('user/profile/'.$this->session->userdata('uuid'), 'refresh');
    }

    # redirect to login page & logout the session
    $this->session->set_flashdata('success', "Your password changed successfully!");
    redirect('auth/logout', 'refresh');
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