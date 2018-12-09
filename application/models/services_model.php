<?php

class Services_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'service';
        $this->entityClass = 'Service';
	}

	function OnRelationship(&$service, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'image':
					$this->load->model('image_model');
					$image = array_pop($this->image_model->GetGroupImagesByEntity($service->GetId(), 'icon'));
					$service->SetIcon($image);
					break;
			}
		}
	}

	function GetServices()
	{
		return $this->GetEntityList(array(),array('image'));
	}
}