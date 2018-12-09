<?php

class File_Model extends Normal_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'file';
        $this->entityClass = 'File';
	}

	function OnRelationship(&$entity, $relationships)
	{
		
	}

	function GetGroupFilesByEntity($id_entity, $group)
	{
		$this->db->select('f.*');
    	$this->db->from($this->table.' f');
    	$this->db->join('entity_file ef', 'ef.idFile = f.id');
    	$this->db->where('ef.idEntity', $id_entity);
    	$this->db->where('ef.group', $group);

        return $this->db->get()->result($this->entityClass);
	}
}