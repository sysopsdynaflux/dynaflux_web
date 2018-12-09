<?php

class Project_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'project';
        $this->entityClass = 'Project';
	}

	function OnRelationship(&$project, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'path':
					$path = array_pop($this->db->get_where('path', array('reference' => $project->GetId()))->result('Path'));
					$project->SetPath($path);
					break;
				case 'tag':
					$this->db->from('tag t');
					$this->db->join('project_tag pt','t.id = pt.tagId');
					$this->db->select('t.*');
					$this->db->where('pt.projectId',$project->GetId());
					$tags = $this->db->get()->result('Tag');

					foreach($tags as $tag)
					{
						$path = array_pop($this->db->get_where('path', array('reference' => $tag->GetId()))->result('Path'));
						$tag->SetPath($path);
					}

					$project->SetTags($tags);
					break;
				case 'description':
					$project->SetDescription(Tools::GetFileContent($project->GetDescriptionFilePath()));
					break;
				case 'summary':
					$project->SetSummary(Tools::GetFileContent($project->GetSummaryFilePath()));
					break;
				case 'photo':
					$this->load->model('image_model');
					$photo = array_pop($this->image_model->GetGroupImagesByEntity($project->GetId(), 'photo'));
					$project->SetPhoto($photo);
					break;
				case 'gallery':
					$this->load->model('image_model');
					$gallery = $this->image_model->GetGroupImagesByEntity($project->GetId(), 'gallery');
					$project->SetGallery($gallery);
					break;
			}
		}
	}

	function GetCompleted($limit, $adds = array())
	{
		$rel = array_merge(array('path'),$adds);

		return $this->GetEntityList(array(
				'limit' => $limit,
				'where' => array('state' => 'completed')
			),$rel);
	}

	function GetTags()
	{
		return $this->GetEntityList(array(
				'orderBy' => 'date desc'
			), array('tag'));
	}

	function GetTopProjectByTag($id_tag,$id_project)
	{
		$this->db->from('project p');
		$this->db->join('project_tag pt','pt.projectId = p.id');
		$this->db->select('p.*');
		$this->db->where('pt.tagId',$id_tag);
		$this->db->where('pt.projectId !=',$id_project);
		$this->db->order_by('p.weight asc');
		$this->db->limit(1);
		return array_pop($this->db->get()->result('Project'));
	}
}