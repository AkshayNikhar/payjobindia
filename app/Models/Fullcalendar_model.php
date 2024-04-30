<?php
namespace App\Models;

use CodeIgniter\Model;

class Fullcalendar_model extends Model
{
    protected $table = 'events'; // Specify the table name

    protected $primaryKey = 'id'; // Specify the primary key if it's different from 'id'

    protected $useAutoIncrement = true; // Set to true if your primary key is auto-incremented

    protected $allowedFields = ['title', 'start_event', 'end_event']; // List of fields that can be manipulated

    public function fetch_all_event()
    {
        return $this->orderBy('id')->findAll(); // Use the 'findAll' method to retrieve all records
    }

    public function insert_event($data)
    {
        return $this->insert($data); // Use the 'insert' method to insert data
    }

    public function update_event($id, $data)
    {
        return $this->set($data)
                    ->where('id', $id)
                    ->update(); // Use the 'set' and 'update' methods to update data
    }

    public function delete_event($id)
    {
        return $this->where('id', $id)
                    ->delete(); // Use the 'delete' method to delete records
    }
}


?>