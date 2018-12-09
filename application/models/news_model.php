<?php

class News_Model extends Translation_Model
{
	function __construct()
	{
		parent::__construct();
        $this->table = 'news';
        $this->entityClass = 'News';
	}

	function OnRelationship(&$newsItem, $relationships)
	{
		foreach($relationships as $relationship)
		{
			switch($relationship)
			{
				case 'path':
					$path = array_pop($this->db->get_where('path', array('reference' => $newsItem->GetId()))->result('Path'));
					$newsItem->SetPath($path);
					break;
				case 'tag':
					$this->db->from('tag t');
					$this->db->join('news_tag nt','t.id = nt.tagId');
					$this->db->select('t.*');
					$this->db->where('nt.newsId',$newsItem->GetId());
					$tags = $this->db->get()->result('Tag');

					foreach($tags as $tag)
					{
						$path = array_pop($this->db->get_where('path', array('reference' => $tag->GetId()))->result('Path'));
						$tag->SetPath($path);
					}

					$newsItem->SetTags($tags);
					break;
				case 'content':
					$newsItem->SetContent(Tools::GetFileContent($newsItem->GetContentFilePath()));
					break;
				case 'summary':
					$newsItem->SetSummary(Tools::GetFileContent($newsItem->GetSummaryFilePath()));
					break;
				case 'photo':
					$this->load->model('image_model');
					$photo = array_pop($this->image_model->GetGroupImagesByEntity($newsItem->GetId(), 'photo'));
					$newsItem->SetPhoto($photo);
					break;
			}
		}
	}

	function GetTags()
	{
		return $this->GetEntityList(array(
				'orderBy' => 'date desc'
			), array('tag'));
	}

	function GetLatest($limit, $adds = array())
	{
		$rel = array_merge(array('path'),$adds);
		
		return $this->GetEntityList(array(
				'limit' => $limit,
				'orderBy' => 'date desc'
			), $rel);
	}

	function GetTopNewsByTag($id_tag,$id_news)
	{
		$this->db->from('news n');
		$this->db->join('news_tag nt','n.id = nt.newsId');
		$this->db->select('n.*');
		$this->db->where('nt.tagId',$id_tag);
		$this->db->where('nt.newsId !=',$id_news);
		$this->db->order_by('n.date desc');
		$this->db->limit(1);
		return array_pop($this->db->get()->result('News'));
	}
}