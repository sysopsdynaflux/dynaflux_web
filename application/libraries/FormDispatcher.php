<?php

class FormDispatcher
{
	private $CI;

	function __construct($container)
	{
		$this->CI = $container;
        $this->CI->load->library('form_validation');        
	}

	function contact()
	{
		$rules = array(
            array('field' => 'contact', 'label' => 'Contacto', 'rules' => ''),
            array('field' => 'name',    'label' => 'Nombre',   'rules' => 'trim|required|max_length[1000]|xss_clean'),
            array('field' => 'email',   'label' => 'Email',    'rules' => 'trim|required|valid_email|max_length[1000]|xss_clean'),
            array('field' => 'subject', 'label' => 'Asunto',   'rules' => 'trim|required|max_length[2000]|xss_clean'),
            array('field' => 'message', 'label' => 'Mensaje',  'rules' => 'trim|required|max_length[5000]|xss_clean')
        );
		
        $this->CI->form_validation->set_rules($rules);

        if($this->CI->form_validation->run())
        {
        	$contact = $this->CI->input->post('contact');
            $name = $this->CI->input->post('name');
            $email = $this->CI->input->post('email');
            $subject = $this->CI->input->post('subject');
            $message = $this->CI->input->post('message');
            
        	$this->CI->load->library('email');
            $this->CI->email->clear();
			$this->CI->email->from($email, $name);
	        $this->CI->email->to($contact);
	        $this->CI->email->subject($subject);
	        $this->CI->email->message($message);
	        
            if($this->CI->email->send())
                $this->CI->set_flashdata('contact_form_result_message',
                    array('type'=>'error',
                        'message'=>'Mensaje enviado'));
            else
                $this->CI->set_flashdata('contact_form_result_message',
                    array('type'=>'success',
                        'message'=>'El mensaje no pudo ser enviado'));
        }

        $this->CI->load->model('path_model');
        $path = $this->CI->path_model->GetPathByReference('contact');
        redirect(Tools::Href($path->GetUrl()));
	}
}