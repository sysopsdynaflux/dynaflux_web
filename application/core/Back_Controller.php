<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* Form Class for Admin */
class Back_Controller extends Base_Controller
{
	protected $viewList;
    protected $viewForm;
    protected $instances;

	function __construct()
	{
		parent::__construct();

        $this->context->Init(Context::BACK_OFFICE);

        if($this->context->isLoggedIn() == FALSE) 
        {
           redirect('back/auth/login');
        }

        $this->lang->load('form_validation');
        $this->lang->load('upload');
        $this->lang->load('email');
        
        $this->relationships = array();
	}

	/* Index */
	function index()
	{
        $this->SetContext(func_get_args());
		$this->list_all();
	}

	/* 
	 * Create register
	 */
	function create()
	{
        $this->SetContext(func_get_args());
        $this->data['formAction'] = 'save';
		$this->load->view('back/common/header', $this->data);
        $this->load->view('back/'.$this->viewForm, $this->data);
        $this->load->view('back/common/footer', $this->data);
	}

    /*
	 * Edit register
	 */
    function edit($id=null)
    {
        $this->SetContext(func_get_args());

        $this->data['formAction'] = "update/$id";
        if($id != null) $this->data['entity'] = $this->entity_model->get_entry($id, $this->instances);
        $this->load->view('back/common/header', $this->data);
        $this->load->view('back/'.$this->viewForm, $this->data);
        $this->load->view('back/common/footer', $this->data);
    }

    /**
     * Save a register, form submitted
     */
    function save()
    {
        $this->form_validation->set_rules($this->_get_rules());

        if($this->form_validation->run()){
            $entity = $this->_from_form();
            $this->data['save'] = $this->entity_model->insert_entity($entity);
            $this->data['actionPerformed'] = 'save';
            $this->success($entity);
        }
        else {
            $this->create();
        }
    }

    /**
	 * Update register
	 */
	function update()
	{
        $this->form_validation->set_rules($this->_get_rules());
        if($this->form_validation->run()){
            $entity = $this->_from_form();

            $this->data['update'] = $this->entity_model->update_entry($entity);
            
            $this->data['actionPerformed'] = 'update';
            $this->success($entity);
        }
        else {
            $this->_set_data();
            $this->edit();
        }
	}

	/**
	 * Delete register
	 */
	function remove($id = null, $confirm = null)
	{
        $this->SetContext(func_get_args());

         $this->load->view('back/common/header', $this->data);
        if(!$confirm){
            $this->data['remove'] = $this->entity_model->remove_entry($id);
            $this->data['actionPerformed'] = 'remove';
            $this->_set_success_message($this->entity_model->create_instance($id),true);
            $this->load->view('back/common/success_message', $this->data);
        }
        else {
            $this->_set_confirm_dialog($this->entity_model->create_instance($id));
            $this->load->view('back/common/confirmation_dialog', $this->data);
        }
        $this->load->view('back/common/footer', $this->data);
	}

	/* default list */
	function list_all()
	{
        $this->SetContext(func_get_args());
		$this->data['list'] = $this->entity_model->GetEntityList($this->instances);
        $this->load->view('back/common/header', $this->data);
        $this->load->view('back/'.$this->view_list, $this->data);
        $this->load->view('back/common/footer', $this->data);
	}

    function success($entity,$delete = false)
    {
        $this->_set_success_message($entity,$delete);
        $this->load->view('back/common/header', $this->data);
        $this->load->view('back/common/success_message', $this->data);
        $this->load->view('back/common/footer', $this->data);
    }

    function _get_image_path($entity, $file_name)
    {
        if($this->input->post('current_'.$file_name))
        {
            if(isset($_FILES[$file_name]) && $_FILES[$file_name]['error'] == 0)
            {
                $this->images->remove($this->input->post('current_'.$file_name));
                return $this->images->upload($entity, $file_name);
            }
            else
            {
                if($this->input->post('remove_'.$file_name))
                {
                    if($this->images->is_default($this->input->post('current_'.$file_name)))
                    {
                        return $this->images->get_default($entity, $file_name);
                    }
                    else
                    {
                        $this->images->remove($this->input->post('current_'.$file_name));
                        return '';
                    }
                }
                return $this->input->post('current_'.$file_name);
            }
        }
        else
        {
            if($_FILES[$file_name]['error'] == 0)
            {
                return $this->images->upload($entity, $file_name);
            }
            else
            {
                if($this->images->exists_default($entity, $file_name))
                    return $this->images->get_default($entity, $file_name);

                return '';
            }
        }
    }
}