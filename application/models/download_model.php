<?php

class Download_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'download';
        $this->entityClass = 'Download';
	}

	function OnRelationship(&$download, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'file':
					$this->load->model('file_model');
					$file = array_pop($this->file_model->GetGroupFilesByEntity($download->GetId(), 'file'));
					$download->SetFile($file);
					break;
				case 'portrait':
					$this->load->model('image_model');
					$portrait = array_pop($this->image_model->GetGroupImagesByEntity($download->GetId(), 'portrait'));
					$download->SetPortrait($portrait);
					break;
			}
		}
	}

	function GetDownloads()
	{
		return $this->GetEntityList(array(
				'limit' => 4
			), array('file','portrait'));
	}
}