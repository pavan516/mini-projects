<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
* ORG       : OM GROUP OF IT SOLUTIONS
* AUTHOR    : Pavan Kumar
* Email     : en.pavankumar@gmail.com
* Contact   : 8520872771
* Project   : VIKRAM DELIVERY SERVICE
*/
  
/**
 * AuthModel
 */
class AuthModel extends CI_Model
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
###################################################   REGISTRATION   ############################################################
#################################################################################################################################
#################################################################################################################################

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
      return ['error'=>"We are sorry to register your account! Please contact : 8187848405"];
    }

    # return response
    return ['success'=>"Successfully Account Created - OTP sent to your mobile: ".$data['mobile']." Please wait for 30 seconds to receive OTP, If not received - Please contact : 8187848405"];
  }
  
#################################################################################################################################
#################################################################################################################################
#######################################################   LOGIN   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * login
   *
   * @param   string  $mobile
   * 
   * @param   string  $pass
   * 
   * @return  boolean
   */
  public function login($mobile, $pass)
  {
    # get user
    $user = $this->db->select('*')->from('users')->where('mobile', $mobile)->where('status',1)->get()->row_array();
    if(empty($user)) return ['error'=>"Account does not exist with this mobile no: ".$mobile];

    # account verification check
    if($user['verified'] == 0) return ['error'=>"Account not yet verified"];

    # verify password
    if(md5((string)trim($pass)) != $user['password']) {
      return ['error'=>"Invalid Email/Password!"];
    }

    # set data to session
    $this->session->set_userdata($user);
    
    # return response
    return ['success'=>"Successfully loggedIn!"];
  }
     
#################################################################################################################################
#################################################################################################################################
#####################################################   DASHBOARD   #############################################################
#################################################################################################################################
#################################################################################################################################



#################################################################################################################################
#################################################################################################################################
#####################################################   CATEGORIES   ############################################################
#################################################################################################################################
#################################################################################################################################

//   /**
//    * insertCategory
//    * expected keys in an array
//    * 1. category_name
//    * 2. category_code
//    *
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function insertCategory(array $data)
//   {
//     # make sure category code does not exist already
//     $getCategory = $this->db->select('*')->from('categories')->where('category_code', $data['category_code'])->get()->row_array();
//     if(!empty($getCategory)) {
//       return ['error'=>"category already exist with this code: ".$data['category_code']];
//     }

//     # save category
//     $insert = $this->db->insert('categories', $data);
//     if(!$insert) {
//       return ['error'=>"Failed to insert category!"];
//     }

//     # return response
//     return ['success'=>"Successfully Inserted Category!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * fetchCategories
//    * 
//    * @param   array  $params
//    * 
//    * @return  array
//    */
//   public function fetchCategories(array $params=[])
//   {
//     # init var
//     $categories = [];

//     # build query
//     $this->db->select('*')->from('categories');

//     # order by id desc
//     $this->db->order_by("id", "desc");

//     # result query
//     $categories = $this->db->get()->result_array();
    
//     # return response
//     return $categories;
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * deleteCategory
//    * 
//    * @param   int   $id
//    * 
//    * @return  boolean
//    */
//   public function deleteCategory($id)
//   {
//     # Delete category
//     $deleteCategory = $this->db->delete('categories', ['id'=>$id]);
//     if(!$deleteCategory) {
//       return false;
//     }

//     # return response
//     return true;
//   }
   
// #################################################################################################################################
// #################################################################################################################################
// ######################################################   BRANCHES   #############################################################
// #################################################################################################################################
// #################################################################################################################################

//   /**
//    * insertBranch
//    * expected keys in an array
//    * 1. branch_name
//    * 2. branch_code
//    *
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function insertBranch(array $data)
//   {
//     # make sure branch code does not exist already
//     $getBranch = $this->db->select('*')->from('branches')->where('branch_code', $data['branch_code'])->get()->row_array();
//     if(!empty($getBranch)) {
//       return ['error'=>"branch already exist with this code: ".$data['branch_code']];
//     }

//     # save branch
//     $insert = $this->db->insert('branches', $data);
//     if(!$insert) {
//       return ['error'=>"Failed to insert Branch!"];
//     }

