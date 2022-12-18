<?php
if(! defined('BASEPATH')) exit ('No direct script access allowed');

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require './src/Exception.php';
// require './src/OAuth.php';
// require './src/PHPMailer.php';
// require './src/POP3.php';
// require './src/SMTP.php';
// require './vendor/autoload.php';

class UsersModel extends CI_Model {

  public function __construct(){
      parent::__construct();
      $this->table = 'users';
      $this->table1 = 'jwt_tokens';
      $this->load->model('LibraryModel');
  }

#
########################################################################################################
#
  
  /**
   * Method Name : register
   * Description : register a new record
   * 
   * @param  array $input post body
   * 
   * @return  string  Authorization_Token
   */
  public function register(array $input) 
  {
    # Mobile - unique check
    $mobile = $this->db->select('*')->from($this->table)->where('user_mobile', $input['user_mobile'])->get()->row_array();
    if(!empty($mobile)) {
      $result['message'] = "Mobile Number Already Exist";
      return $result;
    }

    # Create Image
    if(!empty($input['user_profile_pic'])) {
      # Create Image
      $profileUrl = $this->LibraryModel->uploadUserProfile($input['user_name'],$input['user_profile_pic']);
    } else {
      $profileUrl = "";
    }

    # Create array
    $data=array(
      'user_name'=>$input['user_name'],
      'user_email'=>$input['user_email'],
      'user_mobile'=>$input['user_mobile'],
      'pw_hash'=>password_hash( $input['user_password'], PASSWORD_BCRYPT),
      'pw_algo'=>'PASSWORD_BCRYPT',
      'user_gender'=>$input['user_gender'],
      'user_status'=>$input['user_status'] ?? 0,
      'user_profile_pic'=>$profileUrl,
      'created_on'=>date('Y-m-d H:i:s'),
      'modified_on'=>date('Y-m-d H:i:s')
    );

    # Initialize array
    $result = [];

    # Insert data
    $insert = $this->db->insert($this->table,$data);
    if($insert) {

      # Inserted Id
      $id = $this->db->insert_id();

      # Create a JWT token
      $token = $this->LibraryModel->createToken($id);
      if(!empty($token)) {
        $result['authorization_token'] = $token['jwt_token'];
      }
      
    } else {
      $result['message'] = 'Failed To Register User';
    }
    
    return $result;
  }

#
########################################################################################################
#

  /**
   * Method Name : login
   * Description : Login With Mobile
   * 
   * @param  array $input post body
   * 
   * @return  string  Authorization_Token
   */
  public function login(array $input) 
  {
    # Get data based on user_mobile
    $mobile = $this->db->select('*')->from($this->table)->where('user_mobile', $input['user_mobile'])->get()->row_array();
    if(empty($mobile)) {
      $result['message'] = "mobile number Does Not Exist";
      return $result;
    }

    $verify = password_verify($input['user_password'], $mobile['pw_hash']);
    if ($verify) {

      # Create a JWT token
      $token = $this->LibraryModel->createToken($mobile['id'], $input['fcm_token']);
      if(!empty($token)) {
        $result['authorization_token'] = $token['jwt_token'];
      }
      
    } else {
      $result['message'] = 'Invalid password';
    }

    return $result;
  }

#
########################################################################################################
#

  /**
   * Method Name : changePassword
   * Description : Change Password
   * 
   * @param   array   $input post body
   * 
   * @return  string  jwt_token
   */
  public function changePassword(array $input, string $jwt_token) 
  {
    # Initialize array
    $result = [];

    # Get jwt token data
    $jwtToken = $this->db->select('*')->from($this->table1)->where('jwt_token', $jwt_token)->get()->row_array() ?? [];
    
    # Get Auth User Data
    $user = $this->db->select('pw_hash')->from($this->table)->where('id', $jwtToken['user_id'])->get()->row_array() ?? [];
    
    # Check whether new password & repeat password is same
    if($input['new_password'] != $input['repeat_password']) {
      # Error Message
      $result['message'] = 'Password Does Not Match!';
      return $result;
    }

    # Verify Old Password
    $verify = password_verify( $input['old_password'], $user['pw_hash']);
    if(!$verify) {
      # Error Message
      $result['message'] = 'Invalid Password!';
      return $result;
    }

    # Delete all jwt tokens of current users
    $deleteTokens = $this->db->delete($this->table1, ['user_id' => $jwtToken['user_id'] ]);
    
    # If password verifies - update password & generate new token
    if ($verify) {

			# Force some Body parameters
			$pw_hash = password_hash( $input['new_password'], PASSWORD_BCRYPT);

			# Create array
			$data=array(
				'pw_hash'=>$pw_hash
			);

			# Update password
			$update = $this->db->where('id',$jwtToken['user_id'])->update($this->table,$data);

			if($update) {

				# Create a JWT token
        $token = $this->LibraryModel->createToken($jwtToken['user_id']);
        if(!empty($token)) {
          $result['authorization_token'] = $token['jwt_token'];
          return $result;
        }

			} else {
				# Error Message
        $result['message'] = 'Failed To Change Password';
        return $result;
			}
		}
    
    return $result;
	}

#
########################################################################################################
#

