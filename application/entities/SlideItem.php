<?php

class SlideItem extends Entity
{
	var $id;
	var $sliderId;
	var $pagerTitle;
	var $slideTitle;
	var $summary;
	var $summaryFilePath;
	var $path;
	var $weight;

	var $photo;

	public function GetSliderId()
	{
	    return $this->sliderId;
	}
	
	public function SetSliderId($sliderId)
	{
	    $this->sliderId = $sliderId;
	}

	public function GetPagerTitle()
	{
	    return $this->pagerTitle;
	}
	
	public function SetPagerTitle($pagerTitle)
	{
	    $this->pagerTitle = $pagerTitle;
	}

	public function GetSlideTitle()
	{
	    return $this->slideTitle;
	}
	
	public function SetSlideTitle($slideTitle)
	{
	    $this->slideTitle = $slideTitle;
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

	public function GetPath()
	{
	    return $this->path;
	}
	
	public function SetPath($path)
	{
	    $this->path = $path;
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
}