//     # return response
//     return ['success'=>"Successfully Inserted Branch!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * fetchBranches
//    * 
//    * @param   array  $params
//    * 
//    * @return  array
//    */
//   public function fetchBranches(array $params=[])
//   {
//     # init var
//     $branches = [];

//     # build query
//     $this->db->select('*')->from('branches');

//     # filter with id
//     if(isset($params['id']) && !empty($params['id'])) {
//       $this->db->where('id',$params['id']);
//     }

//     # order by id desc
//     $this->db->order_by("id", "desc");

//     # result query
//     $branches = $this->db->get()->result_array();
    
//     # return response
//     return $branches;
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * deleteBranch
//    * 
//    * @param   int   $id
//    * 
//    * @return  boolean
//    */
//   public function deleteBranch($id)
//   {
//     # Delete branch
//     $deleteBranch = $this->db->delete('branches', ['id'=>$id]);
//     if(!$deleteBranch) {
//       return false;
//     }

//     # return response
//     return true;
//   }
   
// #################################################################################################################################
// #################################################################################################################################
// ######################################################   MATERIALS   ############################################################
// #################################################################################################################################
// #################################################################################################################################

//   /**
//    * insertMaterial
//    * expected keys in an array
//    * 1. material_name
//    * 2. material_code
//    *
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function insertMaterial(array $data)
//   {
//     # make sure material code does not exist already
//     $getMaterial = $this->db->select('*')->from('study_material')->where('material_code', $data['material_code'])->get()->row_array();
//     if(!empty($getMaterial)) {
//       return ['error'=>"material already exist with this code: ".$data['material_code']];
//     }

//     # save material
//     $insert = $this->db->insert('study_material', $data);
//     if(!$insert) {
//       return ['error'=>"Failed to insert Material!"];
//     }

//     # return response
//     return ['success'=>"Successfully Inserted Material!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * fetchMaterials
//    * 
//    * @param   array  $params
//    * 
//    * @return  array
//    */
//   public function fetchMaterials(array $params=[])
//   {
//     # init var
//     $materials = [];

//     # build query
//     $this->db->select('*')->from('study_material');

//     # filter with id
//     if(isset($params['id']) && !empty($params['id'])) {
//       $this->db->where('id',$params['id']);
//     }

//     # order by id desc
//     $this->db->order_by("id", "desc");

//     # result query
//     $materials = $this->db->get()->result_array();
    
//     # return response
//     return $materials;
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * deleteMaterial
//    * 
//    * @param   int   $id
//    * 
//    * @return  boolean
//    */
//   public function deleteMaterial($id)
//   {
//     # Delete material
//     $deleteMaterial = $this->db->delete('study_material', ['id'=>$id]);
//     if(!$deleteMaterial) {
//       return false;
//     }

//     # return response
//     return true;
//   }
   
// #################################################################################################################################
// #################################################################################################################################
// ######################################################   SUBJECTS   #############################################################
// #################################################################################################################################
// #################################################################################################################################

//   /**
//    * insertSubject
//    * expected keys in an array
//    * 1. subject_name
//    * 2. subject_code
//    *
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function insertSubject(array $data)
//   {
//     # make sure subject code does not exist already
//     $getSubject = $this->db->select('*')->from('subjects')->where('subject_code', $data['subject_code'])->get()->row_array();
//     if(!empty($getSubject)) {
//       return ['error'=>"Subject already exist with this code: ".$data['subject_code']];
//     }

//     # save subject
//     $insert = $this->db->insert('subjects', $data);
//     if(!$insert) {
//       return ['error'=>"Failed to insert Subject!"];
//     }

//     # return response
//     return ['success'=>"Successfully Inserted Subject!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * fetchSubjects
//    * 
//    * @param   array  $params
//    * 
//    * @return  array
//    */
//   public function fetchSubjects(array $params=[])
//   {
//     # init var
//     $subjects = [];

//     # build query
//     $this->db->select('*')->from('subjects');

//     # order by id desc
//     $this->db->order_by("id", "desc");

//     # result query
//     $subjects = $this->db->get()->result_array();
    
