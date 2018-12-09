<?php

class Category_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'category_item';
        $this->entityClass = 'CategoryItem';
	}

	function OnRelationship(&$categoryItem, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'path':
					$path = array_pop($this->db->get_where('path', array('url' => $categoryItem->GetUrl()))->result('Path'));
					$categoryItem->SetPath($path);
					break;
				case 'image':
					$this->load->model('image_model');
					$image = array_pop($this->image_model->GetGroupImagesByEntity($categoryItem->GetId(), 'image'));
					$categoryItem->SetImage($image);
					break;
			}
		}
	}

	function GetItemsByCategory($name)
	{
		$category = array_pop($this->db->get_where('category', array('name' => $name))->result('Category'));
		$categoryId = $category->GetId();
        
		return $this->GetEntityList(array(
				'where' => array('categoryId' => $categoryId)
			), array('path','image'));
	}
}