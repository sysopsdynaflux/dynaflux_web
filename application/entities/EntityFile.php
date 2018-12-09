<?php

class EntityFile extends Entity
{
	var $id;
	var $idEntity;
	var $idFile;
	//Una entidad puede tener secciones de imagenes (ejm: galeria, slideshow, carrousel, etc).
	//Esta propiedad tiene como propósito diferenciar y agrupar las imágenes
	var $group;

	public function GetIdEntity()
	{
	    return $this->idEntity;
	}
	
	public function SetIdEntity($idEntity)
	{
	    $this->idEntity = $idEntity;
	}

	public function GetIdFile()
	{
	    return $this->idFile;
	}
	
	public function SetIdFile($idFile)
	{
	    $this->idFile = $idFile;
	}

	public function GetGroup()
	{
	    return $this->group;
	}
	
	public function SetGroup($group)
	{
	    $this->group = $group;
	}
}