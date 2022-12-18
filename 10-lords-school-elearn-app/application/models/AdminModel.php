<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
* ORG       : OM GROUP OF IT SOLUTIONS
* AUTHOR    : Pavan Kumar
* Email     : en.pavankumar@gmail.com
* Contact   : 8520872771
* Project   : ARCHIVE-ETECH
* P.FOUNDER : SUBHASH
*/

/**
 * AdminModel
 */
class AdminModel extends CI_Model
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
#######################################################   AUTH   ################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * login
   *
   * @param   string  $mobile
   * 
   * @return  boolean
   */
  public function login($mobile)
  {
    # get user
    $user = $this->db->select('*')->from('users')->where('mobile', $mobile)->get()->row_array();
    if(empty($user)) {
      return false;
    }

    # set session data
    $this->session->set_userdata($user);

    # return response
    return true;
  }
    
#################################################################################################################################
#################################################################################################################################
######################################################   BRANCHES   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * insertBranch
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertBranch(array $data)
  {
    # make sure branch code does not exist already
    $getBranch = $this->db->select('*')->from('branches')->where('branch_code', $data['branch_code'])->get()->row_array();
    if(!empty($getBranch)) {
      return ['error'=>"branch already exist with this code: ".$data['branch_code']];
    }

    # save branch
    $insert = $this->db->insert('branches', $data);
    if(!$insert) {
      return ['error'=>"Failed to insert Branch!"];
    }

    # return response
    return ['success'=>"Successfully Inserted Branch!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * fetchBranches
   * 
   * @param   array  $params
   * 
   * @return  array
   */
  public function fetchBranches(array $params=[])
  {
    # init var
    $branches = [];

    # build query
    $this->db->select('*')->from('branches');

    # filter with id
    if(isset($params['id']) && !empty($params['id'])) {
      $this->db->where('id',$params['id']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $branches = $this->db->get()->result_array();
    
    # return response
    return $branches;
  }
      
#################################################################################################################################
#################################################################################################################################
######################################################   CLASSES   ##############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * insertClass
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertClass(array $data)
  {
    # make sure class code does not exist already
    $getClass = $this->db->select('*')->from('classes')->where('class_code', $data['class_code'])->get()->row_array();
    if(!empty($getClass)) {
      return ['error'=>"class already exist with this code: ".$data['class_code']];
    }

    # save class
    $insert = $this->db->insert('classes', $data);
    if(!$insert) {
      return ['error'=>"Failed to insert Class!"];
    }

    # return response
    return ['success'=>"Successfully Inserted Class!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * fetchClasses
   * 
   * @param   array  $params
   * 
   * @return  array
   */
  public function fetchClasses(array $params=[])
  {
    # init var
    $classes = [];

    # build query
    $this->db->select('*')->from('classes');

    # filter with id
    if(isset($params['id']) && !empty($params['id'])) {
      $this->db->where('id',$params['id']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $classes = $this->db->get()->result_array();
    
    # return response
    return $classes;
  }
  
#################################################################################################################################
#################################################################################################################################
######################################################   SECTIONS   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * insertSection
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertSection(array $data)
  {
    # make sure Section code does not exist already
    $getSection = $this->db->select('*')->from('sections')->where('branch_id', $data['branch_id'])->where('class_id', $data['class_id'])->where('section_code', $data['section_code'])->get()->row_array();
    if(!empty($getSection)) {
      return ['error'=>"Section already exist with this code: ".$data['section_code']];
    }

    # save section
    $insert = $this->db->insert('sections', $data);
    if(!$insert) {
      return ['error'=>"Failed to insert Section!"];
    }

    # return response
    return ['success'=>"Successfully Inserted Section!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * fetchSections
   * 
   * @param   array  $params
   * 
   * @return  array
   */
  public function fetchSections(array $params=[])
  {
    # init var
    $sections = [];

    # build query
    $this->db->select('*')->from('sections');

    # filter with id
    if(isset($params['id']) && !empty($params['id'])) {
      $this->db->where('id',$params['id']);
    }

    # filter with branch_id
    if(isset($params['branch_id']) && !empty($params['branch_id'])) {
      $this->db->where('branch_id',$params['branch_id']);
    }

    # filter with class_id
    if(isset($params['class_id']) && !empty($params['class_id'])) {
      $this->db->where('class_id',$params['class_id']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $sections = $this->db->get()->result_array();
    
    # expand class
    $result = [];
    foreach($sections as $section) {
      # expand class
      if($section['branch_id'] != 0) {
        $section['_branch'] = $this->db->select('*')->from('branches')->where('id', $section['branch_id'])->get()->row_array();
      } else {
        $section['_branch']['branch_code'] = "ALL";
      }
      $section['_class'] = $this->db->select('*')->from('classes')->where('id', $section['class_id'])->get()->row_array();
      $result[] = $section;
    }
    
    # return response
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * updateSection
   *
   * @param   int     $id
   * 
   * @param   array   $data
   * 
   * @return  array
   */
  public function updateSection(int $id, array $data)
  {
    # update User
    $update = $this->db->where('id',$id)->update('sections',$data);
    if(!$update) {
      return ['error'=>"Failed to update section!"];
    }

    # return response
    return ['success'=>"Successfully Updated section!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * deleteSection
   * 
   * @param   int   $id
   * 
   * @return  boolean
   */
  public function deleteSection($id)
  {
    # Delete Section
    $deleteSection = $this->db->delete('sections', ['id'=>$id]);
    if(!$deleteSection) {
      return false;
    }

    # return response
    return true;
  }
    
#################################################################################################################################
#################################################################################################################################
######################################################   SUBJECTS   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * insertSubject
   *
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertSubject(array $data)
  {
    # make sure subject code does not exist already
    $getSubject = $this->db->select('*')->from('subjects')->where('class_id', $data['class_id'])->where('subject_code', $data['subject_code'])->get()->row_array();
    if(!empty($getSubject)) {
      return ['error'=>"Subject already exist with this code: ".$data['subject_code']];
    }

    # save subject
    $insert = $this->db->insert('subjects', $data);
    if(!$insert) {
      return ['error'=>"Failed to insert Subject!"];
    }

    # return response
    return ['success'=>"Successfully Inserted Subject!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * fetchSubjects
   * 
   * @param   array  $params
   * 
   * @return  array
   */
  public function fetchSubjects(array $params=[])
  {
    # init var
    $subjects = [];

    # build query
    $this->db->select('*')->from('subjects');

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $subjects = $this->db->get()->result_array();
    
    # expand class
    $result = [];
    foreach($subjects as $subject) {
      # expand class
      $subject['_class'] = $this->db->select('*')->from('classes')->where('id', $subject['class_id'])->get()->row_array();
      $result[] = $subject;
    }
    
    # return response
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * deleteSubject
   * 
   * @param   int   $id
   * 
   * @return  boolean
   */
  public function deleteSubject($id)
  {
    # Delete Subject
    $deleteSubject = $this->db->delete('subjects', ['id'=>$id]);
    if(!$deleteSubject) {
      return false;
    }

    # return response
    return true;
  }
  
#################################################################################################################################
#################################################################################################################################
######################################################   USERS   ################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchUsers
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchUsers(array $data=[])
  {
    # init var
    $users = [];

    # build query
    $this->db->select('*')->from('users');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with uuid
    if(isset($data['uuid']) && !empty($data['uuid'])) {
      $this->db->where('uuid',$data['uuid']);
    }

    # filter with mobile
    if(isset($data['mobile']) && !empty($data['mobile'])) {
      $this->db->where('mobile',$data['mobile']);
    }

    # filter with branch_id
    if(isset($data['branch_id']) && $data['branch_id'] != 0) {
      $this->db->where('branch_id',$data['branch_id']);
    }

    # filter with role
    if(isset($data['role']) && !empty($data['role'])) {
      $this->db->where('role',$data['role']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $users = $this->db->get()->result_array();

    # expand branch
    $result = [];
    foreach($users as $user) {
      # expand branch
      if($user['branch_id'] != 0) {
        $user['_branch'] = $this->db->select('*')->from('branches')->where('id', $user['branch_id'])->get()->row_array();
      } else {
        $user['_branch']['branch_code'] = "ALL";
      }
      # expand class
      if($user['class_id'] != 0) {
        $user['_class'] = $this->db->select('*')->from('classes')->where('id', $user['class_id'])->get()->row_array();
      } else {
        $user['_class']['class_code'] = "ALL";
      }
      # expand section
      if($user['section_id'] != 0) {
        $user['_section'] = $this->db->select('*')->from('sections')->where('id', $user['section_id'])->get()->row_array();
      } else {
        $user['_section']['section_code'] = "ALL";
      }
      $result[] = $user;
    }
    
    # return response
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * insertUser
   *
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertUser(array $data)
  {
    # make sure mobile is unique
    $getUser = $this->db->select('*')->from('users')->where('mobile', $data['mobile'])->get()->row_array();
    if(!empty($getUser)) {
      return ['error'=>"User already exist with this mobile number: ".$data['mobile']];
    }

    # save User
    $insert = $this->db->insert('users', $data);
    if(!$insert) {
      return ['error'=>"Failed to insert User!"];
    }

    # return response
    return ['success'=>"Successfully Inserted User!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * updateUser
   *
   * @param   int     $id
   * 
   * @param   array   $data
   * 
   * @return  array
   */
  public function updateUser(int $id, array $data)
  {
    # update User
    $update = $this->db->where('id',$id)->update('users',$data);
    if(!$update) {
      return ['error'=>"Failed to update User!"];
    }

    # return response
    return ['success'=>"Successfully Updated User!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * deleteUser
   * 
   * @param   int   $id
   * 
   * @return  boolean
   */
  public function deleteUser($id)
  {
    # Delete User
    $deleteUser = $this->db->delete('users', ['id'=>$id]);
    if(!$deleteUser) {
      return false;
    }

    # return response
    return true;
  }
    
#################################################################################################################################
#################################################################################################################################
##############################################   TEACHER MAPPINGS   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchTeacherMappings
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchTeacherMappings(array $data=[])
  {
    # init var
    $teachermappings = [];

    # build query
    $this->db->select('*')->from('teachermappings');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with branch_id
    if(isset($data['branch_id']) && $data['branch_id'] != 0) {
      $this->db->where('branch_id',$data['branch_id']);
    }

    # filter with teacher_id
    if(isset($data['teacher_id']) && $data['teacher_id'] != 0) {
      $this->db->where('teacher_id',$data['teacher_id']);
    }

    # filter with class_id
    if(isset($data['class_id']) && $data['class_id'] != 0) {
      $this->db->where('class_id',$data['class_id']);
    }

    # filter with section_id
    if(isset($data['section_id']) && $data['section_id'] != 0) {
      $this->db->where('section_id',$data['section_id']);
    }

    # filter with subject_id
    if(isset($data['subject_id']) && $data['subject_id'] != 0) {
      $this->db->where('subject_id',$data['subject_id']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $teachermappings = $this->db->get()->result_array();

    # expand branch
    $result = [];
    foreach($teachermappings as $teachermapping) {
      # expand branch
      if($teachermapping['branch_id'] != 0) {
        $teachermapping['_branch'] = $this->db->select('*')->from('branches')->where('id', $teachermapping['branch_id'])->get()->row_array();
      } else {
        $teachermapping['_branch']['branch_code'] = "ALL";
      }
      # expand teacher
      if($teachermapping['teacher_id'] != 0) {
        $teachermapping['_teacher'] = $this->db->select('*')->from('users')->where('id', $teachermapping['teacher_id'])->get()->row_array();
      } else {
        $teachermapping['_teacher']['teacher_code'] = "ALL";
      }
      # expand class
      if($teachermapping['class_id'] != 0) {
        $teachermapping['_class'] = $this->db->select('*')->from('classes')->where('id', $teachermapping['class_id'])->get()->row_array();
      } else {
        $teachermapping['_class']['class_code'] = "ALL";
      }
      # expand section
      if($teachermapping['section_id'] != 0) {
        $teachermapping['_section'] = $this->db->select('*')->from('sections')->where('id', $teachermapping['section_id'])->get()->row_array();
      } else {
        $teachermapping['_section']['section_code'] = "ALL";
      }
      # expand subject
      if($teachermapping['subject_id'] != 0) {
        $teachermapping['_subject'] = $this->db->select('*')->from('subjects')->where('id', $teachermapping['subject_id'])->get()->row_array();
      } else {
        $teachermapping['_subject']['subject_code'] = "ALL";
      }

      # push to an array
      $result[] = $teachermapping;
    }
    
    # return response
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * insertTeacherMappings
   *
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertTeacherMappings(array $data)
  {
    # save Teacher Mappings
    $insert = $this->db->insert('teachermappings', $data);
    if(!$insert) {
      return ['error'=>"Failed to insert Teacher Mapping!"];
    }

    # return response
    return ['success'=>"Successfully Inserted Teacher Mapping!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * DeleteTeacherMapping
   * 
   * @param   int   $id
   * 
   * @return  boolean
   */
  public function DeleteTeacherMapping($id)
  {
    # Delete Teacher Mappings
    $deleteTeacherMapping = $this->db->delete('teachermappings', ['id'=>$id]);
    if(!$deleteTeacherMapping) {
      return false;
    }

    # return response
    return true;
  }
    
#################################################################################################################################
#################################################################################################################################
###################################################   HOMEWORKS   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchHomeworks
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchHomeworks(array $data=[])
  {
    # init var
    $homeworks = [];

    # build query
    $this->db->select('*')->from('homeworks');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with class_id
    if(isset($data['class_id']) && !empty($data['class_id'])) {
      $this->db->where('class_id',$data['class_id']);
    }

    # filter with subject_id 
    if(isset($data['subject_id']) && $data['subject_id'] != 0) {
      $this->db->where('subject_id',$data['subject_id']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $homeworks = $this->db->get()->result_array();

    # expand branch
    $result = [];
    $sections = [];
    foreach($homeworks as $homework) {
      $getSections = $this->db->select('*')->from('homework_sections')->where('homework_id', $homework['id'])->get()->result_array();
      if(!empty($getSections)) {
        # expand class
        $homework['_class'] = $this->db->select('*')->from('classes')->where('id', $getSections[0]['class_id'])->get()->row_array();
        # expand subject
        $homework['_subject'] = $this->db->select('*')->from('subjects')->where('id', $getSections[0]['subject_id'])->get()->row_array();
        # expand sections
        foreach($getSections as $getSection) {
          $sections[] = $this->db->select('section_code')->from('sections')->where('id', $getSection['section_id'])->get()->row_array();
        }
      }

      # push to an array
      $homework['_sections'] = $sections;
      $result[] = $homework;
    }
    
    # return response
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * insertHomework
   *
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertHomework(array $data)
  {
    # save home work
    $insert = $this->db->insert('homeworks', $data);
    if(!$insert) {
      return ['error'=>"Failed to insert Home Work!"];
    }

    # return response
    return ['id'=>$this->db->insert_id(), 'success'=>"Successfully Inserted Home Work!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * insertHomeworkMap
   *
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertHomeworkMap(int $homeworkId, array $sections)
  {
    # delete all records mapped with homework_id & add new
    $this->db->delete('homework_sections', ['homework_id'=>$homeworkId]);

    # insert for each section
    foreach($sections as $sectionId) {
      # Build body
      $body = [];
      $body['homework_on'] = $this->input->post("homework_on") ?? date('Y-m-d');
      $body['homework_id'] = $homeworkId;
      $body['class_id'] = $this->input->post("class_id") ?? 0;
      $body['subject_id'] = $this->input->post("subject_id") ?? 0;
      $body['section_id'] = $sectionId;

      # Insert
      $this->db->insert('homework_sections', $body);
    }

    # return true
    return true;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * updateHomework
   *
   * @param   int     $id
   * 
   * @param   array   $data
   * 
   * @return  array
   */
  public function updateHomework(int $id, array $data)
  {
    # update Home work
    $update = $this->db->where('id',$id)->update('homeworks',$data);
    if(!$update) {
      return ['error'=>"Failed to update Home Work!"];
    }

    # return response
    return ['success'=>"Successfully Updated Home Work!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * deleteHomework
   * 
   * @param   int   $id
   * 
   * @return  boolean
   */
  public function deleteHomework($id)
  {
    # delete all records mapped with homework_id & add new
    $this->db->delete('homework_sections', ['homework_id'=>$id]);

    # Delete Home Work
    $deleteHomework = $this->db->delete('homeworks', ['id'=>$id]);
    if(!$deleteHomework) {
      return false;
    }

    # return response
    return true;
  }

#################################################################################################################################
#################################################################################################################################
###################################################   HOMEWORKS   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchPosts
   * 
   * @param   array  $data
   * 
   * @return  array
   */
  public function fetchPosts(array $data=[])
  {
    # init var
    $posts = [];

    # build query
    $this->db->select('*')->from('posts');

    # filter with id
    if(isset($data['id']) && !empty($data['id'])) {
      $this->db->where('id',$data['id']);
    }

    # filter with class_id
    if(isset($data['class_id']) && !empty($data['class_id'])) {
      $this->db->where('class_id',$data['class_id']);
    }

    # filter with subject_id 
    if(isset($data['subject_id']) && $data['subject_id'] != 0) {
      $this->db->where('subject_id',$data['subject_id']);
    }

    # order by id desc
    $this->db->order_by("id", "desc");

    # result query
    $posts = $this->db->get()->result_array();

    # expand branch
    $result = [];
    $sections = [];
    foreach($posts as $post) {
      $getSections = $this->db->select('*')->from('post_sections')->where('post_id', $post['id'])->get()->result_array();
      if(!empty($getSections)) {
        # expand class
        $post['_class'] = $this->db->select('*')->from('classes')->where('id', $getSections[0]['class_id'])->get()->row_array();
        # expand subject
        $post['_subject'] = $this->db->select('*')->from('subjects')->where('id', $getSections[0]['subject_id'])->get()->row_array();
        # expand sections
        foreach($getSections as $getSection) {
          $sections[] = $this->db->select('section_code')->from('sections')->where('id', $getSection['section_id'])->get()->row_array();
        }
      }

      # push to an array
      $post['_sections'] = $sections;
      $result[] = $post;
    }
    
    # return response
    return $result;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * insertPost
   *
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertPost(array $data)
  {
    # save Post
    $insert = $this->db->insert('posts', $data);
    if(!$insert) {
      return ['error'=>"Failed to insert Post!"];
    }

    # return response
    return ['id'=>$this->db->insert_id(), 'success'=>"Successfully Inserted Post!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * insertPostMap
   *
   * @param   array  $data
   * 
   * @return  array
   */
  public function insertPostMap(int $postId, array $sections)
  {
    # delete all records mapped with post_id & add new
    $this->db->delete('post_sections', ['post_id'=>$postId]);

    # insert for each section
    foreach($sections as $sectionId) {
      # Build body
      $body = [];
      $body['post_on'] = $this->input->post("post_on") ?? date('Y-m-d');
      $body['post_id'] = $postId;
      $body['class_id'] = $this->input->post("class_id") ?? 0;
      $body['subject_id'] = $this->input->post("subject_id") ?? 0;
      $body['section_id'] = $sectionId;

      # Insert
      $this->db->insert('post_sections', $body);
    }

    # return true
    return true;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * updatePost
   *
   * @param   int     $id
   * 
   * @param   array   $data
   * 
   * @return  array
   */
  public function updatePost(int $id, array $data)
  {
    # update Post
    $update = $this->db->where('id',$id)->update('posts',$data);
    if(!$update) {
      return ['error'=>"Failed to update Post!"];
    }

    # return response
    return ['success'=>"Successfully Updated Post!"];
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * deletePost
   * 
   * @param   int   $id
   * 
   * @return  boolean
   */
  public function deletePost($id)
  {
    # delete all records mapped with post_id & add new
    $this->db->delete('post_sections', ['post_id'=>$id]);

    # Delete Post
    $deletePost = $this->db->delete('posts', ['id'=>$id]);
    if(!$deletePost) {
      return false;
    }

    # return response
    return true;
  }

#################################################################################################################################
#################################################################################################################################
###################################################   STATISTICS   ##############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchStatistics
   * 
   * @param   array  $params
   * 
   * @return  array
   */
  public function fetchStatistics(array $params=[])
  {
    # init var
    $data = [];

    # get counts
    $branches = $this->db->select('count(id) as count')->from('branches')->get()->row_array();
    $students = $this->db->select('count(id) as count')->from('users')->where('role',"STUDENTS")->get()->row_array();
    $teachers = $this->db->select('count(id) as count')->from('users')->where('role',"TEACHERS")->get()->row_array();
    $videos = $this->db->select('count(id) as count')->from('posts')->where('post_type',"YOUTUBE")->get()->row_array();
    $notifications = $this->db->select('count(id) as count')->from('posts')->where('post_type',"NOTIFICATIONS")->get()->row_array();
    $notes = $this->db->select('count(id) as count')->from('posts')->where('post_type',"NOTES")->get()->row_array();
    $homeworks = $this->db->select('count(id) as count')->from('homeworks')->get()->row_array();
    // $homeworkSubmissions = $this->db->select('count(id) as count')->from('homework_submissions')->get()->row_array();


    # build response
    $data['total_branches'] = $branches['count'] ?? 0;
    $data['total_students'] = $students['count'] ?? 0;
    $data['total_teachers'] = $teachers['count'] ?? 0;
    $data['total_notifications'] = $notifications['count'] ?? 0;
    $data['total_videos'] = $videos['count'] ?? 0;
    $data['total_notes'] = $notes['count'] ?? 0;
    $data['total_homeworks'] = $homeworks['count'] ?? 0;
    $data['total_homeworkSubmissions'] = 0;
    
    # return response
    return $data;
  }
  
}?>