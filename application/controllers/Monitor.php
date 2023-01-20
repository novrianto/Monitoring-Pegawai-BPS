<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->current_user->is_logged) {
            redirect('login');
        }
    }

    public function index()
    {
        $statistics = [];

        $work_unit = $this->db->select('work_unit.*, CONCAT(first_name, \' \', last_name) AS supervisor_name, progress, total_task, ( CASE WHEN (progress > 0) THEN CEIL(progress / total_task) ELSE 0 END ) AS curr_progress')
            ->from('work_unit')
            ->join('users', 'work_unit.supervisor_id = users.user_id', 'inner')
            ->join('( SELECT work_unit_id, sum(progress) AS progress, count(*) AS total_task FROM task GROUP BY work_unit_id ) AS task', 'work_unit.work_unit_id = task.work_unit_id', 'inner')
            ->get()
            ->result_array();

        for ($i = 0; $i < count($work_unit); $i++) {
            $statistics[$work_unit[$i]['work_unit_id']] = $work_unit[$i];
            $statistics[$work_unit[$i]['work_unit_id']]['task'] = [];
        }

        $task = $this->db->select('*')
            ->from('task')
            ->get()
            ->result_array();

        for ($i = 0; $i < count($task); $i++) {
            $statistics[$task[$i]['work_unit_id']]['task'][] = $task[$i];
        }

        // die(var_dump($statistics));

        $data['statistics'] = $statistics;
        $data['content'] = 'pages/monitor/index';
        $this->load->view('index', $data);
    }
}
