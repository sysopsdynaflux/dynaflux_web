<?php

class EntityCreation extends Entity
{
	var $id;
	var $reference;
	var $title;
	var $date;

	var $path;

	public function GetReference()
	{
	    return $this->reference;
	}
	
	public function SetReference($reference)
	{
	    $this->reference = $reference;
	}

	public function GetTitle()
	{
	    return $this->title;
	}
	
	public function SetTitle($title)
	{
	    $this->title = $title;
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
}