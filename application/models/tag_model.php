<?php

class Tag_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'tag';
        $this->entityClass = 'Tag';
	}

	function OnRelationship(&$tag, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'news':
					$news = $this->GetNewsByTag($tag->GetId());
					$tag->SetNews($news);
					break;
				case 'project':
					$projects = $this->GetProjectsByTag($tag->GetId());
					$tag->SetProjects($projects);
					break;
				case 'path':
					$path = array_pop($this->db->get_where('path', array('reference' => $tag->GetId()))->result('Path'));
					$tag->SetPath($path);
					break;
			}
		}
	}

	function GetNewsByTag($id_tag)
	{
		$this->db->from('news n');
		$this->db->join('news_tag nt','n.id = nt.newsId');
		$this->db->select('n.*');
		$this->db->where('nt.tagId',$id_tag);
		$newsList = $this->db->get()->result('News');
		$this->load->model('news_model');
		$this->news_model->AddRelationships($newsList, array('path','photo','summary'));
		return $newsList;
	}
	
	function GetProjectsByTag($id_tag)
	{
		$this->db->from('project p');
		$this->db->join('project_tag pt','p.id = pt.projectId');
		$this->db->select('p.*');
		$this->db->where('pt.tagId',$id_tag);
		$projects = $this->db->get()->result('Project');
		$this->load->model('project_model');
		$this->project_model->AddRelationships($projects, array('path','photo','summary'));
		return $projects;
	}
}