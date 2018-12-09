<?php

class Slider_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'slide_item';
        $this->entityClass = 'SlideItem';
	}

	function OnRelationship(&$slideItem, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'photo':
					$this->load->model('image_model');
					$photo = array_pop($this->image_model->GetGroupImagesByEntity($slideItem->GetId(), 'photo'));
					$slideItem->SetPhoto($photo);
					break;
				case 'summary':
					$slideItem->SetSummary(Tools::GetFileContent($slideItem->GetSummaryFilePath()));
					break;
			}
		}
	}

	function GetSliderByName($name, $limit)
	{
		$slider = array_pop($this->db->get_where('slider', array('name' => $name))->result('Slider'));
		$sliderId = $slider->GetId();
        
		return $this->GetEntityList(array(
				'where' => array('sliderId' => $sliderId),
				'orderBy' => 'weight',
				'limit' => $limit
			), array('photo','summary'));
	}
}