  /**
   * Method Name : sendForgotPasswordLink
   * Description : Send Forgot Password Link
   * 
   * @param  array $input post body
   * 
   * @return  string  Authorization_Token
   */
  public function sendForgotPasswordLink(array $input) 
  {
    # Initialize array
    $result = [];

    # Get Auth User Data
    $user = $this->db->select('user_mobile, user_email, user_name')->from($this->table)->where('user_mobile', $input['user_mobile'])->get()->row_array() ?? [];
    if(empty($user)) {
      $result['message'] = "Mobile Number Does Not Exist";
      return $result;
    }

    // # Passing `true` enables exceptions
    // $mail = new PHPMailer(true);
    try {
    //     # Server settings
    //     $mail->isSMTP();
    //     # Enable verbose debug output
    //     $mail->SMTPDebug = 0;
    //     # secure transfer enabled REQUIRED for Gmail
    //     $mail->Host = 'smtp.gmail.com';
    //     # Enable SMTP authentication
    //     $mail->SMTPAuth = true;  
    //     # SMTP username
    //     $mail->Username = 'en.pavankumar@gmail.com';
    //     # SMTP Password
    //     $mail->Password = '9866827281';
    //     # Enable TLS encryption, `ssl` also accepted
    //     $mail->SMTPSecure = 'tls';
    //     # TCP port to connect to
    //     $mail->Port = 587;
        
    //     $mail->SMTPOptions = array(
    //       'ssl' => array(
    //       'verify_peer' => false,
    //       'verify_peer_name' => false,
    //       'allow_self_signed' => true
    //       )
    //     );
        
    //     # From Address
    //     $fromAddress = "en.pavankumar@gmail.com";
    //     # From User Name
    //     $fromUserName = "EVENTICA";
            
    //     # To Address
    //     $toAddress = $user['user_email'];
    //     $toUserName = $data['user_name'];
                            
    //     $mail->setFrom($fromAddress, $fromUserName);
    //     $mail->addAddress($toAddress, $toUserName);
        
    //     $mail->Subject = "EVENTICA - Change Password Link";
    //     $mail->Body    = "Change Password Here :".$input['url'];
    //     # Set email format to HTML
    //     $mail->isHTML(true);
    //     # Send Mail
    //     $mail->send();    

      $this->load->library('email');

      $this->email->from('en.pavankumar@gmail.com', 'EVENTICA');
      $this->email->to($user['user_email']);
      $this->email->subject('EVENTICA - Change Password Link');
      $this->email->message("Hi ".$user['user_name']."! Change Password Here :".$input['url']);
      $this->email->send();

      # Return message
      $result['message'] = "Link sent to your mailId to change your password!";

      return $result;

    } catch (Exception $e) {
      # Error message
      $result['message'] = $mail->ErrorInfo;
      return $result;        
    }   

  }

#
########################################################################################################
#