//     # return response
//     return $subjects;
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * deleteSubject
//    * 
//    * @param   int   $id
//    * 
//    * @return  boolean
//    */
//   public function deleteSubject($id)
//   {
//     # Delete Subject
//     $deleteSubject = $this->db->delete('subjects', ['id'=>$id]);
//     if(!$deleteSubject) {
//       return false;
//     }

//     # return response
//     return true;
//   }
   
// #################################################################################################################################
// #################################################################################################################################
// ######################################################   ARTICLES   #############################################################
// #################################################################################################################################
// #################################################################################################################################

//   /**
//    * fetchArticles
//    * 
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function fetchArticles(array $data=[])
//   {
//     # init var
//     $articles = [];

//     # build query
//     $this->db->select('*')->from('articles');

//     # filter with id
//     if(isset($data['id']) && !empty($data['id'])) {
//       $this->db->where('id',$data['id']);
//     }

//     # filter with branch_id
//     if(isset($data['branch_id']) && $data['branch_id'] != 0) {
//       $this->db->where('branch_id',$data['branch_id']);
//     }

//     # filter with subject_id
//     if(isset($data['subject_id']) && $data['subject_id'] != 0) {
//       $this->db->where('subject_id',$data['subject_id']);
//     }

//     # filter with status
//     if(isset($data['status']) && !empty($data['status'])) {
//       $this->db->where('status',$data['status']);
//     }

//     # order by id desc
//     $this->db->order_by("id", "desc");

//     # result query
//     $articles = $this->db->get()->result_array();

//     # expand branch & subject
//     $result = [];
//     foreach($articles as $article) {
//       # expand branch
//       if($article['branch_id'] != 0) {
//         $article['_branch'] = $this->db->select('*')->from('branches')->where('id', $article['branch_id'])->get()->row_array();
//       }
//       # expand subject
//       if($article['subject_id'] != 0) {
//         $article['_subject'] = $this->db->select('*')->from('subjects')->where('id', $article['subject_id'])->get()->row_array();
//       }
//       $result[] = $article;
//     }
    
//     # return response
//     return $result;
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * insertArticle
//    * expected keys in an array
//    * 1. branch_id
//    * 2. subject_id
//    * 3. title
//    * 4. short_description
//    * 5. description
//    * 6. image (optional)
//    * 7. status
//    *
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function insertArticle(array $data)
//   {
//     # save Article
//     $insert = $this->db->insert('articles', $data);
//     if(!$insert) {
//       return ['error'=>"Failed to insert Article!"];
//     }

//     # return response
//     return ['success'=>"Successfully Inserted Article!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * updateArticle
//    * expected keys in an array
//    * 1. branch_id
//    * 2. subject_id
//    * 3. title
//    * 4. short_description
//    * 5. description
//    * 6. image (optional)
//    * 7. status
//    *
//    * @param   int     $id
//    * 
//    * @param   array   $data
//    * 
//    * @return  array
//    */
//   public function updateArticle(int $id, array $data)
//   {
//     # save Article
//     $update = $this->db->where('id',$id)->update('articles',$data);
//     if(!$update) {
//       return ['error'=>"Failed to update Article!"];
//     }

//     # return response
//     return ['success'=>"Successfully Updated Article!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * deleteArticle
//    * 
//    * @param   int   $id
//    * 
//    * @return  boolean
//    */
//   public function deleteArticle($id)
//   {
//     # Delete Article
//     $deleteArticle = $this->db->delete('articles', ['id'=>$id]);
//     if(!$deleteArticle) {
//       return false;
//     }

//     # return response
//     return true;
//   }
   
// #################################################################################################################################
// #################################################################################################################################
// ##################################################   NOTIFICATIONS   ############################################################
// #################################################################################################################################
// #################################################################################################################################

//   /**
//    * fetchNotifications
//    * 
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function fetchNotifications(array $data=[])
//   {
//     # init var
//     $notifications = [];

//     # build query
//     $this->db->select('*')->from('notifications');

//     # filter with id
//     if(isset($data['id']) && !empty($data['id'])) {
//       $this->db->where('id',$data['id']);
//     }

//     # filter with category_id
//     if(isset($data['category_id'])) {
//       $this->db->where('category_id',$data['category_id']);
//     }

