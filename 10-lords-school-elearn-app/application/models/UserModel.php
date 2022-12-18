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
 * UserModel
 */
class UserModel extends CI_Model
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
######################################################  VIDEOS   ################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchVideos
   * 
   * @return  array
   */
  public function fetchVideos(array $params=[])
  {
    # init var
    $videos = [];

    # Build query
    $fields = "";
    $fields .= "ps.post_on, ps.class_id, ps.subject_id, ps.section_id,";
    $fields .= "p.id,p.uuid,p.title,p.description,p.post_type,p.filepath,p.image,p.youtube_url,p.status,";
    $fields .= "c.class_name,c.class_code,";
    $fields .= "s.section_name,s.section_code,";
    $fields .= "su.subject_name,su.subject_code";

    # Build query
    $this->db->select($fields);
    $this->db->from('post_sections as ps');
    $this->db->join('posts p','ps.post_id = p.id','left');
    $this->db->join('classes c','ps.class_id = c.id','left');
    $this->db->join('sections s','ps.section_id = s.id','left');
    $this->db->join('subjects su','ps.subject_id = su.id','left');
  
    # Filter with section
    if(isset($params['section_id']) && $params['section_id']!=0) {
      $this->db->where('ps.section_id', $params['section_id']);
    }

    # Filter with subject
    if(isset($params['subject_id']) && $params['subject_id']!=0) {
      $this->db->where('ps.subject_id', $params['subject_id']);
    }

    # Filter with class
    if(isset($params['class_id']) && $params['class_id']!=0) {
      $this->db->where('ps.class_id', $params['class_id']);
    }

    # Filter with post
    if(isset($params['post_id']) && $params['post_id']!=0) {
      $this->db->where('ps.post_id', $params['post_id']);
    }

    # Filter with date
    if(isset($params['post_on']) && !empty($params['post_on'])) {
      $this->db->where('p.post_on', $params['post_on']);
    }

    # Filter with uuid
    if(isset($params['uuid']) && !empty($params['uuid'])) {
      $this->db->where('p.uuid', $params['uuid']);
    }

    # Filter with post type
    if(isset($params['post_type']) && !empty($params['post_type'])) {
      $this->db->where('p.post_type', $params['post_type']);
    }

    # Filter with status
    if(isset($params['status']) && $params['status']!=0) {
      $this->db->where('p.status', $params['status']);
    }

    # order by post_id
    $this->db->distinct();
    $this->db->group_by("ps.post_id");
    $this->db->order_by('ps.post_id','desc');
    
    # run query
    $videos =  $this->db->get()->result_array();

    # return response
    return $videos;
  }
  
