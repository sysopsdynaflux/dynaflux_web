<?php

class Menu extends Entity
{
	var $id;
	var $name;
	var $description;

	var $items;

	public function GetName()
	{
	    return $this->name;
	}
	
	public function SetName($name)
	{
	    $this->name = $name;
	}

	public function GetDescription()
	{
	    return $this->description;
	}
	
	public function SetDescription($description)
	{
	    $this->description = $description;
	}

	public function GetItems()
	{
	    return $this->items;
	}
	
	public function SetItems($items)
	{
	    $this->items = $items;
	}
}