<?php

class TrafficEntry extends Entity
{
	var $id;
	var $reference;
	var $title;
	var $ip;
	var $date;

	var $path;

	public function GetEntityId()
	{
	    return $this->entityId;
	}
	
	public function SetEntityId($entityId)
	{
	    $this->entityId = $entityId;
	}

	public function GetTitle()
	{
	    return $this->title;
	}
	
	public function SetTitle($title)
	{
	    $this->title = $title;
	}

	public function GetIp()
	{
	    return $this->ip;
	}
	
	public function SetIp($ip)
	{
	    $this->ip = $ip;
	}

	public function GetDate()
	{
	    return $this->date;
	}
	
	public function SetDate($date)
	{
	    $this->date = $date;
	}

	public function GetPath()
	{
	    return $this->path;
	}
	
	public function SetPath($path)
	{
	    $this->path = $path;
	}

	public function GetReference()
	{
	    return $this->reference;
	}
	
	public function SetReference($reference)
	{
	    $this->reference = $reference;
	}
}