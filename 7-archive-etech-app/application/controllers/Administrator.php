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
 * Administrator class / controller
 */
class Administrator extends CI_Controller  
{
  # Constructor
  function __construct()
  {
    # Parent constructor
    parent:: __construct();

    # Models
    $this->load->model('AdminModel');
  
    # Helpers
    $this->load->helper('url');

    # Library
    $this->load->library('session');

    # Configurations
    set_time_limit(0);
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
    if(!empty($this->session->userdata('email'))) {
      # return
      redirect('admin/dashboard', 'refresh');
    }

    # load login page
    $this->load->view('admin/login'); 
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: Login
   * 
   * This method will verify the login with
   * 1. email
   * 2. password
   * 
   * @return  View  Admin Dashboard
   */
  public function Login()
  {
    # Parameters
    $email = $this->input->post('email');
    $pass  = $this->input->post('password');

    # return boolean (true/false)
    $login = $this->AdminModel->login($email, $pass);
    if(!$login) {
      $data['error'] = "Invalid Email/Password";
      $this->load->view('admin/login', $data);
    } else {
      # return
      redirect('admin/dashboard', 'refresh');
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
    if(!empty($this->session->userdata('email'))) {
      # unset session email
      $this->session->unset_userdata('email');
    }
    
    # return
    redirect('admin', 'refresh');
  }
  
#################################################################################################################################
#################################################################################################################################
#####################################################   DASHBOARD   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Dashboard
   * 
   * @return  View  Admin Dashboard
   */
  public function Dashboard()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body to send to dashboard
    $data = [];
    $data['page'] = "dashboard";
    $data['subscribers'] = $this->AdminModel->fetchSubscribers();
    $data['item'] = $this->AdminModel->fetchStatistics();
    $this->load->view('admin/dashboard', $data); 
  }
   
#################################################################################################################################
#################################################################################################################################
#####################################################   CATEGORIES   ############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Categories
   * 
   * @return  View  Admin Categories
   */
  public function Categories()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body to send to add categories page
    $data = [];
    $data['page'] = "categories";
    $data['items'] = $this->AdminModel->fetchCategories();
    $this->load->view('admin/categories', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertCategory
   * 
   * @return  View  Admin Categories
   */
  public function InsertCategory()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # Build data to insert
    $body = [];
    $body['category_name'] = $this->input->post('category_name') ?? "";
    $body['category_code']  = $this->input->post('category_code') ?? "";

    # if category_code is empty replace spaces with _
    if(empty($body['category_code'])) {
      $body['category_code'] = strtoupper(str_replace(" ", "_", $body['category_name']));
    } else {
      $body['category_code'] = strtoupper(str_replace(" ", "_", $body['category_code']));
    }

    # insert cateory
    $insertCategory = $this->AdminModel->insertCategory($body);
    if(isset($insertCategory['success'])) {
      $this->session->set_flashdata('success', $insertCategory['success']);
    } else if(isset($insertCategory['error'])) {
      $this->session->set_flashdata('error', $insertCategory['error']);
    }

    # redirect to add category page
    redirect('admin/categories', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteCategory
   * 
   * @return  View  Admin Categories
   */
  public function DeleteCategory()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # Delete category
    $deleteCategory = $this->AdminModel->deleteCategory($this->input->post('category_id') ?? "");
    if(!$deleteCategory) {
      $this->session->set_flashdata('error', "Failed To Delete Category!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Category!");
    }

    # redirect to add category page
    redirect('admin/categories', 'refresh');
  }
   
#################################################################################################################################
#################################################################################################################################
######################################################   BRANCHES   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Branches
   * 
   * @return  View  Admin Branches
   */
  public function Branches()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body to send to add categories page
    $data = [];
    $data['page'] = "branches";
    $data['items'] = $this->AdminModel->fetchBranches();
    $this->load->view('admin/branches', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertBranch
   * 
   * @return  View  Admin Branches
   */
  public function InsertBranch()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # Build data to insert
    $body = [];
    $body['branch_name'] = $this->input->post('branch_name') ?? "";
    $body['branch_code']  = $this->input->post('branch_code') ?? "";

    # if branch_code is empty replace spaces with _
    if(empty($body['branch_code'])) {
      $body['branch_code'] = strtoupper(str_replace(" ", "_", $body['branch_name']));
    } else {
      $body['branch_code'] = strtoupper(str_replace(" ", "_", $body['branch_code']));
    }

    # insert branch
    $insertBranch = $this->AdminModel->insertBranch($body);
    if(isset($insertBranch['success'])) {
      $this->session->set_flashdata('success', $insertBranch['success']);
    } else if(isset($insertBranch['error'])) {
      $this->session->set_flashdata('error', $insertBranch['error']);
    }

    # redirect to add branch page
    redirect('admin/branches', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteBranch
   * 
   * @return  View  Admin Branches
   */
  public function DeleteBranch()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # Delete Branch
    $deleteBranch = $this->AdminModel->deleteBranch($this->input->post('branch_id') ?? "");
    if(!$deleteBranch) {
      $this->session->set_flashdata('error', "Failed To Delete Branch!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Branch!");
    }

    # redirect to add branch page
    redirect('admin/branches', 'refresh');
  }
   
#################################################################################################################################
#################################################################################################################################
######################################################   MATERIALS   ############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Materials
   * 
   * @return  View  Admin Materials
   */
  public function Materials()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body to send to add materials page
    $data = [];
    $data['page'] = "materials";
    $data['items'] = $this->AdminModel->fetchMaterials();
    $this->load->view('admin/materials', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertMaterial
   * 
   * @return  View  Admin Material
   */
  public function InsertMaterial()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # Build data to insert
    $body = [];
    $body['material_name'] = $this->input->post('material_name') ?? "";
    $body['material_code']  = $this->input->post('material_code') ?? "";

    # if material_code is empty replace spaces with _
    if(empty($body['material_code'])) {
      $body['material_code'] = strtoupper(str_replace(" ", "_", $body['material_name']));
    } else {
      $body['material_code'] = strtoupper(str_replace(" ", "_", $body['material_code']));
    }

    # insert material
    $insertMaterial = $this->AdminModel->insertMaterial($body);
    if(isset($insertMaterial['success'])) {
      $this->session->set_flashdata('success', $insertMaterial['success']);
    } else if(isset($insertMaterial['error'])) {
      $this->session->set_flashdata('error', $insertMaterial['error']);
    }

    # redirect to add material page
    redirect('admin/materials', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteMaterial
   * 
   * @return  View  Admin Materiales
   */
  public function DeleteMaterial()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # Delete Material
    $deleteMaterial = $this->AdminModel->deleteMaterial($this->input->post('material_id') ?? "");
    if(!$deleteMaterial) {
      $this->session->set_flashdata('error', "Failed To Delete Material!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Material!");
    }

    # redirect to add material page
    redirect('admin/materials', 'refresh');
  }
   
#################################################################################################################################
#################################################################################################################################
######################################################   SUBJECTS   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Subjects
   * 
   * @return  View  Admin Subjects
   */
  public function Subjects()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body to send to add categories page
    $data = [];
    $data['page'] = "subjects";
    $data['branchItems'] = $this->AdminModel->fetchBranches();
    $data['materialItems'] = $this->AdminModel->fetchMaterials();
    $data['items'] = $this->AdminModel->fetchSubjects();
    $this->load->view('admin/subjects', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertSubject
   * 
   * @return  View  Admin Subjects
   */
  public function InsertSubject()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # get branch if branch exist
    if(!empty($this->input->post('branch_id') ?? "")) {
      # get branch
      $getBranch = $this->AdminModel->fetchBranches(['id'=>$this->input->post('branch_id')]);
      if(!empty($getBranch)) $branchCode = $getBranch[0]['branch_code'];
    }

    # get material if material exist
    if(!empty($this->input->post('material_id') ?? "")) {
      # get material
      $getMaterial = $this->AdminModel->fetchMaterials(['id'=>$this->input->post('material_id')]);
      if(!empty($getMaterial)) $materialCode = $getMaterial[0]['material_code'];
    }

    # Build data to insert
    $body = [];
    $body['branch_id'] = $this->input->post('branch_id') ?? "";
    $body['material_id'] = $this->input->post('material_id') ?? "";
    $body['branch_code'] = $branchCode ?? "";
    $body['material_code'] = $materialCode ?? "";
    $body['subject_name'] = $this->input->post('subject_name') ?? "";
    $body['subject_code']  = $this->input->post('subject_code') ?? "";

    # if subject_code is empty replace spaces with _
    if(empty($body['subject_code'])) {
      $body['subject_code'] = strtoupper(str_replace(" ", "_", $body['subject_name']));
    } else {
      $body['subject_code'] = strtoupper(str_replace(" ", "_", $body['subject_code']));
    }

    # insert subject
    $insertSubject = $this->AdminModel->insertSubject($body);
    if(isset($insertSubject['success'])) {
      $this->session->set_flashdata('success', $insertSubject['success']);
    } else if(isset($insertSubject['error'])) {
      $this->session->set_flashdata('error', $insertSubject['error']);
    }

    # redirect to subjects page
    redirect('admin/subjects', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteSubject
   * 
   * @return  View  Admin Subjects
   */
  public function DeleteSubject()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # Delete Subject
    $deleteSubject = $this->AdminModel->deleteSubject($this->input->post('subject_id') ?? "");
    if(!$deleteSubject) {
      $this->session->set_flashdata('error', "Failed To Delete Subject!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Subject!");
    }

    # redirect to subjects page
    redirect('admin/subjects', 'refresh');
  }
   
#################################################################################################################################
#################################################################################################################################
####################################################   INSTRUCTIONS   ###########################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Instructions
   * 
   * @return  View  Admin Instructions
   */
  public function Instructions()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body to send to add categories page
    $data = [];
    $data['page'] = "instructions";
    $this->load->view('admin/instructions', $data);
  }
   
#################################################################################################################################
#################################################################################################################################
######################################################   ARTICLES   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Articles
   * 
   * @return  View  Admin Articles
   */
  public function Articles()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body to send to add categories page
    $data = [];
    $data['page'] = "articles";
    $data['branchItems'] = $this->AdminModel->fetchBranches();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['items'] = $this->AdminModel->fetchArticles();
    $this->load->view('admin/articles', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertArticle
   * 
   * @return  View  Admin Articles
   */
  public function InsertArticle()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # By default image path
    $imagePath = "";

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      # upload image
      $uploadImage = $this->uploadImage();
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to articles page
        redirect('admin/articles', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # parameters
    $body = [];
    $body['branch_id'] = $this->input->post("branch_id") ?? 0;
    $body['subject_id'] = $this->input->post("subject_id") ?? 0;
    $body['title'] = trim($this->input->post("title") ?? "");
    $body['short_description'] = trim($this->input->post("short_description") ?? "");
    $body['description'] = trim($this->input->post("description") ?? "");
    $body['image'] = $imagePath;
    $body['status'] = $this->input->post("status") ?? 0;

    # insert article
    $insertArticle = $this->AdminModel->insertArticle($body);
    if(isset($insertArticle['success'])) {
      $this->session->set_flashdata('success', $insertArticle['success']);
    } else if(isset($insertArticle['error'])) {
      $this->session->set_flashdata('error', $insertArticle['error']);
    }

    # redirect to articles page
    redirect('admin/articles', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: EditArticle
   * 
   * @return  View  Admin Edit Article
   */
  public function EditArticle($id)
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body to send to add categories page
    $data = [];
    $data['page'] = "articles";
    $data['branchItems'] = $this->AdminModel->fetchBranches();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['item'] = $this->AdminModel->fetchArticles(['id'=>$id])[0];
    $this->load->view('admin/editarticle', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: UpdateArticle
   * 
   * @return  View  Admin Articles
   */
  public function UpdateArticle($id)
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # get article
    $getArticle = $this->AdminModel->fetchArticles(['id'=>$id])[0];

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      if(!empty($getArticle['image'])) {
        # get filename
        $filename = basename($getArticle['image']);
        # remove old path
        unlink("uploads/articles/images/".$filename);
      }

      # upload image
      $uploadImage = $this->uploadImage();
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to articles page
        redirect('admin/articles', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # parameters
    $body = [];
    $body['branch_id'] = $this->input->post("branch_id");
    $body['subject_id'] = $this->input->post("subject_id");
    $body['title'] = trim($this->input->post("title") ?? "");
    $body['short_description'] = trim($this->input->post("short_description") ?? "");
    $body['description'] = trim($this->input->post("description") ?? "");
    if(!empty($_FILES["image"]["name"])) $body['image'] = $imagePath;
    $body['status'] = $this->input->post("status") ?? 0;

    # insert article
    $updateArticle = $this->AdminModel->updateArticle($id,$body);
    if(isset($updateArticle['success'])) {
      $this->session->set_flashdata('success', $updateArticle['success']);
    } else if(isset($updateArticle['error'])) {
      $this->session->set_flashdata('error', $updateArticle['error']);
    }

    # redirect to articles page
    redirect('admin/articles', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteArticle
   * 
   * @return  View  Admin Articles
   */
  public function DeleteArticle($id)
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # Delete Article
    $deleteArticle = $this->AdminModel->deleteArticle($id);
    if(!$deleteArticle) {
      $this->session->set_flashdata('error', "Failed To Delete Article!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Article!");
    }

    # redirect to Articles page
    redirect('admin/articles', 'refresh');
  }
   
#################################################################################################################################
#################################################################################################################################
###################################################  NOTIFICATIONS   ############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Notifications
   * 
   * @return  View  Admin Notifications
   */
  public function Notifications()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body send to notifications page
    $data = [];
    $data['page'] = "notifications";
    $data['categoryItems'] = $this->AdminModel->fetchCategories();
    $data['items'] = $this->AdminModel->fetchNotifications();
    $this->load->view('admin/notifications', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertNotification
   * 
   * @return  View  Admin Notifications
   */
  public function InsertNotification()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # parameters
    $body = [];
    $body['category_id'] = $this->input->post("category_id") ?? 0;
    $body['title'] = trim($this->input->post("title") ?? "");
    $body['description'] = trim($this->input->post("description") ?? "");
    $body['status'] = $this->input->post("status") ?? 0;

    # insert Notification
    $insertNotification = $this->AdminModel->insertNotification($body);
    if(isset($insertNotification['success'])) {  
      # send mail to subscribers
      if($body['status'] == 1) {
        # send mail to all subscribers
        $sendMail = $this->sendMailToSubscribers($insertNotification['id'], $this->input->post("title"));
        if(!$sendMail) {
          # set error message
          $this->session->set_flashdata('error', "Failed to send notification to subscribers. Please Re-Create!");
          # redirect to notifications page
          redirect('admin/notifications', 'refresh');
        }
      }
      # set success message
      $this->session->set_flashdata('success', $insertNotification['success']);
    } else if(isset($insertNotification['error'])) {
      $this->session->set_flashdata('error', $insertNotification['error']);
    }
    
    # redirect to notifications page
    redirect('admin/notifications', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: EditNotification
   * 
   * @return  View  Admin Edit Notification
   */
  public function EditNotification($id)
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body to send to add categories page
    $data = [];
    $data['page'] = "notifications";
    $data['categoryItems'] = $this->AdminModel->fetchCategories();
    $data['item'] = $this->AdminModel->fetchNotifications(['id'=>$id])[0];
    $this->load->view('admin/editnotification', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: UpdateNotification
   * 
   * @return  View  Admin Notifications
   */
  public function UpdateNotification($id)
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # get notification
    $getNotification = $this->AdminModel->fetchNotifications(['id'=>$id])[0];

    # Send mail when notification is published
    if($getNotification['status'] == 0) {
      if($this->input->post("status") == 1) {
        # send mail to all subscribers
        $sendMail = $this->sendMailToSubscribers($getNotification['id'], $this->input->post("title"));
        if(!$sendMail) {
          # set error message
          $this->session->set_flashdata('error', "Failed to send notification to subscribers. Please Re-Create!");
          # redirect to notifications page
          redirect('admin/notifications', 'refresh');
        }
      }
    }

    # parameters
    $body = [];
    $body['category_id'] = $this->input->post("category_id") ?? 0;
    $body['title'] = trim($this->input->post("title") ?? "");
    $body['description'] = trim($this->input->post("description") ?? "");
    $body['status'] = $this->input->post("status") ?? 0;

    # insert notification
    $updateNotification = $this->AdminModel->updateNotification($id,$body);
    if(isset($updateNotification['success'])) {
      $this->session->set_flashdata('success', $updateNotification['success']);
    } else if(isset($updateNotification['error'])) {
      $this->session->set_flashdata('error', $updateNotification['error']);
    }

    # redirect to notifications page
    redirect('admin/notifications', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteNotification
   * 
   * @return  View  Admin Notifications
   */
  public function DeleteNotification($id)
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # Delete Notification
    $deleteNotification = $this->AdminModel->deleteNotification($id);
    if(!$deleteNotification) {
      $this->session->set_flashdata('error', "Failed To Delete Notification!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Notification!");
    }

    # redirect to notifications page
    redirect('admin/notifications', 'refresh');
  }
   
#################################################################################################################################
#################################################################################################################################
######################################################    POSTS   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Posts
   * 
   * @return  View  Admin Posts
   */
  public function Posts()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body send to posts page
    $data = [];
    $data['page'] = "posts";
    $data['branchItems'] = $this->AdminModel->fetchBranches();
    $data['materialItems'] = $this->AdminModel->fetchMaterials();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['items'] = $this->AdminModel->fetchPosts();
    $this->load->view('admin/posts', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertPost
   * 
   * @return  View  Admin Posts
   */
  public function InsertPost()
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # verify mandatory fields
    if($this->input->post("post_type") == "DOCUMENTS") {
      if(empty($_FILES["file"]["name"])) {
        # set error message
        $this->session->set_flashdata('error', "Please select a document to publish a post!");
        # redirect to posts page
        redirect('admin/posts', 'refresh');
      }
    }

    # verify mandatory fields
    if($this->input->post("post_type") == "YOUTUBE") {
      if(empty($this->input->post("youtube_url"))) {
        # set error message
        $this->session->set_flashdata('error', "Please provide a youtube URL to publish a post!");
        # redirect to posts page
        redirect('admin/posts', 'refresh');
      }
    }

    # By default file & Image path
    $filePath = "";
    $imagePath = "";

    # Upload image if not empty
    if(!empty($_FILES["file"]["name"])) {

      # upload file
      $uploadFile = $this->uploadFile();
      if(isset($uploadFile['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadFile['error']);
        # redirect to posts page
        redirect('admin/posts', 'refresh');
      }

      # file path
      $filePath = $uploadFile['path'];
    }

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      # upload image
      $uploadImage = $this->uploadPostImage();
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to articles page
        redirect('admin/articles', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # parameters
    $body = [];
    $body['material_id'] = $this->input->post("material_id") ?? 0;
    $body['branch_id'] = $this->input->post("branch_id") ?? 0;
    $body['subject_id'] = $this->input->post("subject_id") ?? 0;
    $body['title'] = trim($this->input->post("title") ?? "");
    $body['short_description'] = trim($this->input->post("short_description") ?? "");
    $body['post_type'] = trim($this->input->post("post_type") ?? "");
    $body['filepath'] = $filePath;
    $body['image'] = $imagePath;
    $body['youtube_url'] = trim($this->input->post("youtube_url") ?? "");
    $body['status'] = $this->input->post("status") ?? 0;

    # insert post
    $insertPost = $this->AdminModel->insertPost($body);
    if(isset($insertPost['success'])) {
      $this->session->set_flashdata('success', $insertPost['success']);
    } else if(isset($insertPost['error'])) {
      $this->session->set_flashdata('error', $insertPost['error']);
    }

    # redirect to posts page
    redirect('admin/posts', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: EditPost
   * 
   * @return  View  Admin Edit Post
   */
  public function EditPost($id)
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # body to send to add categories page
    $data = [];
    $data['page'] = "pages";
    $data['branchItems'] = $this->AdminModel->fetchBranches();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['item'] = $this->AdminModel->fetchPosts(['id'=>$id])[0];
    $this->load->view('admin/editpost', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: UpdatePost
   * 
   * @return  View  Admin Posts
   */
  public function UpdatePost($id)
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # get post
    $getPost = $this->AdminModel->fetchPosts(['id'=>$id])[0];

    # verify mandatory fields
    if($getPost['post_type'] != $this->input->post("post_type")) {
      if($this->input->post("post_type") == "DOCUMENTS") {
        if(empty($_FILES["file"]["name"])) {
          # set error message
          $this->session->set_flashdata('error', "Please select a document to publish a post!");
          # redirect to posts page
          redirect('admin/posts', 'refresh');
        }
      }
    }

    # verify mandatory fields
    if($getPost['post_type'] != $this->input->post("post_type")) {
      if($this->input->post("post_type") == "YOUTUBE") {
        if(empty($this->input->post("youtube_url"))) {
          # set error message
          $this->session->set_flashdata('error', "Please provide a youtube URL to publish a post!");
          # redirect to posts page
          redirect('admin/posts', 'refresh');
        }
      }
    }

    # Upload file if not empty
    if(!empty($_FILES["file"]["name"])) {

      if(!empty($getPost['filepath'])) {
        # get filename
        $filename = basename($getPost['filepath']);
        # remove old path
        unlink("uploads/documents/files/".$filename);
      }

      # upload file
      $uploadFile = $this->uploadFile();
      if(isset($uploadFile['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadFile['error']);
        # redirect to posts page
        redirect('admin/posts', 'refresh');
      }

      # file path
      $filePath = $uploadFile['path'];
    }

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      if(!empty($getPost['image'])) {
        # get filename
        $filename = basename($getPost['image']);
        # remove old path
        unlink("uploads/articles/images/".$filename);
      }

      # upload image
      $uploadImage = $this->uploadPostImage();
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to articles page
        redirect('admin/articles', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # parameters
    $body = [];
    $body['branch_id'] = $this->input->post("branch_id") ?? 0;
    $body['subject_id'] = $this->input->post("subject_id") ?? 0;
    $body['title'] = trim($this->input->post("title") ?? "");
    $body['short_description'] = trim($this->input->post("short_description") ?? "");
    $body['post_type'] = trim($this->input->post("post_type") ?? "");
    if(!empty($_FILES["file"]["name"])) $body['filepath'] = $filePath;
    if(!empty($_FILES["image"]["name"])) $body['image'] = $imagePath;
    $body['youtube_url'] = trim($this->input->post("youtube_url") ?? "");
    $body['status'] = $this->input->post("status") ?? 0;

    # insert post
    $updatePost = $this->AdminModel->updatePost($id,$body);
    if(isset($updatePost['success'])) {
      $this->session->set_flashdata('success', $updatePost['success']);
    } else if(isset($updatePost['error'])) {
      $this->session->set_flashdata('error', $updatePost['error']);
    }

    # redirect to posts page
    redirect('admin/posts', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeletePost
   * 
   * @return  View  Admin Posts
   */
  public function DeletePost($id)
  {
    # make sure session exist
    if(empty($this->session->userdata('email'))) {
      # return
      redirect('admin', 'refresh');
    }

    # Delete Post
    $deletePost = $this->AdminModel->deletePost($id);
    if(!$deletePost) {
      $this->session->set_flashdata('error', "Failed To Delete Post!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Post!");
    }

    # redirect to posts page
    redirect('admin/posts', 'refresh');
  }
   
#################################################################################################################################
#################################################################################################################################
################################################   CUSTOM METHODS   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: uploadImage
   * 
   * @return  array  Image path
   */
  public function uploadImage()
  {
    # Init var
    $result = [];

    # Target dir
    $folder = "uploads/articles/images/";
    $file = "images_".rand(1,1000000000);
    
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

    # Build media path
    $mediaPath = $folder.$file.".".$imageFileType;

    # upload file
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $mediaPath)) {
      return ['error'=>"Sorry, there was an error uploading your file!"];
    }

    # Build response
    $result['path'] = base_url().$mediaPath;
    
    # return result
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: uploadImage
   * 
   * @return  array  Image path
   */
  public function uploadPostImage()
  {
    # Init var
    $result = [];

    # Target dir
    $folder = "uploads/posts/images/";
    $file = "images_".rand(1,1000000000);
    
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

    # Build media path
    $mediaPath = $folder.$file.".".$imageFileType;

    # upload file
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $mediaPath)) {
      return ['error'=>"Sorry, there was an error uploading your file!"];
    }

    # Build response
    $result['path'] = base_url().$mediaPath;
    
    # return result
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: uploadFile
   * 
   * @return  array  File path
   */
  public function uploadFile()
  {
    # Init var
    $result = [];

    # Target dir
    $folder = "uploads/documents/files/";
    $file = "document_".rand(1,1000000000);
    
    # get file extension
    $fileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
    
    # Build media path
    $filePath = $folder.$file.".".$fileType;

    # upload file
    if (!move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)) {
      return ['error'=>"Sorry, there was an error uploading your file!"];
    }

    # Build response
    $result['path'] = base_url().$filePath;
    
    # return result
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: sendMailToSubscribers
   * 
   * @return  boolean
   */
  public function sendMailToSubscribers($notificationId, $title)
  {
    # Load Library
    $this->load->library('email');

    # message
    $link = base_url()."notifications/".$notificationId;
    
    # Config
    $this->email->from("en.pavankumar@gmail.com", 'ARCHIVE E-TECH'); 
    $this->email->subject('Archive E-Tech New Notification!'); 
    
    try {
      # get all subscribers
      $subscribers = $this->AdminModel->fetchSubscribers(['status'=>1]);
      if(!empty($subscribers)) {
        foreach($subscribers as $subscriber) {
          $this->email->to($subscriber['email']);
          $this->email->message('Hi '.$subscriber['name'].', Please find new notification. '.$title.' Please find complete details here: '. $link);
          $this->email->send();
        }
      }
    } catch (Exception $e) {
      if(!$this->email->send()) return false;
    }  
    
    # return result
    return true;
  }
  
}?>