//     # filter with status
//     if(isset($data['status']) && !empty($data['status'])) {
//       $this->db->where('status',$data['status']);
//     }

//     # order by id desc
//     $this->db->order_by("id", "desc");

//     # result query
//     $notifications = $this->db->get()->result_array();

//     # expand branch & subject
//     $result = [];
//     foreach($notifications as $notification) {
//       # expand category
//       if($notification['category_id'] != 0) {
//         $notification['_category'] = $this->db->select('*')->from('categories')->where('id', $notification['category_id'])->get()->row_array();
//       }
//       $result[] = $notification;
//     }
    
//     # return response
//     return $result;
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * insertNotification
//    * expected keys in an array
//    * 1. category_id
//    * 2. title
//    * 3. description
//    * 4. status
//    *
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function insertNotification(array $data)
//   {
//     # save Article
//     $insert = $this->db->insert('notifications', $data);
//     if(!$insert) {
//       return ['error'=>"Failed to insert Notification!"];
//     }

//     # return response
//     return ['id'=>$this->db->insert_id(), 'success'=>"Successfully Inserted Notification!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * updateNotification
//    * expected keys in an array
//    * 1. category_id
//    * 2. title
//    * 3. description
//    * 4. status
//    *
//    * @param   int     $id
//    * 
//    * @param   array   $data
//    * 
//    * @return  array
//    */
//   public function updateNotification(int $id, array $data)
//   {
//     # save notification
//     $update = $this->db->where('id',$id)->update('notifications',$data);
//     if(!$update) {
//       return ['error'=>"Failed to update Notification!"];
//     }

//     # return response
//     return ['success'=>"Successfully Updated Notification!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * deleteNotification
//    * 
//    * @param   int   $id
//    * 
//    * @return  boolean
//    */
//   public function deleteNotification($id)
//   {
//     # Delete Notification
//     $deleteNotification = $this->db->delete('notifications', ['id'=>$id]);
//     if(!$deleteNotification) {
//       return false;
//     }

//     # return response
//     return true;
//   }
   
// #################################################################################################################################
// #################################################################################################################################
// ######################################################   POSTS   ################################################################
// #################################################################################################################################
// #################################################################################################################################

//   /**
//    * fetchPosts
//    * 
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function fetchPosts(array $data=[])
//   {
//     # init var
//     $posts = [];

//     # build query
//     $this->db->select('*')->from('posts');

//     # filter with id
//     if(isset($data['id']) && !empty($data['id'])) {
//       $this->db->where('id',$data['id']);
//     }

//     # filter with branch_id
//     if(isset($data['branch_id']) && $data['branch_id'] != 0) {
//       $this->db->where('branch_id',$data['branch_id']);
//     }

//     # filter with subject_id
//     if(isset($data['subject_id']) && $data['subject_id'] != 0) {
//       $this->db->where('subject_id',$data['subject_id']);
//     }

//     # filter with post_type
//     if(isset($data['post_type']) && !empty($data['post_type'])) {
//       $this->db->where('post_type',$data['post_type']);
//     }

//     # filter with status
//     if(isset($data['status']) && !empty($data['status'])) {
//       $this->db->where('status',$data['status']);
//     }

//     # order by id desc
//     $this->db->order_by("id", "desc");

//     # result query
//     $posts = $this->db->get()->result_array();

//     # expand branch & subject
//     $result = [];
//     foreach($posts as $post) {
//       # expand branch
//       if($post['branch_id'] != 0) {
//         $post['_branch'] = $this->db->select('*')->from('branches')->where('id', $post['branch_id'])->get()->row_array();
//       }
//       # expand subject
//       if($post['subject_id'] != 0) {
//         $post['_subject'] = $this->db->select('*')->from('subjects')->where('id', $post['subject_id'])->get()->row_array();
//       }
//       $result[] = $post;
//     }
    
//     # return response
//     return $result;
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * insertPost
//    * expected keys in an array
//    * 1. branch_id
//    * 2. subject_id
//    * 3. title
//    * 4. short_description
//    * 5. post_type
//    * 6. filepath
//    * 7. youtube_url
//    * 8. status
//    *
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function insertPost(array $data)
//   {
//     # save Article
//     $insert = $this->db->insert('posts', $data);
//     if(!$insert) {
//       return ['error'=>"Failed to insert Post!"];
//     }