#################################################################################################################################
#################################################################################################################################
######################################################  HOMEWORKS   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchHomeworks
   * 
   * @return  array
   */
  public function fetchHomeworks(array $params=[])
  {
    # init var
    $homeworks = [];

    # Build query
    $fields = "";
    $fields .= "hs.class_id, hs.subject_id, hs.section_id,";
    $fields .= "h.id,h.uuid,h.homework_on,h.title,h.description,h.image,";
    $fields .= "c.class_name,c.class_code,";
    $fields .= "s.section_name,s.section_code,";
    $fields .= "su.subject_name,su.subject_code";

    # Build query
    $this->db->select($fields);
    $this->db->from('homework_sections as hs');
    $this->db->join('homeworks h','hs.homework_id = h.id','left');
    $this->db->join('classes c','hs.class_id = c.id','left');
    $this->db->join('sections s','hs.section_id = s.id','left');
    $this->db->join('subjects su','hs.subject_id = su.id','left');
  
    # Filter with section
    if(isset($params['section_id']) && $params['section_id']!=0) {
      $this->db->where('hs.section_id', $params['section_id']);
    }

    # Filter with subject
    if(isset($params['subject_id']) && $params['subject_id']!=0) {
      $this->db->where('hs.subject_id', $params['subject_id']);
    }

    # Filter with class
    if(isset($params['class_id']) && $params['class_id']!=0) {
      $this->db->where('hs.class_id', $params['class_id']);
    }

    # Filter with homework
    if(isset($params['homework_id']) && $params['homework_id']!=0) {
      $this->db->where('hs.homework_id', $params['homework_id']);
    }

    # Filter with date
    if(isset($params['homework_on']) && !empty($params['homework_on'])) {
      $this->db->where('h.homework_on', $params['homework_on']);
    }

    # Filter with uuid
    if(isset($params['uuid']) && !empty($params['uuid'])) {
      $this->db->where('h.uuid', $params['uuid']);
    }

    # order by homework_id
    $this->db->distinct();
    $this->db->group_by("hs.homework_id");
    $this->db->order_by('hs.homework_id','desc');
    
    # run query
    $homeworks =  $this->db->get()->result_array();

    # return response
    return $homeworks;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * submitHomework
   *
   * @param   array  $data
   * 
   * @return  array
   */
  public function submitHomework(array $data)
  {
    # save student homework
    $insert = $this->db->insert('student_homeworks', $data);
    if(!$insert) {
      return ['error'=>"Failed to Submit Your Homework!"];
    }

    # return response
    return ['id'=>$this->db->insert_id(), 'success'=>"Successfully Submitted Homework!"];
  }
  
#################################################################################################################################
#################################################################################################################################
######################################################  HOMEWORKS   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * fetchStudentHomeworks
   * 
   * @return  array
   */
  public function fetchStudentHomeworks(array $params=[])
  {
    # init var
    $studenthomeworks = [];

    # Build query
    $this->db->select('*')->from('student_homeworks');

    # Filter with student_id
    if(isset($params['student_id']) && !empty($params['student_id'])) {
      $this->db->where('student_id', $params['student_id']);
    }

    # Filter with homework_id
    if(isset($params['homework_id']) && $params['homework_id']!=0) {
      $this->db->where('homework_id', $params['homework_id']);
    }

    # order id
    $this->db->order_by('id','asc');
    
    # run query
    $studenthomeworks =  $this->db->get()->result_array();

    # return response
    return $studenthomeworks;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * fetchTeacherHomeworks
   * 
   * @return  array
   */
  public function fetchTeacherHomeworks(array $params=[])
  {
    # init var
    $sectionsLists = [];
    $data = [];

    # get teacher mappings
    $getTeacherMaps = $this->db->select('*')->from('teachermappings')->where('teacher_id',$params['teacher_id'])->get()->result_array();
    if(!empty($getTeacherMaps)) {
      foreach($getTeacherMaps as $getTeacherMap) {
        # get list of homework sections
        $homeworkSection = $this->db->select('*')->from('homework_sections')->where('homework_id',$params['homework_id'])->where('class_id',$getTeacherMap['class_id'])->where('subject_id',$getTeacherMap['subject_id'])->where('section_id',$getTeacherMap['section_id'])->get()->row_array();
        if(!empty($homeworkSection)) {
          $sectionsLists[] = $homeworkSection;
        }
      }
    }

    # get students & their homeworks
    foreach($sectionsLists as $sectionsList) {
      $temp = [];
      $temp['_class'] = $this->db->select('*')->from('classes')->where('id',$sectionsList['class_id'])->get()->row_array();
      $temp['_section'] = $this->db->select('*')->from('sections')->where('id',$sectionsList['section_id'])->get()->row_array();
      $temp['_subject'] = $this->db->select('*')->from('subjects')->where('id',$sectionsList['subject_id'])->get()->row_array();
      $temp['_students'] = [];
      $students = $this->db->select('*')->from('users')->where('role',"STUDENTS")->where('class_id',$sectionsList['class_id'])->where('section_id',$sectionsList['section_id'])->get()->result_array();
      if(!empty($students)) {
        foreach($students as $student) {
          $student['_homework'] = $this->db->select('*')->from('student_homeworks')->where('student_id',$student['id'])->where('homework_id',$params['homework_id'])->get()->result_array();
          $temp['_students'][] = $student;
        }
      }
      # push to an array
      $data[] = $temp;
    }
    
    # return response
    return $data;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * fetchAdminHomeworks
   * 
   * @return  array
   */
  public function fetchAdminHomeworks(array $params=[])
  {
    # init var
    $sectionsLists = [];
    $data = [];

    # get list of homework sections
    $sectionsLists = $this->db->select('*')->from('homework_sections')->where('homework_id',$params['homework_id'])->get()->result_array();

    # get students & their homeworks
    foreach($sectionsLists as $sectionsList) {
      $temp = [];
      $temp['_class'] = $this->db->select('*')->from('classes')->where('id',$sectionsList['class_id'])->get()->row_array();
      $temp['_section'] = $this->db->select('*')->from('sections')->where('id',$sectionsList['section_id'])->get()->row_array();
      $temp['_subject'] = $this->db->select('*')->from('subjects')->where('id',$sectionsList['subject_id'])->get()->row_array();
      $temp['_students'] = [];
      $students = $this->db->select('*')->from('users')->where('role',"STUDENTS")->where('class_id',$sectionsList['class_id'])->where('section_id',$sectionsList['section_id'])->get()->result_array();
      if(!empty($students)) {
        foreach($students as $student) {
          $student['_homework'] = $this->db->select('*')->from('student_homeworks')->where('student_id',$student['id'])->where('homework_id',$params['homework_id'])->get()->result_array();
          $temp['_students'][] = $student;
        }
      }
      # push to an array
      $data[] = $temp;
    }
    
    # return response
    return $data;
  }
  
}?>