<?php

class Translation_Model extends Base_Model
{
	function InsertEntity($entity)
    {
        $CI =& get_instance();
        
        $idTranslation = $CI->context->GetTranslationId();
        $idTranslation = $idTranslation != null ? $idTranslation : Tools::GenerateUniqueId('TNS');

        $langCode = $CI->context->GetLangCode();

        $translation = new Translation();
        $translation->SetId($idTranslation);
        $translation->SetEntityId($entity->GetId());
        $translation->SetEntityType(get_class($entity));
        $translation->SetLangCode($langCode);

        $this->db->insert($this->table, $entity);
        $this->db->insert('translation', $translation);
    }

    function InsertEntityList($entityList)
    {
        if(is_array($entityList))
        {
            return $this->db->insert_batch($this->table, $entityList);
        }
    }

    function RemoveEntity($id)
    {
    	$this->db->delete($this->table, array('id' => $id));
    	$this->db->delete('translation', array('id' => $id));
    }

    function UpdateEntity($entity)
    {
        $this->db->update($this->table, $entity, array('id' => $entity->GetId()));
    }

    /** update just a column of a specific by its id entity **/
    function UpdateEntityColumn($entity_id, $column, $value)
    {
        return $this->db->where('id', $entity_id)->set($column, $value)->update($this->table);
    }
    
    function GetEntity($id, $relationships = array())
    {
        $entity = array_pop($this->db->get_where($this->table, array('id' => $id))->result($this->entityClass));

        if(!empty($relationships) && method_exists($this, 'OnRelationship')) $this->AddRelationships($entity, $relationships);

        return $entity;
    }

    function GetEntityList($properties = array(), $relationships = array(), $joinColumn = 'id')
    {
    	$CI =& get_instance();

    	$langCode = $CI->context->GetLangCode();

    	$this->db->select('e.*');
    	$this->db->from($this->table.' e');
    	$this->db->join('translation t', 't.entityId = e.'.$joinColumn);
    	$this->db->where('t.langCode', $langCode);
        //$this->db->order_by('e.lastModified', 'desc');

        if(!empty($properties))
        {
            if(isset($properties['limit']))
                $this->db->limit($properties['limit']);

            if(isset($properties['where']))
                foreach($properties['where'] as $col => $val)
                    $this->db->where('e.'.$col, $val);

            if(isset($properties['wherenot']))
                foreach($properties['wherenot'] as $col => $val)
                    $this->db->where('e.'.$col.' !=', $val);    

            if(isset($properties['orderBy']))
            {
                $orderBy = str_replace('(', '(e.', $properties['orderBy']);
                $this->db->order_by($orderBy);
            }

            if(isset($properties['groupBy']))
                $this->db->group_by('e.'.$properties['groupBy']);
        }
        
        $entityList = $this->db->get()->result($this->entityClass); 
        
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

    function GetTranslationId($entityId)
    {
        $this->db->select('id');
        $this->db->where('entityId', $entityId);
        return array_pop($this->db->get('translation')->result());
    }
}