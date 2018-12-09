<?php

class Trademark extends Entity
{
	var $name;
	var $logo;

	public function GetName()
	{
	    return $this->name;
	}
	
	public function SetName($name)
	{
	    $this->name = $name;
	}
	
	public function GetLogo()
	{
	    return $this->logo;
	}
	
	public function SetLogo($logo)
	{
	    $this->logo = $logo;
	}
}