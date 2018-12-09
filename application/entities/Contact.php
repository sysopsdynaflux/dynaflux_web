<?php

class Contact extends Entity
{
	var $id;
	var $name;
	var $position;
	var $email;
	var $phone;

	public function GetName()
	{
	    return $this->name;
	}
	
	public function SetName($name)
	{
	    $this->name = $name;
	}

	public function GetPosition()
	{
	    return $this->position;
	}
	
	public function SetPosition($position)
	{
	    $this->position = $position;
	}

	public function GetEmail()
	{
	    return $this->email;
	}
	
	public function SetEmail($email)
	{
	    $this->email = $email;
	}

	public function GetPhone()
	{
	    return $this->phone;
	}
	
	public function SetPhone($phone)
	{
	    $this->phone = $phone;
	}	
}