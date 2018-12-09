<?php

class Trademark_Model extends Normal_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'trademark';
        $this->entityClass = 'Trademark';
	}

	function OnRelationship(&$trademark, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'logo':
					$this->load->model('image_model');
					$logo = array_pop($this->image_model->GetGroupImagesByEntity($trademark->GetId(), 'logo'));
					$trademark->SetLogo($logo);
					break;
			}
		}
	}
}