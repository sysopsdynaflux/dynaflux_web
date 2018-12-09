<?php

class MenuItem extends Entity
{
	var $id;
	var $menuId;
	var $parentId;
	var $name;
	var $level;
	var $type;
	var $url;
	var $weight;
	
	var $items;
	var $path;

	public function GetMenuId()
	{
	    return $this->menuId;
	}
	
	public function SetMenuId($menuId)
	{
	    $this->menuId = $menuId;
	}
	
	public function GetParentId()
	{
	    return $this->parentId;
	}
	
	public function SetParentId($parentId)
	{
	    $this->parentId = $parentId;
	}
	
	public function GetName()
	{
	    return $this->name;
	}
	
	public function SetName($name)
	{
	    $this->name = $name;
	}

	public function GetLevel()
	{
	    return $this->level;
	}
	
	public function SetLevel($level)
	{
	    $this->level = $level;
	}

	public function GetType()
	{
	    return $this->type;
	}
	
	public function SetType($type)
	{
	    $this->type = $type;
	}

	public function GetUrl()
	{
	    return $this->url;
	}
	
	public function SetUrl($url)
	{
	    $this->url = $url;
	}

	public function GetPath()
	{
	    return $this->path;
	}
	
	public function SetPath($path)
	{
	    $this->path = $path;
	}

	public function GetItems()
	{
	    return $this->items;
	}
	
	public function SetItems($items)
	{
	    $this->items = $items;
	}

	public function GetWeight()
	{
	    return $this->weight;
	}
	
	public function SetWeight($weight)
	{
	    $this->weight = $weight;
	}
}