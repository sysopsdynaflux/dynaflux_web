<?php

class Normal_Model extends Base_Model
{
	function InsertEntity($entity)
    {
        if($this->table != null)
        {
            return $this->db->insert($this->table, $entity);
        }
    }

    function InsertEntityList($entities)
    {
        if($this->table != null && is_array($entities))
        {
            return $this->db->insert_batch($this->table, $entities);
        }
    }

    function RemoveEntity($id)
    {
        if($this->table != null)
            return $this->db->delete($this->table, array($this->id_name => $id));
    }

    function UpdateEntity($entity)
    {
        if($this->table != null)
        {
            $id_name = $this->id_name;
            return $this->db->update($this->table, $entity, array($id_name => $entity->$id_name));
        }
    }

    /** update just a column of a specific by its id entity*/
    function UpdateEntityColumn($entity_id, $column, $value)
    {
        if($this->table != null)
        {
            return $this->db->where($this->id_name,$entity_id)->set($column,$value)->update($this->table);
        }
    }
    
    function GetEntity($id, $relationships = array())
    {
        $entity = array_pop($this->db->get_where($this->table, array('id' => $id))->result($this->entityClass));

        if(!empty($relationships) && method_exists($this, 'OnRelationship')) $this->AddRelationships($entity, $relationships);

        return $entity;
    }

    function GetEntityList($relationships = array())
    {
        $entityList = $this->db->get($this->table)->result($this->entityClass);
        
        if(method_exists($this, 'OnRelationship')) $this->AddRelationships($entityList, $relationships);
        
        return $entityList;
    }

    function GetEntityListByWeight($relationships = array())
    {
        $this->db->order_by('weight', 'asc');
        $entityList = $this->db->get($this->table)->result($this->entityClass);
        if(method_exists($this, 'OnRelationship')) $this->AddRelationships($entityList, $relationships);
        return $entityList;
    }

    function AddRelationships(&$entityList, $relationships)
    {
        if(empty($relationships))
            return;

        if(!is_array($entityList))
        {
            $entityList = array($entityList);
            $singular = true;
        }
        else
        {
            $singular = false;
        }

        foreach($entityList as &$entity)
        {
            if(!empty($entity))
            {
                $this->OnRelationship($entity, $relationships);
            }
        }

        if($singular)
        {
            $entityList = array_pop($entityList);
        }
    }
}