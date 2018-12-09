<?php

class Content_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'content';
        $this->entityClass = 'Content';
	}
}