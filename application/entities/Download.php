<?php

class Download extends Entity
{
	var $title;

	var $file;
	var $portrait;

	public function GetTitle()
	{
	    return $this->title;
	}
	
	public function SetTitle($title)
	{
	    $this->title = $title;
	}

	public function GetFile()
	{
	    return $this->file;
	}
	
	public function SetFile($file)
	{
	    $this->file = $file;
	}

	public function GetPortrait()
	{
	    return $this->portrait;
	}
	
	public function SetPortrait($portrait)
	{
	    $this->portrait = $portrait;
	}

}