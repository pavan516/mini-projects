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
  
    # Helpers
    $this->load->helper('url');

    # Library
    $this->load->library('session');
  }
 
#################################################################################################################################
#################################################################################################################################
#######################################################   POSTS   ################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: index
   * 
   * This method by default loads the home view
   */
  public function index()
  {
    # send data to home
    $data = [];
    $data['page'] = "home";
    $data['materialItems'] = $this->AdminModel->fetchMaterials();
    $data['branchItems'] = $this->AdminModel->fetchBranches();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['items'] = $this->AdminModel->fetchPosts(['status'=>1]);
    $this->load->view('home', $data); 
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: SearchPosts
   * 
   * @return  View  User Posts Search
   */
  public function SearchPosts()
  {    
    # Parameters
    $params = [];
    $params['material_id'] = $this->input->post('material_id') ?? 0;
    $params['branch_id'] = $this->input->post('branch_id') ?? 0;
    $params['subject_id']  = $this->input->post('subject_id') ?? 0;
    $params['status']  = 1;


    # send data to home
    $data = [];
    $data['page'] = "home";
    $data['materialItems'] = $this->AdminModel->fetchMaterials();
    $data['branchItems'] = $this->AdminModel->fetchBranches();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['items'] = $this->AdminModel->fetchPosts($params);
    $this->load->view('home', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: Post
   * 
   * 1. Get post by id
   * 2. get 5 posts related to that branch/subject
   * 
   * @return  View  User Post
   */
  public function Post($id)
  {
    # send data to home
    $data = [];
    $data['page'] = "home";
    $data['item'] = $this->AdminModel->fetchPosts(['id'=>$id])[0];
    $data['items'] = [];
    $getThreePosts = $this->AdminModel->fetchPosts([
      'branch_id'=>$data['item']['branch_id'],
      'subject_id'=>$data['item']['subject_id'],
      'post_type'=>"DOCUMENTS",
      'status'=>1
    ]);
    for($i=0;$i<5;$i++) {
      if(isset($getThreePosts[$i])) {
        $data['items'][] = $getThreePosts[$i];
      }
    }
    $this->load->view('post', $data);
  }
  
#################################################################################################################################
#################################################################################################################################
######################################################   ARTICLES   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Articles
   * 
   * @return  View  User Articles
   */
  public function Articles()
  {
    # send data to articles
    $data = [];
    $data['page'] = "articles";
    $data['materialItems'] = $this->AdminModel->fetchMaterials();
    $data['branchItems'] = $this->AdminModel->fetchBranches();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['items'] = $this->AdminModel->fetchArticles(['status'=>1]);
    $this->load->view('articles', $data); 
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: SearchArticles
   * 
   * @return  View  User Articles Search
   */
  public function SearchArticles()
  {    
    # Parameters
    $params = [];
    $params['material_id'] = $this->input->post('material_id') ?? 0;
    $params['branch_id'] = $this->input->post('branch_id') ?? 0;
    $params['subject_id']  = $this->input->post('subject_id') ?? 0;
    $params['status']  = 1;


    # send data to articles
    $data = [];
    $data['page'] = "articles";
    $data['materialItems'] = $this->AdminModel->fetchMaterials();
    $data['branchItems'] = $this->AdminModel->fetchBranches();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['items'] = $this->AdminModel->fetchArticles($params);
    $this->load->view('articles', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: Article
   * 
   * 1. Get Article by id
   * 2. get 5 Articles related to that branch/subject
   * 
   * @return  View  User Post
   */
  public function Article($id)
  {
    # send data to article
    $data = [];
    $data['page'] = "articles";
    $data['item'] = $this->AdminModel->fetchArticles(['id'=>$id])[0];
    $data['items'] = [];
    $getThreeArticles = $this->AdminModel->fetchArticles([
      'branch_id'=>$data['item']['branch_id'],
      'subject_id'=>$data['item']['subject_id'],
      'status'=>1
    ]);
    for($i=0;$i<5;$i++) {
      if(isset($getThreeArticles[$i])) {
        $data['items'][] = $getThreeArticles[$i];
      }
    }
    $this->load->view('article', $data);
  }
  
#################################################################################################################################
#################################################################################################################################
###################################################   NOTIFICATIONS   ###########################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Notifications
   * 
   * @return  View  User Notifications
   */
  public function Notifications()
  {
    # send data to notifications
    $data = [];
    $data['page'] = "notifications";
    $data['categoryItems'] = $this->AdminModel->fetchCategories();
    $data['items'] = $this->AdminModel->fetchNotifications(['status'=>1]);
    $this->load->view('notifications', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: SearchNotifications
   * 
   * @return  View  User Notifications Search
   */
  public function SearchNotifications()
  {    
    # Parameters
    $params = [];
    $params['category_id'] = $this->input->post('category_id') ?? 0;
    $params['status']  = 1;

    # send data to notifications
    $data = [];
    $data['page'] = "notifications";
    $data['categoryItems'] = $this->AdminModel->fetchCategories();
    $data['items'] = $this->AdminModel->fetchNotifications($params);
    $this->load->view('notifications', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: Notification
   * 
   * 1. Get Notification by id
   * 2. get 5 Notifications related to that category
   * 
   * @return  View  User Post
   */
  public function Notification($id)
  {
    # send data to notification
    $data = [];
    $data['page'] = "notifications";
    $data['item'] = $this->AdminModel->fetchNotifications(['id'=>$id])[0];
    $data['items'] = [];
    $getNotifications = $this->AdminModel->fetchNotifications([
      'category_id'=>$data['item']['category_id'],
      'status'=>1
    ]);
    for($i=0;$i<5;$i++) {
      if(isset($getNotifications[$i])) {
        $data['items'][] = $getNotifications[$i];
      }
    }
    $this->load->view('notification', $data);
  }
  
#################################################################################################################################
#################################################################################################################################
###################################################   NOTIFICATIONS   ###########################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: InsertSubscriber
   * 
   * @return  View  Admin Notifications
   */
  public function InsertSubscriber()
  {
    # Build data to insert
    $body = [];
    $body['name'] = $this->input->post('name') ?? "";
    $body['email'] = $this->input->post('email') ?? "";
    $body['status'] = 1;

    # insert Subscriber
    $insertSubscriber = $this->AdminModel->insertSubscriber($body);
    if(isset($insertSubscriber['success'])) {
      $this->session->set_flashdata('success', $insertSubscriber['success']);
    } else if(isset($insertSubscriber['error'])) {
      $this->session->set_flashdata('error', $insertSubscriber['error']);
    }

    # redirect to notifications page
    redirect('notifications', 'refresh');
  }
  
}?>