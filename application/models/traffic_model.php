<?php

class Traffic_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'traffic';
        $this->entityClass = 'TrafficEntry';
	}

	function OnRelationship(&$traffic, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'path':
					$path = array_pop($this->db->get_where('path', array('reference' => $traffic->GetReference()))->result('Path'));
					if(!empty($path))
					{
						$traffic->SetPath($path);
						$model = $path->GetType().'_model';
						$this->load->model($model);
						$entity = $this->$model->GetEntity($path->GetReference());
						if(method_exists($entity, 'GetTitle')) $traffic->SetTitle($entity->GetTitle());
						elseif(method_exists($entity, 'GetName')) $traffic->SetTitle($entity->GetName());
					}
					break;
			}
		}
	}

	function GetMostViewed()
	{
		return $this->GetEntityList(array(
				'limit' => 5,
				'orderBy' => 'count(reference) desc',
				'groupBy' => 'reference'
			), array('path'), 'reference');
	}
}