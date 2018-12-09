<?php

class Path extends Entity
{
	var $url;
	var $type;
	var $reference;
	var $isContent;

	public function GetUrl()
	{
	    return $this->url;
	}
	
	public function SetUrl($url)
	{
	    $this->url = $url;
	}

	public function GetType()
	{
	    return $this->type;
	}
	
	public function SetType($type)
	{
	    $this->type = $type;
	}

	public function GetReference()
	{
	    return $this->reference;
	}
	
	public function SetReference($reference)
	{
	    $this->reference = $reference;
	}

	public function GetIsContent()
	{
	    return $this->isContent;
	}
	
	public function SetIsContent($isContent)
	{
	    $this->isContent = $isContent;
	}
}