<?php

class EntityDispatcher
{
	private $CI;
	private $IsContent;

	function __construct($container, $isContent)
	{
		$this->CI = $container;
		$this->IsContent = $isContent;
	}

	function Product($id_product, $type)
	{
		if(!$this->IsContent)
		{
			$this->CI->load->model('file_model');
			$this->CI->load->model('product_model');
			
			$this->CI->data['brochures'] = $this->CI->file_model->GetGroupFilesByEntity($id_product, 'brochures');
			$this->CI->data['manuals'] = $this->CI->file_model->GetGroupFilesByEntity($id_product, 'manuals');
			
			$product = $this->CI->product_model->GetEntity($id_product);
			$product->SetDetail(Tools::GetFileContent($product->GetDetailFilePath()));
			
			$this->CI->data['product'] = $product;
		}
		else
		{
			$this->CI->load->model('content_model');
			$content = $this->CI->content_model->GetEntity($id_product);
			
			$product = new Product();
			$product->SetId($content->GetId());
			$product->SetTitle($content->GetTitle());
			$product->SetDetail(Tools::GetFileContent($content->GetContentFilePath()));
			$product->SetType($type);
			
			$this->CI->data['product'] = $product;
		}

		switch($type)
		{
			case 'equipment': 
				$menu = 'Equipos y Controladores';
				$this->CI->data['menu'] = $this->CI->menu_model->GetFullMenuByName($menu);
				$this->CI->LoadView('entity/equipment');
				break;
			case 'system':
				$menu = 'Sistemas';
				$this->CI->data['systems'] = $this->CI->product_model->GetEntityList(
					array('where'=>array('type'=>'system'),
						'wherenot'=>array('id'=>$id_product)),
					array('path','image'));
				$this->CI->LoadView('entity/system');
				break;
		}
	}

	function equipment($id_equipment)
	{
		switch($this->CI->context->GetLangCode())
		{
			case 'es': $this->CI->data['topActive'] = "equipos"; break;
			case 'en': $this->CI->data['topActive'] = "equipment"; break;
		}

		$this->CI->data['title'] = 'Equipos';
		
		$this->Product($id_equipment, 'equipment');
	}

	function system($id_system)
	{
		switch($this->CI->context->GetLangCode())
		{
			case 'es': $this->CI->data['topActive'] = "sistemas"; break;
			case 'en': $this->CI->data['topActive'] = "systems"; break;
		}

		$this->CI->data['title'] = 'Sistemas';
		
		$this->Product($id_system, 'system');
	}

	function news($id_news)
	{
		switch($this->CI->context->GetLangCode())
		{
			case 'es': $this->CI->data['topActive'] = "noticias"; break;
			case 'en': $this->CI->data['topActive'] = "news"; break;
		}

		$this->CI->data['title'] = 'Noticias';
		
		$this->CI->load->model('news_model');
		$news = $this->CI->news_model->GetEntity($id_news,array('tag','content','photo'));		
		$this->CI->data['news'] = $news;

		$this->CI->load->model('tag_model');
		$tags = $this->CI->tag_model->GetEntityList(
			array('where'=>array('type'=>'news')),array('path'));
		$this->CI->data['tags'] = $tags;

		$this->CI->load->model('path_model');
		$related = array();
		foreach($news->GetTags() as $tag)
		{
			$newsItem = $this->CI->news_model->GetTopNewsByTag($tag->GetId(),$id_news);
			if(!empty($newsItem))
			{
				$path = $this->CI->path_model->GetPathByReference($newsItem->GetId());
				$newsItem->SetPath($path);
				$related[] = $newsItem;
			}
		}
		$this->CI->data['newsList'] = $related;
		
		$this->CI->load->model('image_model');
		$this->CI->data['images'] = $this->CI->image_model->GetGroupImagesByEntity($id_news, 'gallery');
		
		$this->CI->LoadView('entity/news');
	}
	
	function tag($id_tag)
	{
		$this->CI->load->model('tag_model');
		$tag = $this->CI->tag_model->GetEntity($id_tag);

		$this->CI->data['type'] = $tag->GetType();
		$this->CI->data['name'] = $tag->GetName();
		$this->CI->data['title'] = $tag->GetName();

		$this->CI->load->model('path_model');

		switch($tag->GetType())
		{
			case 'news':
				$this->CI->data['topActive'] = "news";
				$this->CI->data['items'] = $this->CI->tag_model->GetNewsByTag($id_tag);
			break;
			
			case 'project':
				$this->CI->data['topActive'] = "projects";
				$this->CI->data['items'] = $this->CI->tag_model->GetProjectsByTag($id_tag);
			break;
		}

		$tags = $this->CI->tag_model->GetEntityList(
			array('wherenot'=>array('id'=>$id_tag),'where'=>array('type'=>$tag->GetType())),array('path'));		
		$this->CI->data['tags'] = $tags;

		$this->CI->LoadView('entity/tag');
	}

	function project($id_project)
	{

		$this->CI->data['topActive'] = "projects";
		
		$this->CI->load->model('project_model');
		$project = $this->CI->project_model->GetEntity($id_project,array('tag','description','photo'));
		$this->CI->data['project'] = $project;
		$this->CI->data['title'] = $project->GetName();
		
		$this->CI->load->model('tag_model');
		$tags = $this->CI->tag_model->GetEntityList(
			array('where'=>array('type'=>'project')),array('path')); 
		$this->CI->data['tags'] = $tags;

		$this->CI->load->model('path_model');
		$related = array();
		foreach($project->GetTags() as $tag)
		{
			$pj = $this->CI->project_model->GetTopProjectByTag($tag->GetId(),$id_project);

			if(!empty($pj))
			{
				$path = $this->CI->path_model->GetPathByReference($pj->GetId());
				$pj->SetPath($path);

				$photo = array_pop($this->CI->image_model->GetGroupImagesByEntity($pj->GetId(), 'photo'));
				$pj->SetPhoto($photo);

				$related[] = $pj;
			}
		}
		$this->CI->data['projects'] = $related;
		
		$this->CI->load->model('image_model');
		$this->CI->data['images'] = $this->CI->image_model->GetGroupImagesByEntity($id_project, 'gallery');
		
		$this->CI->LoadView('entity/project');
	}
}