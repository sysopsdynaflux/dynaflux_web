<?php

class Product extends Entity
{
	var $id;
	var $title;
	var $detail;
	var $detailFilePath;
	var $type;
	var $state;
	
	var $image;
	var $manuales;
	var $brochures;
	var $path;
	
	public function GetTitle()
	{
	    return $this->title;
	}
	
	public function SetTitle($title)
	{
	    $this->title = $title;
	}

	public function GetDetail()
	{
	    return $this->detail;
	}
	
	public function SetDetail($detail)
	{
	    $this->detail = $detail;
	}

	public function GetDetailFilePath()
	{
	    return $this->detailFilePath;
	}
	
	public function SetDetailFilePath($detailFilePath)
	{
	    $this->detailFilePath = $detailFilePath;
	}

	public function GetType()
	{
	    return $this->type;
	}
	
	public function SetType($type)
	{
	    $this->type = $type;
	}

	public function GetManuales()
	{
	    return $this->manuales;
	}
	
	public function SetManuales($manuales)
	{
	    $this->manuales = $manuales;
	}

	public function GetBrochures()
	{
	    return $this->brochures;
	}
	
	public function SetBrochures($brochures)
	{
	    $this->brochures = $brochures;
	}

	public function GetImage()
	{
	    return $this->image;
	}
	
	public function SetImage($image)
	{
		if(!empty($image))
	    	$this->image = $image;
	    else
	    	$this->image = new Image();
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