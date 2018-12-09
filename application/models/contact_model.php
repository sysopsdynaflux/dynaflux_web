<?php

class Contact_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'contact';
        $this->entityClass = 'Contact';
	}
}