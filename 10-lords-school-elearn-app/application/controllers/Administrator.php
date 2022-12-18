<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* ORG       : OM GROUP OF IT SOLUTIONS
* AUTHOR    : Pavan Kumar
* Email     : en.pavankumar@gmail.com
* Contact   : 8520872771
* Project   : LORDS E-LEARN
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

    # Validate
    if(!$this->validate()) {
      redirect('login', 'refresh');
    }
  }

#################################################################################################################################
#################################################################################################################################
#####################################################   DASHBOARD   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Dashboard
   */
  public function Dashboard()
  {
    # Build data
    $data = [];
    $data['page'] = "dashboard";
    $data['item'] = $this->AdminModel->fetchStatistics();
    $this->load->view('admin/dashboard', $data); 
  }
   
#################################################################################################################################
#################################################################################################################################
######################################################   BRANCHES   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Branches
   */
  public function Branches()
  {
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
   */
  public function InsertBranch()
  {
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
   */
  public function DeleteBranch()
  {
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
######################################################   CLASSES   ##############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Classes
   */
  public function Classes()
  {
    # Build data
    $data = [];
    $data['page'] = "classes";
    $data['items'] = $this->AdminModel->fetchClasses();
    $this->load->view('admin/classes', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertClass
   */
  public function InsertClass()
  {
    # Build data to insert
    $body = [];
    $body['class_code'] = $this->input->post('class_code') ?? "";
    $body['class_name']  = $this->input->post('class_name') ?? "";

    # if class_code is empty replace spaces with _
    if(empty($body['class_code'])) {
      $body['class_code'] = strtoupper(str_replace(" ", "_", $body['class_name']));
    } else {
      $body['class_code'] = strtoupper(str_replace(" ", "_", $body['class_code']));
    }

    # insert class
    $insertClass = $this->AdminModel->insertClass($body);
    if(isset($insertClass['success'])) {
      $this->session->set_flashdata('success', $insertClass['success']);
    } else if(isset($insertClass['error'])) {
      $this->session->set_flashdata('error', $insertClass['error']);
    }

    # redirect to add branch page
    redirect('admin/classes', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteClass
   */
  public function DeleteClass()
  {
    # Delete Class
    $deleteClass = $this->AdminModel->deleteClass($this->input->post('class_id') ?? "");
    if(!$deleteClass) {
      $this->session->set_flashdata('error', "Failed To Delete Class!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Class!");
    }

    # redirect to add Class page
    redirect('admin/classes', 'refresh');
  }
  
#################################################################################################################################
#################################################################################################################################
######################################################   SECTIONS   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Sections
   */
  public function Sections()
  {
    # Build data
    $data = [];
    $data['page'] = "sections";
    if($this->session->userdata('role')=="SUPER_ADMIN") {
      $data['branchItems'] = $this->AdminModel->fetchBranches();
      $data['items'] = $this->AdminModel->fetchSections();
    } else {
      $data['items'] = $this->AdminModel->fetchSections(['branch_id'=>$this->session->userdata('branch_id')]);
    }
    $data['classItems'] = $this->AdminModel->fetchClasses();
    $this->load->view('admin/sections', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertSection
   */
  public function InsertSection()
  {
    # make sure class_id exist
    if($this->input->post('class_id') == 0) {
      $this->session->set_flashdata('error', "Please Select The Class!");
      redirect('admin/sections', 'refresh');
    }

    # Build data to insert
    $body = [];
    $body['branch_id'] = $this->input->post('branch_id') ?? $this->session->userdata('branch_id');
    $body['class_id'] = $this->input->post('class_id') ?? 0;
    $body['section_name'] = $this->input->post('section_name') ?? "";
    $body['section_code']  = $this->input->post('section_code') ?? "";

    # if section_code is empty replace spaces with _
    if(empty($body['section_code'])) {
      $body['section_code'] = strtoupper(str_replace(" ", "_", $body['section_name']));
    } else {
      $body['section_code'] = strtoupper(str_replace(" ", "_", $body['section_code']));
    }

    # insert section
    $insertSection = $this->AdminModel->insertSection($body);
    if(isset($insertSection['success'])) {
      $this->session->set_flashdata('success', $insertSection['success']);
    } else if(isset($insertSection['error'])) {
      $this->session->set_flashdata('error', $insertSection['error']);
    }

    # redirect to sections page
    redirect('admin/sections', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: EditSection
   */
  public function EditSection($id)
  {
    # Build data
    $data = [];
    $data['page'] = "sections";
    if($this->session->userdata('role')=="SUPER_ADMIN") {
      $data['branchItems'] = $this->AdminModel->fetchBranches();
    }
    $data['classItems'] = $this->AdminModel->fetchClasses();
    $data['item'] = $this->AdminModel->fetchSections(['id'=>$id])[0];
    $this->load->view('admin/editsection', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: UpdateSection
   */
  public function UpdateSection($id)
  {
    # get section
    $getSection = $this->AdminModel->fetchSections(['id'=>$id])[0];

    # Build data to insert
    $body = [];
    $body['branch_id'] = $this->input->post('branch_id') ?? $getSection['branch_id'];
    $body['class_id'] = $this->input->post('class_id') ?? $getSection['class_id'];
    $body['section_name'] = $this->input->post('section_name') ?? $getSection['section_name'];
    $body['section_code']  = $this->input->post('section_code') ?? $getSection['section_code'];

    # if section_code is empty replace spaces with _
    if(empty($body['section_code'])) {
      $body['section_code'] = strtoupper(str_replace(" ", "_", $body['section_name']));
    } else {
      $body['section_code'] = strtoupper(str_replace(" ", "_", $body['section_code']));
    }

    # update section
    $updateSection = $this->AdminModel->updateSection($id,$body);
    if(isset($updateSection['success'])) {
      $this->session->set_flashdata('success', $updateSection['success']);
    } else if(isset($updateSection['error'])) {
      $this->session->set_flashdata('error', $updateSection['error']);
    }

    # redirect to sections page
    redirect('admin/sections', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteSection
   */
  public function DeleteSection($id)
  {
    # Delete Section
    $deleteSection = $this->AdminModel->deleteSection($id);
    if(!$deleteSection) {
      $this->session->set_flashdata('error', "Failed To Delete Section!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Section!");
    }

    # redirect to sections page
    redirect('admin/sections', 'refresh');
  }
     
#################################################################################################################################
#################################################################################################################################
######################################################   SUBJECTS   #############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Subjects
   */
  public function Subjects()
  {
    # Build data
    $data = [];
    $data['page'] = "subjects";
    $data['classItems'] = $this->AdminModel->fetchClasses();
    $data['items'] = $this->AdminModel->fetchSubjects();
    $this->load->view('admin/subjects', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertSubject
   */
  public function InsertSubject()
  {
    # make sure class_id exist
    if($this->input->post('class_id') == 0) {
      $this->session->set_flashdata('error', "Please Select The Class!");
      redirect('admin/subjects', 'refresh');
    }

    # Build data to insert
    $body = [];
    $body['class_id'] = $this->input->post('class_id') ?? "";
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
   */
  public function DeleteSubject()
  {
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
#####################################################   USERS   #################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Users
   */
  public function Users()
  {
    # Build data
    $data = [];
    $data['page'] = "users";
    if($this->session->userdata('role')=="SUPER_ADMIN") {
      $data['branchItems'] = $this->AdminModel->fetchBranches();
      $data['admins'] = $this->AdminModel->fetchUsers(['role'=>'ADMIN']);
      $data['students'] = $this->AdminModel->fetchUsers(['role'=>'STUDENTS']);
      $teachers = $this->AdminModel->fetchUsers(['role'=>'TEACHERS']);
    } else {
      $data['students'] = $this->AdminModel->fetchUsers(['branch_id'=>$this->session->userdata('branch_id'),'role'=>'STUDENTS']);
      $teachers = $this->AdminModel->fetchUsers(['branch_id'=>$this->session->userdata('branch_id'),'role'=>'TEACHERS']);
    }
    $data['classItems'] = $this->AdminModel->fetchClasses();
    $data['sectionItems'] = $this->AdminModel->fetchSections();

    # add teacher mappings
    if(!empty($teachers)) {
      foreach($teachers as $teacher) {
        $teacher['_mappings'] = $this->AdminModel->fetchTeacherMappings(['teacher_id'=>$teacher['id']]);
        $data['teachers'][] = $teacher;
      }
    }

    # return data to users view
    $this->load->view('admin/users', $data);
  }
 
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#
  
  /**
   * Method: InsertUser
   */
  public function InsertUser()
  {
    # By default image path
    $imagePath = "";

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      # upload image
      $filename = "uploads/users/images/user_".rand(1,1000000000);
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

    # make sure branch_id exist
    if($this->session->userdata('role')=="SUPER_ADMIN") {
      if($this->input->post('branch_id') == 0) {
        $this->session->set_flashdata('error', "Please Select The Branch!");
        redirect('admin/users', 'refresh');
      }
    }

    # make sure class_id & section_id exist if role is student
    if($this->input->post('role') == "STUDENT"){
      # make sure class_id is not 0
      if($this->input->post('class_id') == 0) {
        $this->session->set_flashdata('error', "Please Select The Class!");
        redirect('admin/users', 'refresh');
      }
      
      # make sure section_id is not 0
      if($this->input->post('section_id') == 0) {
        $this->session->set_flashdata('error', "Please Select The Section!");
        redirect('admin/users', 'refresh');
      }  
    }
      
    # parameters
    $body = [];
    $body['uuid'] = $this->UUID();
    $body['name'] = trim($this->input->post("name") ?? "");
    $body['father_name'] = trim($this->input->post("father_name") ?? "");
    $body['email'] = "";
    $body['mobile'] = trim($this->input->post("mobile") ?? "");
    $body['role'] = trim($this->input->post("role") ?? "");
    $body['branch_id'] = $this->input->post("branch_id") ?? $this->session->userdata('branch_id');
    $body['class_id'] = $this->input->post("class_id") ?? 0;
    $body['section_id'] = $this->input->post("section_id") ?? 0;
    $body['image'] = $imagePath;

    # insert User
    $insertUser = $this->AdminModel->insertUser($body);
    if(isset($insertUser['success'])) {
      $this->session->set_flashdata('success', $insertUser['success']);
    } else if(isset($insertUser['error'])) {
      $this->session->set_flashdata('error', $insertUser['error']);
    }

    # redirect to users page
    redirect('admin/users', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: EditUser
   * 
   * @todo edit student class & section
   */
  public function EditUser($id)
  {
    # Build data
    $data = [];
    $data['page'] = "users";
    if($this->session->userdata('role')=="SUPER_ADMIN") {
      $data['branchItems'] = $this->AdminModel->fetchBranches();
    }
    $data['classItems'] = $this->AdminModel->fetchClasses();
    $data['sectionItems'] = $this->AdminModel->fetchSections();
    $data['item'] = $this->AdminModel->fetchUsers(['id'=>$id])[0];
    $this->load->view('admin/edituser', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: UpdateUser
   */
  public function UpdateUser($id)
  {
    # get user
    $getUser = $this->AdminModel->fetchUsers(['id'=>$id])[0];

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      if(!empty($getUser['image'])) {
        # get filename
        $filename = basename($getUser['image']);
        # remove old path
        unlink("uploads/users/images/".$filename);
      }

      # upload image
      $filename = "uploads/users/images/user_".rand(1,1000000000);
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
    $body['name'] = trim($this->input->post("name") ?? "");
    $body['father_name'] = trim($this->input->post("father_name") ?? "");
    $body['mobile'] = trim($this->input->post("mobile") ?? "");
    $body['role'] = trim($this->input->post("role") ?? "");
    $body['branch_id'] = $this->input->post("branch_id") ?? $this->session->userdata('branch_id');
    $body['class_id'] = $this->input->post("class_id") ?? $getUser['class_id'];
    $body['section_id'] = $this->input->post("section_id") ?? $getUser['section_id'];
    if(!empty($_FILES["image"]["name"])) $body['image'] = $imagePath;

    # insert user
    $updateUser = $this->AdminModel->updateUser($id,$body);
    if(isset($updateUser['success'])) {
      $this->session->set_flashdata('success', $updateUser['success']);
    } else if(isset($updateUser['error'])) {
      $this->session->set_flashdata('error', $updateUser['error']);
    }

    # redirect to users page
    redirect('admin/users', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteUser
   */
  public function DeleteUser($id)
  {
    # Delete User
    $deleteUser = $this->AdminModel->deleteUser($id);
    if(!$deleteUser) {
      $this->session->set_flashdata('error', "Failed To Delete User!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted User!");
    }

    # redirect to users page
    redirect('admin/users', 'refresh');
  }
  
#################################################################################################################################
#################################################################################################################################
############################################  TEACHER MAPPINGS   ################################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: TeacherMappings
   */
  public function TeacherMappings($id)
  {
    # get teacher
    $getTeacher = $this->AdminModel->fetchUsers(['id'=>$id])[0];

    # Build data
    $data = [];
    $data['page'] = "users";
    $data['classItems'] = $this->AdminModel->fetchClasses();
    $data['sectionItems'] = $this->AdminModel->fetchSections(['branch_id'=>$getTeacher['branch_id']]);
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['teacher'] = $getTeacher;
    $data['items'] = $this->AdminModel->fetchTeacherMappings(['teacher_id'=>$id]);

    # load data & send to view teacher
    $this->load->view('admin/teachermappings', $data);
  }
   
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

/**
   * Method: InsertTeacherMappings
   */
  public function InsertTeacherMappings()
  {
    # get teacher id
    $teacherId = $this->input->post("teacher_id");

    # make sure class_id exist & not 0
    if($this->input->post('class_id') == 0) {
      $this->session->set_flashdata('error', "Please Select The class!");
      redirect('admin/teacher/$id', 'refresh');
    }

    # make sure section_id exist & not 0
    if($this->input->post('section_id') == 0) {
      $this->session->set_flashdata('error', "Please Select The Section!");
      redirect('admin/teacher/$id', 'refresh');
    }

    # make sure subject_id exist & not 0
    if($this->input->post('subject_id') == 0) {
      $this->session->set_flashdata('error', "Please Select The Subject!");
      redirect('admin/teacher/$id', 'refresh');
    }

    # get user
    $getUser = $this->AdminModel->fetchUsers(['id'=>$teacherId])[0];

    # parameters
    $body = [];
    $body['branch_id'] = $getUser['branch_id'];
    $body['teacher_id'] = $teacherId;
    $body['class_id'] = $this->input->post("class_id");
    $body['section_id'] = $this->input->post("section_id");
    $body['subject_id'] = $this->input->post("subject_id");
    
    # insert Teacher Mappings
    $insertTeacherMappings = $this->AdminModel->insertTeacherMappings($body);
    if(isset($insertTeacherMappings['success'])) {
      $this->session->set_flashdata('success', $insertTeacherMappings['success']);
    } else if(isset($insertTeacherMappings['error'])) {
      $this->session->set_flashdata('error', $insertTeacherMappings['error']);
    }

    # redirect to teacher mappings page
    redirect('admin/teacher/mappings/'.$teacherId, 'refresh');
  }
 
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteTeacherMapping
   */
  public function DeleteTeacherMapping($teacherId, $id)
  {
    # Delete Teacher Mapping
    $deleteTeacherMapping = $this->AdminModel->deleteTeacherMapping($id);
    if(!$deleteTeacherMapping) {
      $this->session->set_flashdata('error', "Failed To Delete Teacher Mapping!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Teacher Mapping!");
    }

    # redirect to teacher mappings page
    redirect('admin/teacher/mappings/'.$teacherId, 'refresh');
  }
    
#################################################################################################################################
#################################################################################################################################
###################################################  HOME WORKS   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Homeworks
   */
  public function Homeworks()
  {
    # Build data
    $data = [];
    $data['page'] = "homeworks";
    $data['classItems'] = $this->AdminModel->fetchClasses();
    $data['sectionItems'] = $this->AdminModel->fetchSections();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['items'] = $this->AdminModel->fetchHomeWorks();
    $this->load->view('admin/homeworks', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertHomework
   */
  public function InsertHomework()
  {
    # By default image path
    $imagePath = "";

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      # upload image
      $filename = "uploads/homeworks/teachers/images/homework_".rand(1,1000000000);
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
    $body['uuid'] = $this->UUID();
    $body['homework_on'] = $this->input->post("homework_on") ?? date('Y-m-d');
    $body['title'] = trim($this->input->post("title") ?? "");
    $body['description'] = trim($this->input->post("description") ?? "");
    $body['image'] = $imagePath;

    # insert 
    $insertHomework = $this->AdminModel->insertHomework($body);
    if(isset($insertHomework['success'])) {
      # create homework sections mappings
      $sections = $this->input->post("sections") ?? [];
      if(!empty($sections)) {
        $this->AdminModel->insertHomeworkMap($insertHomework['id'],$sections);
      }
      # set success
      $this->session->set_flashdata('success', $insertHomework['success']);  
    } else if(isset($insertHomework['error'])) {
      $this->session->set_flashdata('error', $insertHomework['error']);
    }

    # redirect to homeworks page
    redirect('admin/homeworks', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: EditHomework
   */
  public function EditHomework($id)
  {
    # Build data
    $data = [];
    $data['page'] = "homeworks";
    $data['classItems'] = $this->AdminModel->fetchClasses();
    $data['sectionItems'] = $this->AdminModel->fetchSections();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['item'] = $this->AdminModel->fetchHomeworks(['id'=>$id])[0];
    $this->load->view('admin/edithomework', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: UpdateHomework
   */
  public function UpdateHomework($id)
  {
    # get home work
    $getHomework = $this->AdminModel->fetchHomeworks(['id'=>$id])[0];

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      if(!empty($getHomework['image'])) {
        # get filename
        $filename = basename($getHomework['image']);
        # remove old path
        unlink("uploads/homeworks/teachers/images/".$filename);
      }

      # upload image
      $filename = "uploads/homeworks/teachers/images/homework_".rand(1,1000000000);
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
    $body['homework_on'] = $this->input->post("homework_on") ?? $getHomework['homework_on'];
    $body['title'] = trim($this->input->post("title") ?? $getHomework['title']);
    $body['description'] = trim($this->input->post("description") ?? $getHomework['description']);
    if(!empty($_FILES["image"]["name"])) $body['image'] = $imagePath;

    # insert 
    $updateHomework = $this->AdminModel->updateHomework($id,$body);
    if(isset($updateHomework['success'])) {
      # create homework sections mappings
      $sections = $this->input->post("sections") ?? [];
      if(!empty($sections)) {
        $this->AdminModel->insertHomeworkMap($id,$sections);
      }
      # set success
      $this->session->set_flashdata('success', $updateHomework['success']);  
    } else if(isset($updateHomework['error'])) {
      $this->session->set_flashdata('error', $updateHomework['error']);
    }

    # redirect to homeworks page
    redirect('admin/homeworks', 'refresh');
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: DeleteHomework
   */
  public function DeleteHomework($id)
  {
    # Delete User
    $deleteHomework = $this->AdminModel->deleteHomework($id);
    if(!$deleteHomework) {
      $this->session->set_flashdata('error', "Failed To Delete Homework!");
    } else {
      $this->session->set_flashdata('success', "Successfully Deleted Homework!");
    }

    # redirect to homeworks page
    redirect('admin/homeworks', 'refresh');
  }

#################################################################################################################################
#################################################################################################################################
###################################################  HOME WORKS   ###############################################################
#################################################################################################################################
#################################################################################################################################

  /**
   * Method: Posts
   */
  public function Posts()
  {
    # Build data
    $data = [];
    $data['page'] = "posts";
    $data['classItems'] = $this->AdminModel->fetchClasses();
    $data['sectionItems'] = $this->AdminModel->fetchSections();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['items'] = $this->AdminModel->fetchPosts();
    $this->load->view('admin/posts', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: InsertPost
   */
  public function InsertPost()
  {
    # By default image path
    $filepath = "";
    $imagePath = "";

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      # upload image
      $filename = "uploads/posts/images/images_".rand(1,1000000000);
      $uploadImage = $this->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to posts page
        redirect('admin/posts', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # Upload file if not empty
    if(!empty($_FILES["file"]["name"])) {

      # upload file
      $filename = "uploads/posts/files/document_".rand(1,1000000000);
      $uploadFile = $this->uploadFile($filename);
      if(isset($uploadFile['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadFile['error']);
        # redirect to posts page
        redirect('admin/posts', 'refresh');
      }

      # file path
      $filepath = $uploadFile['path'];
    }
    
    # parameters
    $body = [];
    $body['uuid'] = $this->UUID();
    $body['post_on'] = $this->input->post("post_on") ?? date('Y-m-d');
    $body['title'] = trim($this->input->post("title") ?? "");
    $body['description'] = trim($this->input->post("description") ?? "");
    $body['post_type'] = trim($this->input->post("post_type") ?? "");
    $body['filepath'] = $filepath;
    $body['image'] = $imagePath;
    $body['youtube_url'] = trim($this->input->post("youtube_url") ?? "");
    $body['status'] = $this->input->post("status") ?? 1;

    # insert 
    $insertPost = $this->AdminModel->insertPost($body);
    if(isset($insertPost['success'])) {
      # create post sections mappings
      $sections = $this->input->post("sections") ?? [];
      if(!empty($sections)) {
        $this->AdminModel->insertPostMap($insertPost['id'],$sections);
      }
      # set success
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
   */
  public function EditPost($id)
  {
    # Build data
    $data = [];
    $data['page'] = "posts";
    $data['classItems'] = $this->AdminModel->fetchClasses();
    $data['sectionItems'] = $this->AdminModel->fetchSections();
    $data['subjectItems'] = $this->AdminModel->fetchSubjects();
    $data['item'] = $this->AdminModel->fetchPosts(['id'=>$id])[0];
    $this->load->view('admin/editpost', $data);
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: UpdatePost
   */
  public function UpdatePost($id)
  {
    # get post
    $getPost = $this->AdminModel->fetchPosts(['id'=>$id])[0];

    # Upload image if not empty
    if(!empty($_FILES["image"]["name"])) {

      if(!empty($getPost['image'])) {
        # get filename
        $filename = basename($getPost['image']);
        # remove old path
        unlink("uploads/posts/images/".$filename);
      }

      # upload image
      $filename = "uploads/posts/images/images_".rand(1,1000000000);
      $uploadImage = $this->uploadImage($filename);
      if(isset($uploadImage['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadImage['error']);
        # redirect to posts page
        redirect('admin/posts', 'refresh');
      }

      # image path
      $imagePath = $uploadImage['path'];
    }

    # Upload file if not empty
    if(!empty($_FILES["file"]["name"])) {

      if(!empty($getPost['filepath'])) {
        # get filename
        $filename = basename($getPost['filepath']);
        # remove old path
        unlink("uploads/posts/files/".$filename);
      }

      # upload file
      $filename = "uploads/posts/files/documents_".rand(1,1000000000);
      $uploadFile = $this->uploadFile($filename);
      if(isset($uploadFile['error'])) {
        # set error message
        $this->session->set_flashdata('error', $uploadFile['error']);
        # redirect to posts page
        redirect('admin/posts', 'refresh');
      }

      # File path
      $filePath = $uploadFile['path'];
    }

    # parameters
    $body = [];
    $body['post_on'] = $this->input->post("post_on") ?? $getPost['post_on'];
    $body['title'] = trim($this->input->post("title") ?? $getPost['title']);
    $body['description'] = trim($this->input->post("description") ?? $getPost['description']);
    $body['post_type'] = trim($this->input->post("post_type") ?? $getPost['post_type']);
    if(!empty($_FILES["file"]["name"])) $body['filepath'] = $filePath;
    if(!empty($_FILES["image"]["name"])) $body['image'] = $imagePath;
    $body['youtube_url'] = trim($this->input->post("youtube_url") ?? $getPost['youtube_url']);
    $body['status'] = $this->input->post("status") ?? $getPost['status'];
    
    # Update 
    $updatePost = $this->AdminModel->updatePost($id,$body);
    if(isset($updatePost['success'])) {
      # create Post sections mappings
      $sections = $this->input->post("sections") ?? [];
      if(!empty($sections)) {
        $this->AdminModel->insertPostMap($id,$sections);
      }
      # set success
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
   */
  public function DeletePost($id)
  {
    # Delete User
    $deletePost = $this->AdminModel->DeletePost($id);
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
   * Method Name : UUID
   * Description : Generate our own uuid's
   * 
   * @param   boolean   $trim - false
   * 
   * @return  string    UUID
   */
  public function UUID($trim = false)
  {
    # Format
    $format = ($trim == false) ? '%04x%04x-%04x-%04x-%04x-%04x%04x%04x' : '%04x%04x%04x%04x%04x%04x%04x%04x';

    # generate UUID
    $uuid = sprintf($format,
      # 32 bits for "time_low"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),
      # 16 bits for "time_mid"
      mt_rand(0, 0xffff),
      # 16 bits for "time_hi_and_version", four most significant bits holds version number 4
      mt_rand(0, 0x0fff) | 0x4000,
      # 16 bits, 8 bits for "clk_seq_hi_res", 8 bits for "clk_seq_low", two most significant bits holds zero and one for variant DCE1.1
      mt_rand(0, 0x3fff) | 0x8000,
      # 48 bits for "node"
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
    
    return $uuid ?? "";
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

  /**
   * Method: validate user
   */
  public function validate()
  {
    # make sure session exist
    if(empty($this->session->userdata('mobile'))) return false;

    # make sure role is either admin/superadmin
    if($this->session->userdata('role') != "SUPER_ADMIN" && $this->session->userdata('role') != "ADMIN") {
      return false;
    }
    
    # return success
    return true;
  }
  
#*******************************************************************************************************************************#
#*******************************************************************************************************************************#

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

  /**
   * Method: uploadFile
   * 
   * @return  array  File path
   */
  public function uploadFile($filename)
  {
    # Init var
    $result = [];

    # get file extension
    $fileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
    
    # upload file
    if (!move_uploaded_file($_FILES["file"]["tmp_name"], $filename.".".$fileType)) {
      return ['error'=>"Sorry, there was an error uploading your file!"];
    }

    # Build response
    $result['path'] = base_url().$filename.".".$fileType;
    
    # return result
    return $result;
  }
  
}?>