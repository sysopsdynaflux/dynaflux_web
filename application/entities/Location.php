<?php

class Location extends Entity
{
	var $id;
	var $name;
	var $latitude;
	var $longitude;
	var $address;
	var $phone;

	public function GetName()
	{
	    return $this->name;
	}
	
	public function SetName($name)
	{
	    $this->name = $name;
	}

	public function GetLatitude()
	{
	    return $this->latitude;
	}
	
	public function SetLatitude($latitude)
	{
	    $this->latitude = $latitude;
	}

	public function GetLongitude()
	{
	    return $this->longitude;
	}
	
	public function SetLongitude($longitude)
	{
	    $this->longitude = $longitude;
	}

	public function GetAddress()
	{
	    return $this->address;
	}
	
	public function SetAddress($address)
	{
	    $this->address = $address;
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