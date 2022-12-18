<?php
# No direct script access allowed
defined('BASEPATH') OR exit('No direct script access allowed');

# This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * Users Controller
 */
class UsersController extends REST_Controller
{
  # Construct the parent class
  public function __construct() {
    parent::__construct();

    # Load model
    $this->load->model('UsersModel');
    $this->load->model('LibraryModel');
  }

#
########################################################################################################
#

  /**
   * Method : POST
   * Method Name : register
   * Description : register a new user
   * 
   * POST BODY : Json Body
   * {
   *    "user_name":"",
   *    "user_email":"",
   *    "user_mobile":"",
   *    "user_password":"",
   *    "user_gender":"",
   *    "user_status":"",
   *    "user_profile_pic":"",
   * }
   * 
   * @return  array response
   */
  public function register_post()
  {    
    # Validate HTTP Request "Content-type"
    if (!preg_match('/application\/json/i',($this->input->get_request_header('Content-Type') ?? ''))) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Content-Type must be application-json'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Decode payload to array - get post body
    $input = (json_decode(file_get_contents('php://input'),true) ?? []);
    if (empty($input)) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Invalid post body'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # user_name exist check
    if(empty($input['user_name'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'user_name is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # user_email exist check
    if(empty($input['user_email'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'user_email is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # user_mobile exist check
    if(empty($input['user_mobile'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'user_mobile is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # user_password exist check
    if(empty($input['user_password'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'user_password is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Send request to model - returns an array
    $result=$this->UsersModel->register($input);

    # Set error message if found
    if(isset($result['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $result['message']], REST_Controller::HTTP_NOT_FOUND);
    }

	  # Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_CREATED);
  }

#
########################################################################################################
#

  /**
   * Method : POST
   * Method Name : login
   * Description : login with email & password
   * 
   * POST BODY : Json Body
   * {
   *    "user_mobile":"",
   *    "user_password":""
   * }
   * 
   * @return  array response
   */
  public function login_post()
  {
    # Validate HTTP Request "Content-type"
    if (!preg_match('/application\/json/i',($this->input->get_request_header('Content-Type') ?? ''))) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Content-Type must be application-json'], REST_Controller::HTTP_BAD_REQUEST); 
    }   
    
    # Decode payload to array - get post body 
    $input = (json_decode(file_get_contents('php://input'),true) ?? []);
    if (empty($input)) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Invalid post body'], REST_Controller::HTTP_BAD_REQUEST);
    }
    
    # user_mobile exist check
    if(empty($input['user_mobile'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'user_mobile is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }
    
    # user_password exist check
    if(empty($input['user_password'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'user_password is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Send request to model - returns an array
    $result=$this->UsersModel->login($input);

    # Set error message if found
    if(isset($result['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $result['message']], REST_Controller::HTTP_NOT_FOUND); 
    }

		# Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_CREATED);
  }

#
########################################################################################################
#

  /**
   * Method : POST
   * Method Name : changePassword
   * Description : Change Password
   * 
   * POST BODY : Json Body
   * {
   *    "old_password":"",
   *    "new_password":"",
   *    "repeat_password":""
   * }
   * 
   * @return  array response
   */
  public function changePassword_post()
  {
    # Header Check - Content-Type : Application / Json
    if (!preg_match('/application\/json/i',($this->input->get_request_header('Content-Type') ?? ''))) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Content-Type must be application-json'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Get Token & Explode $token to get token & key
    $token = $this->input->get_request_header('Authorization') ?? '';
    $data = explode(" ", $token);

    # Validate 'Authorization' exist check
    if ( (empty($token)) || (strtolower($data[0]) !== "token") || (empty($data[1])) ) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Authorization Token Is Missing'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Verify token & expiry date
    $verify = (new LibraryModel())->verifyToken($data[1]);
    if(isset($verify['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $verify['message']], REST_Controller::HTTP_NOT_FOUND); 
    }
    
    # Decode payload to array - get post body 
    $input = (json_decode(file_get_contents('php://input'),true) ?? []);
    if (empty($input)) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Invalid post body'], REST_Controller::HTTP_BAD_REQUEST);
    }
    
    # old_password exist check
    if(empty($input['old_password'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'old_password is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }
    
    # new_password exist check
    if(empty($input['new_password'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'new_password is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # repeat_password exist check
    if(empty($input['repeat_password'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'repeat_password is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }
    
    # Send request to model - returns an array
    $result=$this->UsersModel->changePassword($input, $data[1]);

    # Set error message if found
    if(isset($result['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $result['message']], REST_Controller::HTTP_NOT_FOUND); 
    }

	  # Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_CREATED);
  }

#
########################################################################################################
#

  /**
   * Method : POST
   * Method Name : forgotPassword
   * Description : Forgot Password
   * 
   * POST BODY : Json Body
   * {
   *    "new_password":"",
   *    "repeat_password":""
   * }
   * 
   * @return  array response
   */
  public function forgotPassword_post()
  {
    # Header Check - Content-Type : Application / Json
    if (!preg_match('/application\/json/i',($this->input->get_request_header('Content-Type') ?? ''))) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Content-Type must be application-json'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Get Token & Explode $token to get token & key
    $token = $this->input->get_request_header('Authorization') ?? '';
    $data = explode(" ", $token);

    # Validate 'Authorization' exist check
    if ( (empty($token)) || (strtolower($data[0]) !== "token") || (empty($data[1])) ) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Authorization Token Is Missing'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Verify token & expiry date
    $verify = (new LibraryModel())->verifyToken($data[1]);
    if(isset($verify['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $verify['message']], REST_Controller::HTTP_NOT_FOUND); 
    }
    
    # Decode payload to array - get post body 
    $input = (json_decode(file_get_contents('php://input'),true) ?? []);
    if (empty($input)) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Invalid post body'], REST_Controller::HTTP_BAD_REQUEST);
    }
        
    # new_password exist check
    if(empty($input['new_password'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'new_password is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # repeat_password exist check
    if(empty($input['repeat_password'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'repeat_password is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }
    
    # Send request to model - returns an array
    $result=$this->UsersModel->forgotPassword($input, $data[1]);

    # Set error message if found
    if(isset($result['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $result['message']], REST_Controller::HTTP_NOT_FOUND); 
    }

	  # Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_CREATED);
  }

#
########################################################################################################
#

  /**
   * Method : POST
   * Method Name : Logout
   * Description : Logout
   *  
   * @return  array response
   */
  public function logout_get()
  {
    # Header Check - Content-Type : Application / Json
    if (!preg_match('/application\/json/i',($this->input->get_request_header('Content-Type') ?? ''))) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Content-Type must be application-json'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Get Token & Explode $token to get token & key
    $token = $this->input->get_request_header('Authorization') ?? '';
    $data = explode(" ", $token);

    # Validate 'Authorization' exist check
    if ( (empty($token)) || (strtolower($data[0]) !== "token") || (empty($data[1])) ) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Authorization Token Is Missing'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Verify token & expiry date
    $verify = (new LibraryModel())->verifyToken($data[1]);
    if(isset($verify['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $verify['message']], REST_Controller::HTTP_NOT_FOUND); 
    }
    
    # Send request to model - returns an array
    $result=$this->UsersModel->logout($data[1]);

    # Set error message if found
    if(!$result) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => "Failed To Logout!"], REST_Controller::HTTP_NOT_FOUND); 
    }

	  # Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_CREATED);
  }

#
########################################################################################################
#

  /**
   * Method : GET
   * Method Name : getUser
   * 
   * @return  array response
   */
  public function getUser_get()
  {
    # Header Check - Content-Type : Application / Json
    if (!preg_match('/application\/json/i',($this->input->get_request_header('Content-Type') ?? ''))) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Content-Type must be application-json'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Validate 'Authorization' exist check
    if (empty($this->input->get_request_header('Authorization') ?? '')) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Authorization Token Is Missing'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Get Token & Explode $token to get token & key
    $token = $this->input->get_request_header('Authorization') ?? '';
    $data = explode(" ", $token);

    # Validate 'Authorization' exist check
    if ( (empty($token)) || (strtolower($data[0]) !== "token") || (empty($data[1])) ) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Authorization Token Is Missing'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Verify token & expiry date
    $verify = (new LibraryModel())->verifyToken($data[1]);
    if(isset($verify['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $verify['message']], REST_Controller::HTTP_NOT_FOUND); 
    }

    # Send request to model - returns an array
    $result=$this->LibraryModel->getAuthUser($data[1]);

    # Set error message if found
    if(isset($result['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $result['message']], REST_Controller::HTTP_NOT_FOUND);
    }

		# Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_OK);
  }

#
########################################################################################################
#

  /**
   * Method : PUT
   * Method Name : update
   * Description : update a existing record
   * 
   * POST BODY : Json Body
   * {
   *    "user_name":"",
   *    "user_gender":"",
   *    "user_status":"",
   *    "user_profile_pic":""
   * }
   * 
   * @param   int       $id   ID
   * 
   * @return  array response
   */
  public function update_put()
  {
    # Header Check - Content-Type : Application / Json
    if (!preg_match('/application\/json/i',($this->input->get_request_header('Content-Type') ?? ''))) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Content-Type must be application-json'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Validate 'Authorization' exist check
    if (empty($this->input->get_request_header('Authorization') ?? '')) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Authorization Token Is Missing'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Get Token & Explode $token to get token & key
    $token = $this->input->get_request_header('Authorization') ?? '';
    $data = explode(" ", $token);

    # Validate 'Authorization' exist check
    if ( (empty($token)) || (strtolower($data[0]) !== "token") || (empty($data[1])) ) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Authorization Token Is Missing'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Verify token & expiry date
    $verify = (new LibraryModel())->verifyToken($data[1]);
    if(isset($verify['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $verify['message']], REST_Controller::HTTP_NOT_FOUND); 
    }

    # Decode payload to array - get post body 
    $input = (json_decode(file_get_contents('php://input'),true) ?? []);
    if (empty($input)) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Invalid post body'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Send request to model - returns an array
    $result=$this->UsersModel->update($input, $data[1]);

    # Set error message if found
    if(isset($result['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $result['message']], REST_Controller::HTTP_NOT_FOUND);
    }

		# Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_CREATED);
  }

#
########################################################################################################
#

  /**
   * Method : DELETE
   * Method Name : delete
   * Description : Delete a record
   * 
   * @param  int   $id   ID
   * 
   * @return  array response
   */
  public function delete_delete()
  {
    # Header Check - Content-Type : Application / Json
    if (!preg_match('/application\/json/i',($this->input->get_request_header('Content-Type') ?? ''))) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Content-Type must be application-json'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Validate 'Authorization' exist check
    if (empty($this->input->get_request_header('Authorization') ?? '')) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Authorization Token Is Missing'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Get Token & Explode $token to get token & key
    $token = $this->input->get_request_header('Authorization') ?? '';
    $data = explode(" ", $token);

    # Validate 'Authorization' exist check
    if ( (empty($token)) || (strtolower($data[0]) !== "token") || (empty($data[1])) ) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Authorization Token Is Missing'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Verify token & expiry date
    $verify = (new LibraryModel())->verifyToken($data[1]);
    if(isset($verify['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $verify['message']], REST_Controller::HTTP_NOT_FOUND); 
    }

    # Send request to model - returns an boolean (true/false)
    $result = $this->UsersModel->delete($data[1]);

    # Set error message if found
    if(!$result) {
      # NOT_FOUND (404) being the HTTP response code
      $this->set_response(['status' => 'fail', 'code' => '0', 'message' => 'Failed To Delete Record'], REST_Controller::HTTP_NOT_FOUND);
    }

    # NO_CONTENT (204) being the HTTP response code
    $this->set_response(['status' => 'success', 'code' => '1', 'id' => $id, 'message' => 'Deleted the resource'], REST_Controller::HTTP_NO_CONTENT);
  }

#
########################################################################################################
#

  /**
   * Method : POST
   * Method Name : sendForgotPasswordLink
   * Description : Send Mail
   * 
   * POST BODY : Json Body
   * {
   *    "user_mobile":""
   *    "url":""
   * }
   * 
   * @return  array response
   */
  public function sendForgotPasswordLink_post()
  {
    # Header Check - Content-Type : Application / Json
    if (!preg_match('/application\/json/i',($this->input->get_request_header('Content-Type') ?? ''))) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Content-Type must be application-json'], REST_Controller::HTTP_BAD_REQUEST);
    }
    
    # Decode payload to array - get post body 
    $input = (json_decode(file_get_contents('php://input'),true) ?? []);
    if (empty($input)) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'Invalid post body'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Send request to model - returns an boolean (true/false)
    $result = $this->UsersModel->sendForgotPasswordLink($input);

    # Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_CREATED);
  }

}