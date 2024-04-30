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
	
	public function getLastQuery()
    {
        return $this->db->getLastQuery();
    }
    
    
    
    //search start
    // protected $table = 'jobs_list';
    public function getStateList()
    {
        return $this->allFetchd('location_states', array('is_active' => 1));
    }

    public function getCityList()
    {
        return $this->allFetchd('location_cities', array('is_active' => 1));
    }

    /*public function searchJobs($jobTitle,$stateId, $cityId)
    {
        $builder = $this->db->table('jobs_list');
        $builder->select('*');
        $builder->where('is_active', 1);
        
        if (!empty($jobTitle)) {
            $builder->like('title', $jobTitle);
        }
        
        if (!empty($stateId)) {
        $builder->where('state_id', $stateId);
        }
        
        
        if (!empty($cityId)) {
            $builder->where('city_id', $cityId);
        }
        
        
        // echo $this->getLastQuery(); exit;
        return $builder->get()->getResultArray();
    }*/
    
    public function searchJobs($jobTitle, $cityId)
    {
        $builder = $this->db->table('jobs_list');
        $builder->select('*');
        $builder->where('is_active', 1);
    
        if (!empty($jobTitle)) {
            $builder->like('title', $jobTitle);
        }
    
        if (!empty($cityId)) {
            $builder->where('city_id', $cityId);
        }
        
        // print_r($builder);exit;
    // echo $this->getLastQuery(); exit;
        return $builder->get()->getResultArray();
    }

    
    /*public function searchJobs($jobTitle, $stateId, $cityId)
    {
    $builder = $this->db->table('jobs_list');
    $builder->select('jobs_list.*, cities.city_name, states.state_name');
    $builder->join('cities', 'cities.id = jobs_list.city_id', 'left');
    $builder->join('states', 'states.id = jobs_list.state_id', 'left');
    $builder->where('jobs_list.is_active', 1);

     if (!empty($jobTitle)) {
        $builder->groupStart(); // Group the LIKE conditions
        $builder->like('jobs_list.title', $jobTitle);
        $builder->orLike('jobs_list.another_column', $jobTitle); // Add more conditions if needed
        $builder->groupEnd(); // End the grouped conditions
    }

    if (!empty($stateId)) {
        $builder->where('jobs_list.state_id', $stateId);
    }

    if (!empty($cityId)) {
        $builder->where('jobs_list.city_id', $cityId);
    }

    $result = $builder->get();

    if ($result) {
        return $result->getResultArray();
    } else {
        // Log or handle the error appropriately
        return [];
    }
}*/


    //search end
    
    
    public function fetchCompaniesByDate($companyName, $stateId, $cityId,$startDate, $endDate)
    {
        /*return $this->db->table('companies')
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->get()
            ->getResult();*/
            
        $query = $this->db->table('companies');
         
        if (!empty($companyName)) {
            $query->like('company_name', $companyName);
        }
    
        if (!empty($stateId)) {
            $query->where('state_id', $stateId);
        }
    
        if (!empty($cityId)) {
            $query->where('city_id', $cityId);
        }
    
        if (!empty($startDate)) {
            $query->where('created_at >=', $startDate);
        }
    
        if (!empty($endDate)) {
            $query->where('created_at <=', $endDate);
        }
        
        return $query->get()->getResult();
    }
    
    public function fetchFilteredCandidates($candidateName, $stateId, $cityId, $startDate, $endDate)
    {
        $query = $this->db->table('users');
         
        if (!empty($candidateName)) {
            $query->like('name', $candidateName);
        }
    
        if (!empty($stateId)) {
            $query->where('state', $stateId);
        }
    
        if (!empty($cityId)) {
            $query->where('city', $cityId);
        }
    
        if (!empty($startDate)) {
            $query->where('created_at >=', $startDate);
        }
    
        if (!empty($endDate)) {
            $query->where('created_at <=', $endDate);
        }
        // echo $this->db->getLastQuery();exit;
        // print_r($query);exit;
        // Get the SQL query
        // $sql = $query->getCompiledSelect();
    
        // Get the bindings
        // $bindings = $query->getBinds();
    
        // echo "SQL Query: $sql";
        // echo "Bindings: " . print_r($bindings, true);
    
        return $query->get()->getResult();
    }
    
    public function fetchJobsByDate($startDate, $endDate, $city, $type)
    {
        return $this->db->table('jobs_list')
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->get()
            ->getResult();
    }
    
    public function fetchVendorByDate($vendorName, $stateId, $cityId, $startDate, $endDate)
    {
        /*return $this->db->table('vendor')
            ->where('created >=', $startDate)
            ->where('created <=', $endDate)
            ->get()
            ->getResult();*/
            
        $query = $this->db->table('vendor');
         
        if (!empty($vendorName)) {
            $query->like('name', $vendorName);
        }
    
        if (!empty($stateId)) {
            $query->where('state', $stateId);
        }
    
        if (!empty($cityId)) {
            $query->where('city', $cityId);
        }
    
        if (!empty($startDate)) {
            $query->where('created >=', $startDate);
        }
    
        if (!empty($endDate)) {
            $query->where('created <=', $endDate);
        }    
        
        return $query->get()->getResult();
    }
    
    
    public function getCityIdByName($cityName,$stateName)
    {
        $cityQuery = $this->db->table('location_cities')
                            ->select('id')
                            ->join('location_states', 'location_cities.state_id = location_states.id')
                            ->where('location_cities.name', $cityName)
                            ->where('location_states.name', $stateName)
                            ->get();
        print_r($cityQuery);exit;
        // Check if the query was successful
        if ($cityQuery) {
            $city = $cityQuery->getRow();
            return $city ? $city->id : null;
        } else {
            // Handle the case where the query failed
            // You may want to log the error or return an appropriate value
            return null;
        }
    }


    
    
//end here
}
