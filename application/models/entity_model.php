<?php

class Entity_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'entity_creation';
        $this->entityClass = 'EntityCreation';
	}

	function OnRelationship(&$entityLog, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'path':
					$path = array_pop($this->db->get_where('path', array('reference' => $entityLog->GetReference()))->result('Path'));
					if(!empty($path))
					{
						$entityLog->SetPath($path);
						$model = $path->GetType().'_model';
						$this->load->model($model);
						$entity = $this->$model->GetEntity($path->GetReference());
						if(method_exists($entity, 'GetTitle')) $entityLog->SetTitle($entity->GetTitle());
						elseif(method_exists($entity, 'GetName')) $entityLog->SetTitle($entity->GetName());	
					}
					break;
			}
		}
	}

	function GetRecentlyCreated()
	{
		return $this->GetEntityList(array(
				'limit' => 5,
				'order_by' => 'date desc'
			), array('path'), 'reference');
	}
}