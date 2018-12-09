<?php 

class News extends Entity
{
	var $id;
	var $title;
	var $content;
	var $contentFilePath;
	var $summary;
	var $summaryFilePath;
	var $date;
	
	var $path;
	var $photo;
	var $images;
	var $tags;

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

	public function GetSummary()
	{
	    return $this->summary;
	}
	
	public function SetSummary($summary)
	{
	    $this->summary = $summary;
	}

	public function GetSummaryFilePath()
	{
	    return $this->summaryFilePath;
	}
	
	public function SetSummaryFilePath($summaryFilePath)
	{
	    $this->summaryFilePath = $summaryFilePath;
	}

	public function GetDate()
	{
	    return $this->date;
	}
	
	public function SetDate($date)
	{
	    $this->date = $date;
	}

	public function GetPhoto()
	{
	    return $this->photo;
	}
	
	public function SetPhoto($photo)
	{
	    $this->photo = $photo;
	}

	public function GetImages()
	{
	    return $this->images;
	}
	
	public function SetImages($images)
	{
	    $this->images = $images;
	}

	public function GetPath()
	{
	    return $this->path;
	}
	
	public function SetPath($path)
	{
	    $this->path = $path;
	}

	public function GetTags()
	{
	    return $this->tags;
	}
	
	public function SetTags($tags)
	{
	    $this->tags = $tags;
	}
}