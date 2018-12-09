<?php

class Department extends Entity
{
	var $id;
	var $title;
	var $content;
	
	var $image;

	public function GetTitle()
	{
	    return $this->title;
	}
	
	public function SetTitle($title)
	{
	    $this->title = $title;
	}

	public function GetContent()
	{
	    return $this->content;
	}
	
	public function SetContent($content)
	{
	    $this->content = $content;
	}

	public function GetImage()
	{
	    return $this->image;
	}
	
	public function SetImage($image)
	{
	    $this->image = $image;
	}
}