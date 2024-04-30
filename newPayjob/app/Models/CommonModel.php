<?php

namespace App\Models;

use CodeIgniter\Model;

class CommonModel extends Model
{

	public function insertData($table,$data=array())
	{
      $query = $this->db->table($table);
	  $result = $query->insert($data);
      return  $this->db->insertID();
	}

	public function updateData($table,$data =array(),$condition= array())
	{
			$query = $this->db->table($table);
			return  $query->update($data, $condition);
		 
	}

	public function deleteData($table,$condition =array())
	{
			$query= $this->db->table($table);
			return  $query->delete($condition);  
	}
	
	// fetch single record
	public function fs($table,$condition= array())
	{
		$query= $this->db->table($table);
		return $query->getWhere($condition)->getrow();
	}

	public function fs_desc($table,$condition= array(),$column = 'id',$sort_order = 'desc')
	{
		$query= $this->db->table($table);
		return $query->orderBy($column,$sort_order)->getWhere($condition)->getrow();
	}

	public function allFetch($table,$condition= array(),$column = 'id',$sort_order = 'asc',$limit = NULL,$offset = NULL)
	{		
		$query= $this->db->table($table);
		return $query->orderBy($column,$sort_order)->getWhere($condition,$limit,$offset)->getResult();
	}
    public function allFetchd($table,$condition= array(),$column = 'id',$sort_order = 'desc',$limit = NULL,$offset = NULL)
	{		
		$query= $this->db->table($table);
		return $query->orderBy($column,$sort_order)->getWhere($condition,$limit,$offset)->getResult();
		
	}
    public function all_fetch_array($table,$condition= array(),$column = 'id',$sort_order = 'asc',$limit = NULL,$offset = NULL)
	{		
		$query= $this->db->table($table);
		return $query->orderBy($column,$sort_order)->getWhere($condition,$limit,$offset)->getResult('array');
		
	}

	public function allCount($table,$condition= array())
	{
		$query= $this->db->table($table);
		return $query->where($condition)->countAllResults();
		
	}
	
//end here
}
