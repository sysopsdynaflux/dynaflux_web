<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Front_Controller extends Base_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->context->Init(Context::FRONT_OFFICE);
        $this->data['ajax'] = false;
        
        $this->load->model('project_model');
        $this->load->model('product_model');
        $this->load->model('menu_model');
        $this->load->model('download_model');
        $this->load->model('news_model');

        $this->load->model('path_model');
        $this->data['termsPath'] = $this->path_model->GetPathByReference('terms');
        
        $this->data['downloads'] = $this->download_model->GetDownloads();
        $this->data['topMenu'] = $this->menu_model->GetFullMenuByName('Top');
        $this->data['prefooter'] = true;
    }

    function LoadView($view, $data = array())
    {
        $data = !empty($data) ? $data : $this->data;

        $this->load->view('front/common/header', $data);
        $this->load->view('front/'.$view, $data);
        $this->load->view('front/common/footer', $data);
    }
}