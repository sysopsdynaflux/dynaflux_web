<?php

class PageDispatcher
{
	private $CI;

	function __construct($container)
	{
		$this->CI = $container;
	}

	function home()
	{
		$this->CI->data['topActive'] = '';

		$this->CI->data['title'] = 'Bienvenido';
		
		$this->CI->load->model('slider_model');
		
		$this->CI->data['slider'] = $this->CI->slider_model->GetSliderByName('Principal', 6);
		$this->CI->data['prefooter'] = false;

		$this->CI->data['equipment_path'] = $this->CI->path_model->GetPathByReference('equipment');
		$this->CI->data['systems_path'] = $this->CI->path_model->GetPathByReference('systems');
		$this->CI->data['news_path'] = $this->CI->path_model->GetPathByReference('news');
		$this->CI->data['projects_path'] = $this->CI->path_model->GetPathByReference('projects');
		
		$this->CI->LoadView('page/home');
	}

	function aboutus()
	{
		$this->CI->data['topActive'] = 'aboutus';

		$this->CI->data['title'] = 'Nosotros';
		
		$this->CI->load->model('department_model');
		$this->CI->load->model('content_model');
		$this->CI->load->model('trademark_model');
		
		$misionVision = $this->CI->content_model->GetEntity('CONT12');
		$misionVision->SetContent(Tools::GetFileContent($misionVision->GetContentFilePath()));
		$this->CI->data['misionVision'] = $misionVision;
		$this->CI->data['departments'] = $this->CI->department_model->GetEntityList(array(),array('image'));
		$this->CI->data['trademarks'] = $this->CI->trademark_model->GetEntityList(array('logo'));
		
		$this->CI->LoadView('page/aboutus');
	}

	function news()
	{
		$this->CI->data['topActive'] = 'news';

		$this->CI->data['title'] = 'Noticias';

		$this->CI->load->model('news_model');
		$this->CI->load->model('tag_model');

		$news = $this->CI->news_model->GetEntityList(array(),array('path','summary','photo'));		

		$this->CI->data['newsList'] = $news;

		$this->CI->data['tags'] = $this->CI->tag_model->GetEntityList(
			array('where'=>array('type'=>'news')),array('path'));

		$this->CI->LoadView('page/news');
	}

	function projects()
	{
		$this->CI->data['topActive'] = 'projects';

		$this->CI->data['title'] = 'Casos de éxito';
			
		$this->CI->load->model('project_model');
		$this->CI->load->model('tag_model');

		$projects = $this->CI->project_model->GetEntityList(array(),array('path','summary','photo'));

		$this->CI->data['projects'] = $projects;

		//$this->CI->data['tags'] = $this->CI->tag_model->GetEntityList(
		//	array('where'=>array('type'=>'project')),array('path'));		

		$this->CI->LoadView('page/projects');
	}

	function contact()
	{
		$this->CI->data['topActive'] = 'contact';

		$this->CI->data['title'] = 'Contacto';

		$this->CI->data['lang'] = $this->CI->context->GetLangCode();

		$this->CI->load->library('form_validation');

		$this->CI->data['contactActive'] = false;

		if($this->CI->input->server('REQUEST_METHOD') == 'POST')
		{			
			$this->CI->data['contactActive'] = true;

			$rules = array(
	            array('field' => 'contact', 'label' => 'Contacto', 'rules' => ''),
	            array('field' => 'name',    'label' => 'Nombre',   'rules' => 'trim|required|max_length[1000]|xss_clean'),
	            array('field' => 'email',   'label' => 'Email',    'rules' => 'trim|required|valid_email|max_length[1000]|xss_clean'),
	            array('field' => 'subject', 'label' => 'Asunto',   'rules' => 'trim|required|max_length[2000]|xss_clean'),
	            array('field' => 'message', 'label' => 'Mensaje',  'rules' => 'trim|required|max_length[5000]|xss_clean')
	        );

	        $this->CI->form_validation->set_rules($rules);

	        require_once(str_replace('system/', 'application/libraries/Recaptcha.php', BASEPATH));

			$reCaptcha = new ReCaptcha('6Lel7AATAAAAAFLo_9nXcNash0W4uX-x8k2OSBQP');
			$resp = null;
			// Was there a reCAPTCHA response?
			if ($this->CI->input->post('g-recaptcha-response'))
			{
			    $resp = $reCaptcha->verifyResponse(
			        $this->CI->input->server('REMOTE_ADDR'),
			        $this->CI->input->post('g-recaptcha-response')
			    );
			}
			else
			{
				$this->CI->data['captchaError'] = $this->CI->lang->line('CaptchaError');
			}

	        if($this->CI->form_validation->run() && $resp != null && $resp->success)
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
	            {
	                $this->CI->data['contact_form_result'] = array('type'=>'success',
	                    'message'=>'Mensaje enviado');

	                $this->CI->form_validation->clear_field_data();
	            }
	            else
	            	$this->CI->data['contact_form_result'] = array('type'=>'danger',
	                    'message'=>'El mensaje no pudo ser enviado');    	
	        }
		}
		
		$this->CI->load->model('location_model');
		$this->CI->data['locations'] = $this->CI->location_model->GetEntityList();
		
		$this->CI->load->model('contact_model');
		$this->CI->data['contacts'] = $this->CI->contact_model->GetEntityList();
		
		$this->CI->LoadView('page/contact');
	}

	function services()
	{
		$this->CI->data['topActive'] = 'services';

		$this->CI->data['title'] = 'Servicios';
		
		$this->CI->load->model('services_model');
		$this->CI->data['services'] = $this->CI->services_model->GetServices();
		
		$this->CI->LoadView('page/services');
	}

	function equipment()
	{
		$this->CI->data['topActive'] = 'equipos';

		$this->CI->data['title'] = 'Equipos';
		
		$this->CI->load->model('category_model');
		$this->CI->data['equipment'] = $this->CI->category_model->GetItemsByCategory('Equipos');
		
		$this->CI->LoadView('page/equipment');
	}

	function systems()
	{
		$this->CI->data['topActive'] = 'sistemas';

		$this->CI->data['title'] = 'Sistemas';
		
		$this->CI->load->model('product_model');
		$this->CI->data['systems'] = $this->CI->product_model->GetEntityList(array(
				'where' => array('type' => 'system')
			), array('path','image','detail'));
		
		$this->CI->LoadView('page/systems');
	}

	function terms()
	{
		$this->CI->data['topActive'] = 'terms';

		$this->CI->data['title'] = 'Términos y condiciones';

		$this->CI->load->model('content_model');
		$terms = $this->CI->content_model->GetEntity('CONT10');
		$terms->SetContent(Tools::GetFileContent($terms->GetContentFilePath()));
		$this->CI->data['terms'] = $terms;

		$this->CI->LoadView('page/terms');
	}
}