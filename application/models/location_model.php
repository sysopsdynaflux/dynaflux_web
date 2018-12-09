<?php

class Location_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'location';
        $this->entityClass = 'Location';
	}
}