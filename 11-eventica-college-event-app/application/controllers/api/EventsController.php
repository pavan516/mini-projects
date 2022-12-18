<?php
# No direct script access allowed
defined('BASEPATH') OR exit('No direct script access allowed');

# This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . 'libraries/REST_Controller.php';

/**
 * Events Controller
 */
class EventsController extends REST_Controller
{
  # Construct the parent class
  public function __construct() {
    parent::__construct();
    # Load model
    $this->load->model('EventsModel');
    $this->load->model('LibraryModel');
  }

  /**
   * Method : GET
   * Method Name : fetch
   * Description : fetch all records based on params
   * 
   * @param   array List of params
   * 
   * NOTE : PAGINATION INFORMATION
   * @param   string    limit - no of records to show
   * @param   string    start - from where to show (starting point)
   * 
   * @return  array response
   */
  public function fetch_get()
  {
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

    # Get Params
    $params = [
      'event_id'=>$this->get('event_id') ?? '',
      'event_date'=>$this->get('event_date') ?? '',
      'category_id'=>$this->get('category_id') ?? '',
      'limit'=>$this->get('limit') ?? '',
      'start'=>$this->get('start') ?? ''
    ];

    # Send request to model - returns an array
    $result=$this->CountryModel->fetch($params);;

    # Set error message if found
    if(isset($result['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $result['message']], REST_Controller::HTTP_NOT_FOUND);
    }

		# Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_OK);
  }

  /**
   * Method : POST
   * Method Name : create
   * Description : create a new record
   * 
   * POST BODY : Json Body
   * {
   *    "event_date":"",
   *    "event_title":"",
   *    "event_description":"",
   *    "event_location":"",
   *    "event_latitude":"",
   *    "event_longitude":"",
   *    "event_image_path":"",
   *    "category_id":"",
   *    "event_social_media_links":"",
   *    "event_status":""
   * }
   * 
   * @return  array response
   */
  public function create_post()
  {
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

    # event_title exist check
    if(empty($input['event_title'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'event_title is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # category_id exist check
    if(empty($input['category_id'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'category_id is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Send request to model - returns an array
    $result=$this->EventsModel->create($input);

    # Set error message if found
    if(isset($result['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $result['message']], REST_Controller::HTTP_NOT_FOUND);
    }

		# Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_CREATED);
  }

  /**
   * Method : PUT
   * Method Name : update
   * Description : update a existing record
   * 
   * POST BODY : Json Body
   * {
   *    "event_date":"",
   *    "event_title":"",
   *    "event_description":"",
   *    "event_location":"",
   *    "event_latitude":"",
   *    "event_longitude":"",
   *    "event_image_path":"",
   *    "category_id":"",
   *    "event_social_media_links":"",
   *    "event_status":""
   * }
   * 
   * @param   int       $id   ID
   * 
   * @return  array response
   */
  public function update_put(int $id)
  {
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
    
    # id exist check
    if(empty($id)) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'id is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # event_title exist check
    if(empty($input['event_title'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'event_title is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # category_id exist check
    if(empty($input['category_id'])) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'details'=>'category_id is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Send request to model - returns an array
    $result=$this->EventsModel->update($id, $input);

    # Set error message if found
    if(isset($result['message'])) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => 'fail', 'code' => '0', 'message' => $result['message']], REST_Controller::HTTP_NOT_FOUND);
    }

		# Set (200) OK being the HTTP response code & return an array
    $this->set_response(['status' => 'success', 'code' => '1', 'data' => $result], REST_Controller::HTTP_CREATED);
  }

  /**
   * Method : DELETE
   * Method Name : delete
   * Description : Delete a record
   * 
   * @param  int   $id   ID
   * 
   * @return  array response
   */
  public function delete_delete(int $id)
  {
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

    # id exist check
    if(empty($id)) {
      return $this->set_response(['status'=>'fail', 'code'=>'0', 'message'=>'Bad Request', 'id'=>'id is a mandatory field'], REST_Controller::HTTP_BAD_REQUEST);
    }

    # Send request to model - returns an boolean (true/false)
    $result = $this->EventsModel->delete($id);

    # Set error message if found
    if(!$result) {
      # NOT_FOUND (404) being the HTTP response code
      return $this->set_response(['status' => FALSE, 'code' => '0', 'message' => 'Failed To Delete Record'], REST_Controller::HTTP_NOT_FOUND);
    }

    # NO_CONTENT (204) being the HTTP response code
    $this->set_response(['status' => 'success', 'code' => '1', 'id' => $id, 'message' => 'Deleted the resource'], REST_Controller::HTTP_NO_CONTENT);
  }

}

