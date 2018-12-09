<?php

class Service extends Entity
{
	var $id;
	var $name;
	var $description;

	var $icon;

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

	public function GetIcon()
	{
	    return $this->icon;
	}
	
	public function SetIcon($icon)
	{
	    $this->icon = $icon;
	}
}