  /**
   * Method Name : forgotPassword
   * Description : Forgot Password
   * 
   * @param   array   $input post body
   * 
   * @return  string  jwt_token
   */
  public function forgotPassword(array $input, string $jwt_token) 
  {
    # Initialize array
    $result = [];

    # Get jwt token data
    $jwtToken = $this->db->select('*')->from($this->table1)->where('jwt_token', $jwt_token)->get()->row_array() ?? [];
    
    # Get Auth User Data
    $user = $this->db->select('pw_hash')->from($this->table)->where('id', $jwtToken['user_id'])->get()->row_array() ?? [];
    
    # Check whether new password & repeat password is same
    if($input['new_password'] != $input['repeat_password']) {
      # Error Message
      $result['message'] = 'Password Does Not Match!';
      return $result;
    }

    # Delete all jwt tokens of current users
    $deleteTokens = $this->db->delete($this->table1, ['user_id' => $jwtToken['user_id'] ]);    

    # Force some Body parameters
    $pw_hash = password_hash( $input['new_password'], PASSWORD_BCRYPT);

    # Create array
    $data=array(
      'pw_hash'=>$pw_hash
    );

    # Update password
    $update = $this->db->where('id',$jwtToken['user_id'])->update($this->table,$data);

    if($update) {

      # Create a JWT token
      $token = $this->LibraryModel->createToken($jwtToken['user_id']);
      if(!empty($token)) {
        $result['authorization_token'] = $token['jwt_token'];
        return $result;
      }

    } else {
      # Error Message
      $result['message'] = 'Failed To Change Password';
      return $result;
    }
    
    return $result;
	}

#
########################################################################################################
#

  /**
   * Method Name : logout
   * Description : Logout
   * 
   * @return  boolean  TRUE / FALSE
   */
  public function logout(string $jwt_token) 
  {
    # Initialize array
    $result = [];

    # Get jwt token data
    $jwtToken = $this->db->select('*')->from($this->table1)->where('jwt_token', $jwt_token)->get()->row_array() ?? [];
    
    if(!empty($jwtToken)) {
      # Delete current jwtToken
      $deleteToken = $this->db->delete($this->table1, ['jwt_token' => $jwt_token ]);
      		
      if(!$deleteToken) {
        return FALSE;
      }
    } else {
      return FALSE;
    }

    return TRUE;
  }
  
#
########################################################################################################
#

  /**
   * Method Name : update
   * Description : update a existing record
   * 
   * @param  int  $id       ID
   * 
   * @param  array   $input    post body
   * 
   * @return  array response
   */
  public function update(array $input, string $jwt_token)
  {
    # Initialize array
    $result = [];

    # Get jwt token data
    $jwtToken = $this->db->select('*')->from($this->table1)->where('jwt_token', $jwt_token)->get()->row_array() ?? [];
    
    # Get Auth User Data
    $user = $this->db->select('*')->from($this->table)->where('id', $jwtToken['user_id'])->get()->row_array() ?? [];
    
    # Error check if no record found with given ID
    if(empty($user)) {
      $data['message']='No Record Found With This ID';
    }

    # Create Image
    if(!empty($input['user_profile_pic'])) {
      # Create Image
      $profileUrl = $this->LibraryModel->uploadUserProfile($input['user_name'],$input['user_profile_pic']);
    } else {
      $profileUrl = "";
    }

    # Create array
    $data=array(
      'user_name'=>$input['user_name'],
      'user_gender'=>$input['user_gender'],
      'user_status'=>$input['user_status'] ?? 0,
      'user_profile_pic'=>$profileUrl
    );

    # Update data
    $update = $this->db->where('id',$jwtToken['user_id'])->update($this->table,$data);
  
    # Error check if failed to update
    if(!$update) {
      $result['message']='Failed To Update Record';
    }

    # Get updated Data
    $result = $this->LibraryModel->getAuthUser($jwt_token);

    return $result;
  }

#
########################################################################################################
#

  /**
   * Method Name : delete
   * Description : delete a record
   * 
   * @param  string   $jwt_token
   * 
   * @return  boolean True / False
   */
  public function delete(string $jwt_token)
  {
    # Get jwt token data
    $jwtToken = $this->db->select('*')->from($this->table1)->where('jwt_token', $jwt_token)->get()->row_array() ?? [];
    
    # Get Auth User Data
    $user = $this->db->select('*')->from($this->table)->where('id', $jwtToken['user_id'])->get()->row_array() ?? [];
    if(!empty($user)) {
      # Delete all user tokens
      $deleteTokens = $this->db->delete($this->table1, ['user_id' => $jwtToken['user_id'] ]);

      # Delete User
      $delete = $this->db->delete($this->table, ['id' => $jwtToken['user_id']]);
    }
    
    # Error check if failed to delete
    if( (!$delete) || (!$deleteTokens) ) {
      $result = FALSE;
    } else {
      $result = TRUE;
    }

    return $result;
  }

}
?>