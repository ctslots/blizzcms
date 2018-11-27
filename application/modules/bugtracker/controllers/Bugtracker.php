<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bugtracker extends MX_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!ini_get('date.timezone'))
           date_default_timezone_set($this->config->item('timezone'));

        if(!$this->m_permissions->getMaintenance())
            redirect(base_url(),'refresh');

        if (!$this->m_modules->getStatusLadBugtracker())
            redirect(base_url(),'refresh');

        if (!$this->m_permissions->getMyPermissions('Permission_Bugtracker'))
            redirect(base_url(),'refresh');
        
        $this->load->config('bugtracker');
        $this->load->model('bugtracker_model');
    }

    public function index()
    {

        if($this->m_permissions->getIsAdmin($this->session->userdata('fx_sess_id')))
            $tiny = $this->m_general->tinyEditor('pluginsADM', 'toolbarADM');
        else
            $tiny = $this->m_general->tinyEditor('pluginsUser', 'toolbarUser');

        $data = array(
            'fxtitle' => $this->lang->line('nav_bugtracker'),
            'tiny' => $tiny,
            'fx_adds' => '<div class="uk-container">'
        );

        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer');
        $this->load->view('modal');
    }

    public function post($id)
    {
        if (empty($id) || is_null($id) || $id == '0')
            redirect(base_url(),'refresh');

        if (!$this->m_modules->getStatusLadBugtracker())
            redirect(base_url(),'refresh');

        $data['idlink'] = $id;
        $data['fxtitle'] = $this->lang->line('nav_bugtracker');

        $this->load->view('header', $data);
        $this->load->view('post', $data);
        $this->load->view('footer');
    }

    public function pagination()
    {
        $this->load->model('bugtracker_model');

        $config = $this->m_general->getStylesPagination(10, $this->bugtracker_model->count_all());

        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];

        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'bugtracker_table'   => $this->bugtracker_model->fetch_details($config["per_page"], $start)
        );

        echo json_encode($output);
    }

    public function create()
    {
        $title = $_POST['bug_title'];
        $type = $_POST['bug_type'];
        $desc = $_POST['bug_description'];
        $url = $_POST['bug_url'];

        $this->bugtracker_model->insertIssue($title, $type, $desc, $url);
    }
}
