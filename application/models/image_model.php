<?php

class Image_Model extends Normal_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'image';
        $this->entityClass = 'Image';
	}

	function OnRelationship(&$entity, $relationships)
	{
		
	}

	function GetGroupImagesByEntity($id_entity, $group)
	{
		$this->db->select('i.*');
    	$this->db->from($this->table.' i');
    	$this->db->join('entity_image ei', 'ei.idImage = i.id');
    	$this->db->where('ei.idEntity', $id_entity);
    	$this->db->where('ei.group', $group);
        //$this->db->order_by('e.lastModified', 'desc');

        return $this->db->get()->result($this->entityClass);
	}
}