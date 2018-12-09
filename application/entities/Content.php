<?php

class Content extends Entity
{
	var $id;
	var $title;
	var $content;
	var $contentFilePath;

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
	
	public function GetContentFilePath()
	{
	    return $this->contentFilePath;
	}
	
	public function SetContentFilePath($contentFilePath)
	{
	    $this->contentFilePath = $contentFilePath;
	}	
}