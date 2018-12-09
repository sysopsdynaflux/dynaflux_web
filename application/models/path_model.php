<?php

class Path_Model extends Normal_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'path';
        $this->entityClass = 'Path';
	}

	function GetPathByUrl($url)
	{
		return array_pop($this->db->get_where($this->table, array('url' => $url))->result($this->entityClass));
	}

	function GetPathByReference($reference)
	{
		return array_pop($this->db->get_where($this->table, array('reference' => $reference))->result($this->entityClass));
	}
}