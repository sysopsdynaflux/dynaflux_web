<?php

class Base_Model extends CI_Model
{
    protected $table;
    protected $entityClass;
    
    function __construct()
    {
        parent::__construct();        
        $this->table = null;
        $this->entityCass = null;
    }
}