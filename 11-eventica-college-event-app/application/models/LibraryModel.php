<?php
if(! defined('BASEPATH')) exit ('No direct script access allowed');

class LibraryModel extends CI_Model {

  public function __construct(){
    parent::__construct();
    $this->table  = 'users';
    $this->table2 = 'jwt_tokens';
  }

#
########################################################################################################
#

  /**
   * Method Name : createToken
   * Description : create a token to the user
   * 
   * @param   string    $id   of the user
   * 
   * @return  array     Response
   */
  public function createToken(string $id, string $fcm_token)
  {
    # Force some Body parameters
    $jwt_token = md5(uniqid(rand(), true)).md5(uniqid(rand(), true)).md5(uniqid(rand(), true));

    $startDate = time();
    $expiry_date = date('Y-m-d H:i:s', strtotime('+1 day', $startDate));

    # Create array
    $data=array(
      'user_id'=>$id,
      'jwt_token'=>$jwt_token,
      'fcm_token'=>$fcm_token,
      'expiry_date'=>$expiry_date,
      'created_dt'=>date('Y-m-d H:i:s')
    );

    # Initialize array
    $result = [];

    # Insert data
    $insert = $this->db->insert($this->table2,$data);
    if($insert) {
      $id = $this->db->insert_id();
      $result = $this->db->select('jwt_token')->from($this->table2)->where('id', $id)->get()->row_array();
    }

    return $result;
  }

#
########################################################################################################
#

  /**
   * Method Name : verifyToken
   * Description : Verify jwt-token & expiry date
   * 
   * @param   string  $jwt_token
   * 
   * @return  array   response
   */
  public function verifyToken(string $jwt_token) 
  {
    # Initialize array
    $result = [];

    # Get jwt token data
    $jwtToken = $this->db->select('*')->from($this->table2)->where('jwt_token', $jwt_token)->get()->row_array() ?? [];
    if(!empty($jwtToken)) {
      # If current date is less than expiry date - update expiry date
      if(date('Y-m-d H:i:s') < $jwtToken['expiry_date']) {
      
        $startDate = time();
        $expiry_date = date('Y-m-d H:i:s', strtotime('+1 day', $startDate));

        # Create array
        $data=array(
          'expiry_date'=>$expiry_date
        );

        # Update expiry data
        $update = $this->db->where('jwt_token',$jwt_token)->update($this->table2,$data);
        
        return [];
      } else {
        $result['message'] = "User Session Has Been Expired!";
        return $result;
      }
    } else {
      $result['message'] = "Failed To Authenticate User Session!";
      return $result;
    }
  }

#
########################################################################################################
#
  
  /**
   * Method Name : getAuthUser
   * Description : Verify jwt-token & get user data
   * 
   * @param   string  $key
   * 
   * @return  array   $user User-Data
   */
  public function getAuthUser(string $key) 
  {
    # Initialize array
    $user = [];

    # Get jwt token data
    $jwtToken = $this->db->select('*')->from($this->table2)->where('jwt_token', $key)->get()->row_array() ?? [];
    if(empty($jwtToken)) return $jwtToken;

    # Get Auth User Data
    $user = $this->db->select('user_name, user_email, user_mobile, user_gender, user_status, user_profile_pic, created_on')->from($this->table)->where('id', $jwtToken['user_id'])->get()->row_array() ?? [];
    if(empty($user)) return $user;

    return $user;
  }

  /**
   * Method Name : Upload Profile Image
   * Description : Move image to folder & return path
   * 
   * @param   string  $key
   * 
   * @return  array   $user User-Data
   */
  public function uploadUserProfile($imgName,$file) 
  {
    # Image
    $base64_string = $file;
    $img_url = $imgName;

    # storage path
    $path = "./uploads";
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    $url = "http://".$_SERVER['SERVER_NAME'].DIRECTORY_SEPARATOR.'eventica'.DIRECTORY_SEPARATOR.'mobile'.DIRECTORY_SEPARATOR;
    $path1 = "uploads";
    $filename = rand(1000,9999).'.jpg';
    $filepath = $path. DIRECTORY_SEPARATOR .$img_url.'_'.$filename;
    $final_path = $url.$path1. DIRECTORY_SEPARATOR .$img_url.'_'.$filename;

    # Check whether file exists
    if (file_exists($filepath)) {
      $rand_val = rand(1000,9999);
      $filename1 = $rand_val.'.jpg';
      $filepath = $path.DIRECTORY_SEPARATOR.$img_url.'_'.$filename1;
      $final_path = $url.$path1. DIRECTORY_SEPARATOR .$img_url.'_'.$filename1.'.jpg';
    }

    # open the output file for writing
    $ifp = fopen( $filepath, 'wb' ); 

    # split the string on commas
    $data = explode( ',', $base64_string );

    # we could add validation here with ensuring count( $data ) > 1
    $a = fwrite( $ifp, base64_decode( $data[ 0 ] ) );

    # clean up the file resource
    fclose( $ifp ); 
    return $final_path;
  }

}
?>
