<?php

class Project extends Entity
{
	var $id;
	var $name;
	var $description;
	var $descriptionFilePath;
	var $summary;
	var $summaryFilePath;
	var $state;
	var $weight;

	var $path;
	var $photo;
	var $gallery;
	var $tags;

	public function GetName()
	{
	    return $this->name;
	}
	
	public function SetName($name)
	{
	    $this->name = $name;
	}

	public function GetDescription()
	{
	    return $this->description;
	}
	
	public function SetDescription($description)
	{
	    $this->description = $description;
	}

	public function GetDescriptionFilePath()
	{
	    return $this->descriptionFilePath;
	}
	
	public function SetDescriptionFilePath($descriptionFilePath)
	{
	    $this->descriptionFilePath = $descriptionFilePath;
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

	public function GetState()
	{
	    return $this->state;
	}
	
	public function SetState($state)
	{
	    $this->state = $state;
	}

	public function GetWeight()
	{
	    return $this->weight;
	}
	
	public function SetWeight($weight)
	{
	    $this->weight = $weight;
	}

	public function GetPhoto()
	{
	    return $this->photo;
	}
	
	public function SetPhoto($photo)
	{
	    $this->photo = $photo;
	}
	
	public function GetGallery()
	{
	    return $this->gallery;
	}
	
	public function SetGallery($gallery)
	{
	    $this->gallery = $gallery;
	}

	public function GetTags()
	{
	    return $this->tags;
	}
	
	public function SetTags($tags)
	{
	    $this->tags = $tags;
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