<?php
namespace App\Controllers;
use App\Models\Fullcalendar_model;

class FullCalendar extends BaseController
{
    public function __construct()
    {
        $this->fullcalendarModel = new \App\Models\Fullcalendar_model();
    }

    public function index()
    {
        return view('farmer/calendar');
    }

    public function load()
    {
        // $fullcalendarModel = new \App\Models\Fullcalendar_model();
        $eventData = $this->fullcalendarModel->fetch_all_event();
        //  print_r($eventData);exit;
        $data = [];

        foreach ($eventData as $row) {
            $data[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'start' => $row['start_event'],
                'end' => $row['end_event']
            ];
        }
        //
        return json_encode($data);
    }

    public function insert()
    {
        if ($this->request->getPost('title')) {
            $data = [
                'title' => $this->request->getPost('title'),
                'start_event' => $this->request->getPost('start'),
                'end_event' => $this->request->getPost('end')
            ];
            // print_r($data);exit;
             $this->fullcalendarModel->insert_event($data);
            
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $title = $this->request->getPost('title');
        $start = $this->request->getPost('start');
        $end = $this->request->getPost('end');

        if ($id && $title && $start && $end) {
            $data = [
                'title' => $title,
                'start_event' => $start,
                'end_event' => $end,
            ];

            $this->fullcalendarModel->update_event($id, $data);
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');

        if ($id) {
            $this->fullcalendarModel->delete_event($id);
        }
    }
}
