<?php

class Department_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'department';
        $this->entityClass = 'Department';
	}

	function OnRelationship(&$department, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'image':
					$this->load->model('image_model');
					$image = array_pop($this->image_model->GetGroupImagesByEntity($department->GetId(), 'image'));
					$department->SetImage($image);
					break;
			}
		}
	}
}