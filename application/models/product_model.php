<?php

class Product_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'product';
        $this->entityClass = 'Product';
	}

	function OnRelationship(&$product, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'path':
					$path = array_pop($this->db->get_where('path', array('reference' => $product->GetId()))->result('Path'));
					$product->SetPath($path);
					break;
				case 'image':
					$this->load->model('image_model');
					$image = array_pop($this->image_model->GetGroupImagesByEntity($product->GetId(), 'image'));
					$product->SetImage($image);
					break;
				case 'detail':
					$product->SetDetail(Tools::GetFileContent($product->GetDetailFilePath()));
					break;
			}
		}
	}

	function GetOustanding($limit, $adds = array())
	{
		$rel = array_merge(array('path'),$adds);

		return $this->GetEntityList(array(
				'limit' => $limit,
				'where' => array('state' => 'oustanding')
			), $rel);
	}
}