//     # return response
//     return ['success'=>"Successfully Inserted Post!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * updatePost
//    * expected keys in an array
//    * 1. branch_id
//    * 2. subject_id
//    * 3. title
//    * 4. short_description
//    * 5. post_type
//    * 6. filepath
//    * 7. youtube_url
//    * 8. status
//    *
//    * @param   int     $id
//    * 
//    * @param   array   $data
//    * 
//    * @return  array
//    */
//   public function updatePost(int $id, array $data)
//   {
//     # save post
//     $update = $this->db->where('id',$id)->update('posts',$data);
//     if(!$update) {
//       return ['error'=>"Failed to update Post!"];
//     }

//     # return response
//     return ['success'=>"Successfully Updated Post!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * deletePost
//    * 
//    * @param   int   $id
//    * 
//    * @return  boolean
//    */
//   public function deletePost($id)
//   {
//     # Delete Post
//     $deletePost = $this->db->delete('posts', ['id'=>$id]);
//     if(!$deletePost) {
//       return false;
//     }

//     # return response
//     return true;
//   }
   
// #################################################################################################################################
// #################################################################################################################################
// ###################################################   SUBSCRIBERS   #############################################################
// #################################################################################################################################
// #################################################################################################################################

//   /**
//    * insertSubscriber
//    * expected keys in an array
//    * 1. name
//    * 2. email
//    * 3. status
//    *
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function insertSubscriber(array $data)
//   {
//     # save Article
//     $insert = $this->db->insert('subscribers', $data);
//     if(!$insert) {
//       return ['error'=>"sorry! Failed to subscribe!"];
//     }

//     # return response
//     return ['success'=>"Thanks ".$data['name']." For Subscribing ARCHIVE E-TECH! We Will Send Related notifications Through Mail!"];
//   }
  
// #*******************************************************************************************************************************#
// #*******************************************************************************************************************************#

//   /**
//    * fetchSubscribers
//    * 
//    * @param   array  $data
//    * 
//    * @return  array
//    */
//   public function fetchSubscribers(array $data=[])
//   {
//     # init var
//     $subscribers = [];

//     # build query
//     $this->db->select('*')->from('subscribers');

//     # filter with id
//     if(isset($data['id']) && !empty($data['id'])) {
//       $this->db->where('id',$data['id']);
//     }

//     # filter with name
//     if(isset($data['name'])) {
//       $this->db->where('name',$data['name']);
//     }

//     # filter with email
//     if(isset($data['email']) && !empty($data['email'])) {
//       $this->db->where('email',$data['email']);
//     }

//     # filter with status
//     if(isset($data['status']) && !empty($data['status'])) {
//       $this->db->where('status',$data['status']);
//     }

//     # order by id desc
//     $this->db->order_by("id", "desc");

//     # result query
//     $subscribers = $this->db->get()->result_array();

//     # return response
//     return $subscribers;
//   }
  
// #################################################################################################################################
// #################################################################################################################################
// ###################################################   SUBSCRIBERS   #############################################################
// #################################################################################################################################
// #################################################################################################################################

//   /**
//    * fetchStatistics
//    * 
//    * @param   array  $params
//    * 
//    * @return  array
//    */
//   public function fetchStatistics(array $params=[])
//   {
//     # init var
//     $data = [];

//     # get counts
//     $subscribers = $this->db->select('count(id) as count')->from('subscribers')->get()->row_array();
//     $posts = $this->db->select('count(id) as count')->from('posts')->get()->row_array();
//     $articles = $this->db->select('count(id) as count')->from('articles')->get()->row_array();
//     $notifications = $this->db->select('count(id) as count')->from('notifications')->get()->row_array();

//     # build response
//     $data['total_subscribers'] = $subscribers['count'] ?? 0;
//     $data['total_posts'] = $posts['count'] ?? 0;
//     $data['total_articles'] = $articles['count'] ?? 0;
//     $data['total_notifications'] = $notifications['count'] ?? 0;

//     # return response
//     return $data;
//   }
  
}?>