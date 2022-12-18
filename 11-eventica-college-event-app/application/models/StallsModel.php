<?php
if(! defined('BASEPATH')) exit ('No direct script access allowed');

class SponsorsModel extends CI_Model {

  public function __construct(){
      parent::__construct();
      $this->table = 'stalls';
  }

  /**
   * Method Name : fetch
   * Description : fetch all records based on params
   * 
   * @param  array $params List of params
   * 
   * @return  array response
   */
  public function fetch($params)
  {
    # Query builder
    $this->db->select('*')->from($this->table);

    # stall_id
    if(isset($params['stall_id']) && strlen($params['stall_id']) > 0) $this->db->where('stall_id', $params['stall_id']);
    
    # Pagination
    if( isset($params['limit']) && isset($params['start']) && strlen($params['limit']) > 0 && strlen($params['start']) > 0) $this->db->limit($params['limit'], $params['start']);

    # result query
    $query = $this->db->get()->result();

    # Initialize array
    $data = [];

    # foreach all records
    foreach($query as $item) {
      $data[] = $item;
    }

    return $data;
  }

  /**
   * Method Name : create
   * Description : create a new record
   * 
   * @param  array $input post body
   * 
   * @return  array response
   */
  public function create(array $input)
  {
    # Create array
    $data=array(
      'stall_name'=>$input['stall_name'],
      'stall_organized_by'=>$input['stall_organized_by'],
      'stall_description'=>$input['stall_description'],
      'event_id'=>$input['event_id'],
      'stall_created_on'=>date('Y-m-d H:i:s'),
      'stall_modified_on'=>date('Y-m-d H:i:s')
    );

    # Initialize array
    $result = [];

    $insert = $this->db->insert($this->table,$data);
    if($insert) {
      $insertedId = $this->db->insert_id();
      $result = $this->fetch(['id' => $insertedId]);
    } else {
      $result['message'] = 'Failed To Add New Record';
    }

    return $result;
  }

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
  public function update(int $id, array $input)
  {
    # Initialize array
    $result = [];

    # Check id exist
    $entity = $this->fetch(['id'=>$id]);

    # Error check if no record found with given ID
    if(empty($entity)) {
      $data['message']='No Record Found With This ID';
    }

    # Create Image
    if(!empty($input['event_image_path'])) {
      # Create Image
      $eventUrl = $this->LibraryModel->uploadEventImg($input['event_title'],$input['event_image_path']);
    } else {
      $eventUrl = "";
    }  

    # Create array
    $data=array(
      'stall_name'=>$input['stall_name'],
      'stall_organized_by'=>$input['stall_organized_by'],
      'stall_description'=>$input['stall_description'],
      'event_id'=>$input['event_id'],
      'stall_modified_on'=>date('Y-m-d H:i:s')
    );

    # Update data
    $update = $this->db->where('id',$id)->update($this->table,$data);

    # Error check if failed to update
    if(!$update) {
      $result['message']='Failed To Update Record';
    }

    # Get updated Data
    $result = $this->fetch(['id'=>$id]);

    return $result;
  }

  /**
   * Method Name : delete
   * Description : delete a record
   * 
   * @param  int   $id   ID
   * 
   * @return  boolean True / False
   */
  public function delete(int $id)
  {
    # Check id exist
    $fetchId = $this->fetch(['id', $id]);

    # Error check if no record found with given ID
    if(empty($fetchId)) {
      $data['message']='No Record Found With This ID';
    }

    # Initialize variable with false result
    $result = FALSE;

    # Delete data
    $delete = $this->db->delete($this->table, ['id' => $id]);
    
    # Error check if failed to delete
    if(!$delete) {
      $result = FALSE;
    } else {
      $result = TRUE;
    }

    return $result;
  }

}
?>