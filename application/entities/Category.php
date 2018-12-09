<?php

class Category extends Entity
{
	var $name;
	var $description;

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
}