<?php

class Menu_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'menu_item';
        $this->entityClass = 'MenuItem';
	}

	function OnRelationship(&$menuItem, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'path':
					$path = array_pop($this->db->get_where('path', array('url' => $menuItem->GetUrl()))->result('Path'));
					$menuItem->SetPath($path);
					break;
			}
		}
	}

	function GetFullMenuByName($name, $relationships = array())
	{
		$menu = array_pop($this->db->get_where('menu', array('name' => $name))->result('Menu'));
		$menuId = $menu->GetId();
        
		return $this->GetEntityList(array(
				'where' => array('menuId' => $menuId),
				'orderBy' => 'weight'
			), $relationships);
	}

	function GetMenuLevelByName($name, $level, $relationships = array())
	{
		$menu = array_pop($this->db->get_where('menu', array('name' => $name))->result('Menu'));
		$menuId = $menu->GetId();
        
		return $this->GetEntityList(array(
				'where' => array('menuId' => $menuId, 'level' => $level),
				'orderBy' => 'weight'
			), $relationships);
	}
}