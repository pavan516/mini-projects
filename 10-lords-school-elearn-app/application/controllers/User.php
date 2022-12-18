<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* ORG       : OM GROUP OF IT SOLUTIONS
* AUTHOR    : Pavan Kumar
* Email     : en.pavankumar@gmail.com
* Contact   : 8520872771
* Project   : ARCHIVE-ETECH
* P.FOUNDER : SUBHASH
*/
  
/**
 * User class / controller
 */
class User extends CI_Controller  
{
  # Constructor
  function __construct()
  {
    # Parent constructor
    parent:: __construct();

    # Models
    $this->load->model('AdminModel');
    $this->load->model('UserModel');
  
    # Helpers
    $this->load->helper('url');

    # Library
    $this->load->library('session');
  }
 
#################################################################################################################################
#################################################################################################################################
#######################################################   AUTH   ################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: index
   * 
   * This method by default loads the login view
   */
  public function index()
  {
    # redirect to dashboard if session exist
    if(!empty($this->session->userdata('mobile'))) {
      # return
      redirect('videos', 'refresh');
    }

    # load login page
    $this->load->view('login'); 
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: Login
   * 
   * This method will verify the login with
   * 1. mobile
   * 
   * @return  View  Admin Dashboard
   */
  public function Login()
  {
    # Parameters
    $mobile = $this->input->post('mobile');

    # return boolean (true/false)
    $login = $this->AdminModel->login($mobile);
    if(!$login) {
      $data['error'] = "Invalid Email/Password";
      $this->load->view('login', $data);
    } else {
      # return
      redirect('videos', 'refresh');
    }
  }
 
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: Logout
   * 
   * @return  View  Admin Login Page
   */
  public function Logout()
  {
    # make sure session exist
    if(!empty($this->session->userdata('mobile'))) {
      # unset session data
      $this->session->unset_userdata('id');
      $this->session->unset_userdata('uuid');
      $this->session->unset_userdata('name');
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('mobile');
      $this->session->unset_userdata('role');
      $this->session->unset_userdata('branch_id');
      $this->session->unset_userdata('class_id');
      $this->session->unset_userdata('section_id');
      $this->session->unset_userdata('image');
      $this->session->unset_userdata('created_dt');
      $this->session->unset_userdata('modified_dt');
    }
    
    # return
    redirect('', 'refresh');
  }
  
#################################################################################################################################
#################################################################################################################################
#######################################################   VIDEOS   ##############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Videos
   */
  public function Videos()
  {
    # send data to videos
    $data = [];
    $data['page'] = "videos";

    ##
    ## If user is a student
    ## Get todays date videos
    ##
    if($this->session->userdata('role')=="STUDENTS") {
      $params = [];
      $params['class_id'] = $this->session->userdata('class_id');
      $params['section_id'] = $this->session->userdata('section_id');
      $params['status'] = 1;
      $params['post_on'] = $this->input->get('post_on') ?? date('Y-m-d');
      $params['post_type'] = "YOUTUBE";
      $data['items'] = $this->UserModel->fetchVideos($params);
    }
    
    ##
    ## If user is a teacher
    ## Get todays date videos
    ##
    if($this->session->userdata('role')=="TEACHERS") {
      # init var
      $videos = [];

      # get teacher mappings
      $getTeacherMappings = $this->AdminModel->fetchTeacherMappings(['teacher_id'=>$this->session->userdata('id')]);
      if(!empty($getTeacherMappings)) {
        foreach($getTeacherMappings as $getTeacherMapping) {
          $params = [];
          $params['class_id'] = $getTeacherMapping['class_id'];
          $params['section_id'] = $getTeacherMapping['section_id'];
          $params['subject_id'] = $getTeacherMapping['subject_id'];
          $params['status'] = 1;
          $params['post_on'] = $this->input->get('post_on') ?? date('Y-m-d');
          $params['post_type'] = "YOUTUBE";
          $getVideos = $this->UserModel->fetchVideos($params);
          foreach($getVideos as $getVideo) {
            if(!array_key_exists($getVideo['id'],$videos)) {
              $data['items'][] = $getVideo;
              $videos[$getVideo['id']] = $getVideo;
            }
          }
        }
        unset($videos);
      }
    }

    ##
    ## If user is a admin / super admin
    ## show all todays data
    ##
    if($this->session->userdata('role')=="ADMIN" || $this->session->userdata('role')=="SUPER_ADMIN") {
      # init var
      $videos = [];
      $params = [];

      # build params
      $params['post_on'] = $this->input->get('post_on') ?? date('Y-m-d');
      $params['status'] = 1;
      $params['post_type'] = "YOUTUBE";
      $data['items'] = $this->UserModel->fetchVideos($params);
    }
    
    # load videos page based on user login
    $this->load->view('videos', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: Video
   */
  public function Video($uuid)
  {
    # send data to videos
    $data = [];
    $data['page'] = "videos";
    $data['item'] = $this->UserModel->fetchVideos(['uuid'=>$uuid])[0];
    $this->load->view('video', $data);
  }
  
#################################################################################################################################
#################################################################################################################################
#######################################################   NOTES   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Notes
   */
  public function Notes()
  {
    # send data to notes
    $data = [];
    $data['page'] = "notes";

    ##
    ## If user is a student
    ## Get todays date notes
    ##
    if($this->session->userdata('role')=="STUDENTS") {
      $params = [];
      $params['class_id'] = $this->session->userdata('class_id');
      $params['section_id'] = $this->session->userdata('section_id');
      $params['status'] = 1;
      $params['post_on'] = $this->input->get('post_on') ?? date('Y-m-d');
      $params['post_type'] = "NOTES";
      $data['items'] = $this->UserModel->fetchVideos($params);
    }
    
    ##
    ## If user is a teacher
    ## Get todays date notes
    ##
    if($this->session->userdata('role')=="TEACHERS") {
      # init var
      $notes = [];

      # get teacher mappings
      $getTeacherMappings = $this->AdminModel->fetchTeacherMappings(['teacher_id'=>$this->session->userdata('id')]);
      if(!empty($getTeacherMappings)) {
        foreach($getTeacherMappings as $getTeacherMapping) {
          $params = [];
          $params['class_id'] = $getTeacherMapping['class_id'];
          $params['section_id'] = $getTeacherMapping['section_id'];
          $params['subject_id'] = $getTeacherMapping['subject_id'];
          $params['status'] = 1;
          $params['post_on'] = $this->input->get('post_on') ?? date('Y-m-d');
          $params['post_type'] = "NOTES";
          $getNotes = $this->UserModel->fetchVideos($params);
          foreach($getNotes as $getNote) {
            if(!array_key_exists($getNote['id'],$notes)) {
              $data['items'][] = $getNote;
              $notes[$getNote['id']] = $getNote;
            }
          }
        }
        unset($notes);
      }
    }

    ##
    ## If user is a admin / super admin
    ## show all todays data
    ##
    if($this->session->userdata('role')=="ADMIN" || $this->session->userdata('role')=="SUPER_ADMIN") {
      # init var
      $params = [];

      # build params
      $params['post_on'] = $this->input->get('post_on') ?? date('Y-m-d');
      $params['status'] = 1;
      $params['post_type'] = "NOTES";
      $data['items'] = $this->UserModel->fetchVideos($params);
    }
    
    # load notes page based on user login
    $this->load->view('notes', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: Note
   */
  public function Note($uuid)
  {
    # send data to note
    $data = [];
    $data['page'] = "notes";
    $data['item'] = $this->UserModel->fetchVideos(['uuid'=>$uuid])[0];
    $this->load->view('note', $data);
  }
  
#################################################################################################################################
#################################################################################################################################
####################################################  NOTIFICATIONS   ###########################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Notifications
   */
  public function Notifications()
  {
    # send data to notifications
    $data = [];
    $data['page'] = "notifications";

    ##
    ## If user is a student
    ## Get todays date notifications
    ##
    if($this->session->userdata('role')=="STUDENTS") {
      $params = [];
      $params['class_id'] = $this->session->userdata('class_id');
      $params['section_id'] = $this->session->userdata('section_id');
      $params['status'] = 1;
      $params['post_on'] = $this->input->get('post_on') ?? date('Y-m-d');
      $params['post_type'] = "NOTIFICATIONS";
      $data['items'] = $this->UserModel->fetchVideos($params);
    }
    
    ##
    ## If user is a teacher
    ## Get todays date notifications
    ##
    if($this->session->userdata('role')=="TEACHERS") {
      # init var
      $notifications = [];

      # get teacher mappings
      $getTeacherMappings = $this->AdminModel->fetchTeacherMappings(['teacher_id'=>$this->session->userdata('id')]);
      if(!empty($getTeacherMappings)) {
        foreach($getTeacherMappings as $getTeacherMapping) {
          $params = [];
          $params['class_id'] = $getTeacherMapping['class_id'];
          $params['section_id'] = $getTeacherMapping['section_id'];
          $params['subject_id'] = $getTeacherMapping['subject_id'];
          $params['status'] = 1;
          $params['post_on'] = $this->input->get('post_on') ?? date('Y-m-d');
          $params['post_type'] = "NOTIFICATIONS";
          $getNotifications = $this->UserModel->fetchVideos($params);
          foreach($getNotifications as $getNotification) {
            if(!array_key_exists($getNotification['id'],$notifications)) {
              $data['items'][] = $getNotification;
              $notifications[$getNotification['id']] = $getNotification;
            }
          }
        }
        unset($notifications);
      }
    }

    ##
    ## If user is a admin / super admin
    ## show all todays data
    ##
    if($this->session->userdata('role')=="ADMIN" || $this->session->userdata('role')=="SUPER_ADMIN") {
      # init var
      $params = [];

      # build params
      $params['post_on'] = $this->input->get('post_on') ?? date('Y-m-d');
      $params['status'] = 1;
      $params['post_type'] = "NOTIFICATIONS";
      $data['items'] = $this->UserModel->fetchVideos($params);
    }
    
    # load notifications page based on user login
    $this->load->view('notifications', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: Notification
   */
  public function Notification($uuid)
  {
    # send data to notification
    $data = [];
    $data['page'] = "notifications";
    $data['item'] = $this->UserModel->fetchVideos(['uuid'=>$uuid])[0];
    $this->load->view('notification', $data);
  }
  
#################################################################################################################################
#################################################################################################################################
####################################################  HOMEWORKS   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Homeworks
   */
  public function Homeworks()
  {
    # send data to homeworks
    $data = [];
    $data['page'] = "homeworks";

    ##
    ## If user is a student
    ## Get todays date homeworks
    ##
    if($this->session->userdata('role')=="STUDENTS") {
      $params = [];
      $params['class_id'] = $this->session->userdata('class_id');
      $params['section_id'] = $this->session->userdata('section_id');
      $params['status'] = 1;
      $params['homework_on'] = $this->input->get('homework_on') ?? date('Y-m-d');
      $data['items'] = $this->UserModel->fetchHomeworks($params);
    }
    
    ##
    ## If user is a teacher
    ## Get todays date homeworks
    ##
    if($this->session->userdata('role')=="TEACHERS") {
      # init var
      $homeworks = [];

      # get teacher mappings
      $getTeacherMappings = $this->AdminModel->fetchTeacherMappings(['teacher_id'=>$this->session->userdata('id')]);
      if(!empty($getTeacherMappings)) {
        foreach($getTeacherMappings as $getTeacherMapping) {
          $params = [];
          $params['class_id'] = $getTeacherMapping['class_id'];
          $params['section_id'] = $getTeacherMapping['section_id'];
          $params['subject_id'] = $getTeacherMapping['subject_id'];
          $params['status'] = 1;
          $params['homework_on'] = $this->input->get('homework_on') ?? date('Y-m-d');
          $getHomeworks = $this->UserModel->fetchHomeworks($params);
          foreach($getHomeworks as $getHomework) {
            if(!array_key_exists($getHomework['id'],$homeworks)) {
              $data['items'][] = $getHomework;
              $homeworks[$getHomework['id']] = $getHomework;
            }
          }
        }
        unset($homeworks);
      }
    }

    ##
    ## If user is a admin / super admin
    ## show all todays data
    ##
    if($this->session->userdata('role')=="ADMIN" || $this->session->userdata('role')=="SUPER_ADMIN") {
      # init var
      $params = [];

      # build params
      $params['homework_on'] = $this->input->get('homework_on') ?? date('Y-m-d');
      $params['status'] = 1;
      $data['items'] = $this->UserModel->fetchHomeworks($params);
    }
    
    # load homeworks page based on user login
    $this->load->view('homeworks', $data);
  }

#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: Homework
   */
  public function Homework($uuid)
  {
    # send data to homework
    $data = [];
    $data['page'] = "homeworks";

    ##
    ## Page for student
    ##
    if($this->session->userdata('role')=="STUDENTS") {
      $data['item'] = $this->UserModel->fetchHomeworks(['uuid'=>$uuid])[0];
      $data['studenthomeworks'] = $this->UserModel->fetchStudentHomeworks(['student_id'=>$this->session->userdata('id'),'homework_id'=>$data['item']['id']]);
      $this->load->view('studenthomework', $data);
    }

    ##
    ## Page for teacher
    ##
    if($this->session->userdata('role')=="TEACHERS") {
      $data['item'] = $this->UserModel->fetchHomeworks(['uuid'=>$uuid])[0];
      $data['teacherhomeworks'] = $this->UserModel->fetchTeacherHomeworks(['teacher_id'=>$this->session->userdata('id'),'homework_id'=>$data['item']['id']]);
      $this->load->view('teacherhomework', $data);
    }
    
    ##
    ## Page for admin | super admin
    ##
    if($this->session->userdata('role')=="ADMIN" || $this->session->userdata('role')=="SUPER_ADMIN" ) {
      $data['item'] = $this->UserModel->fetchHomeworks(['uuid'=>$uuid])[0];
      $data['teacherhomeworks'] = $this->UserModel->fetchAdminHomeworks(['homework_id'=>$data['item']['id']]);
      $this->load->view('teacherhomework', $data);
    }
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: SubmitHomework
   */
  public function SubmitHomework()
  {
    # By default image path
    $imagePath = "";

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      # upload image
      $filename = "uploads/homeworks/students/images/homework_".rand(1,1000000000);
      $uploadImage = $this->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to users page
        redirect('admin/users', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }
    
    # parameters
    $body = [];
    $body['student_id'] = $this->input->post("student_id");
    $body['homework_id'] = $this->input->post("homework_id");
    $body['comment'] = trim($this->input->post("comment") ?? "");
    $body['image'] = $imagePath;
    $body['submit_date'] = date('Y-m-d');

    # insert 
    $submitHomework = $this->UserModel->submitHomework($body);
    if(isset($submitHomework['success'])) {
      $this->session->set_flashdata('success', $submitHomework['success']);  
    } else if(isset($submitHomework['error'])) {
      $this->session->set_flashdata('error', $submitHomework['error']);
    }

    # redirect to homeworks page
    redirect('homework/'.$this->input->post("uuid"), 'refresh');
  }
  


#################################################################################################################################
#################################################################################################################################
################################################   CUSTOM METHODS   #############################################################
#################################################################################################################################
#################################################################################################################################

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
  
}?>