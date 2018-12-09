<?php

class Tag extends Entity
{
	var $name;
	var $news;
	var $type;

	var $path;

	public function GetName()
	{
	    return $this->name;
	}
	
	public function SetName($name)
	{
	    $this->name = $name;
	}

	public function GetNews()
	{
	    return $this->news;
	}
	
	public function SetNews($news)
	{
	    $this->news = $news;
	}

	public function SetPath($path)
	{
		$this->path = $path;
	}

	public function GetPath()
	{
		return $this->path;
	}

	public function GetType()
	{
	    return $this->type;
	}
	
	public function SetType($type)
	{
	    $this->type = $type;
	}
}