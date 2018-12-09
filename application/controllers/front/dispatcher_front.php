<?php

class Dispatcher_front extends Front_Controller
{
	var $currentPath;

	function dispatch()
	{
		$this->SetContext(func_get_args());
		$url = $this->context->GetParamsUrl();
		$request_method = 'GET';//$this->input->server('REQUEST_METHOD');

		switch($request_method)
		{
			case 'GET':
				$path = $this->path_model->GetPathByUrl($url);
				$this->currentPath = $this->data['currentPath'] = $path;
				
				if($path->GetReference() == 'home')
				{
					$this->data['completedProjects'] = $this->project_model->GetCompleted(3,array('photo'));
		        	$this->data['oustandingProducts'] = $this->product_model->GetOustanding(8,array('image'));
		        	$this->data['newsList'] = $this->news_model->GetLatest(3,array('photo'));	
				}
				else
				{
					$this->data['completedProjects'] = $this->project_model->GetCompleted(4);
		        	$this->data['oustandingProducts'] = $this->product_model->GetOustanding(4);
		        	$this->data['newsList'] = $this->news_model->GetLatest(4);		
				}

				switch($path->GetType())
				{
					case 'page':
						require_once(str_replace('system/', 'application/libraries/PageDispatcher.php', BASEPATH));
						$pageDispatcher = new PageDispatcher($this);
						$page = $path->GetReference();
						$pageDispatcher->$page();
						break;
					default:
						require_once(str_replace('system/', 'application/libraries/EntityDispatcher.php', BASEPATH));
						$entityDispatcher = new EntityDispatcher($this, $path->GetIsContent());
						$entity = $path->GetType();
						$id = $path->GetReference();
						$entityDispatcher->$entity($id);
						break;
				}
			break;

			case 'POST':
				require_once(str_replace('system/', 'application/libraries/FormDispatcher.php', BASEPATH));
				$formDispatcher = new FormDispatcher($this);
				$form = $url;
				$formDispatcher->$form();
			break;
		}
	}
}