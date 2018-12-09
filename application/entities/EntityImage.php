<?php

class EntityImage extends Entity
{
	var $id;
	var $idEntity;
	var $idImage;
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

	public function GetIdImage()
	{
	    return $this->idImage;
	}
	
	public function SetIdImage($idImage)
	{
	    $this->idImage = $idImage;
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