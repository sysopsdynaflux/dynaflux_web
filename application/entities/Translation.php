<?php

class Translation extends Entity
{
	var $id;
	var $entityId;
	var $langCode;

	public function GetEntityId()
	{
	    return $this->entityId;
	}
	
	public function SetEntityId($entityId)
	{
	    $this->entityId = $entityId;
	}
	
	public function GetLangCode()
	{
	    return $this->langCode;
	}
	
	public function SetLangCode($langCode)
	{
	    $this->langCode = $langCode;
	}
}