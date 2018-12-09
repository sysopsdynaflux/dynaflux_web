<?php

class Tools
{
	public static function GetLangs()
    {
        return array('es','en');
    }

    public static function NewsDateFormat($date)
    {
        $CI =& get_instance();
        $of = $CI->lang->line('Of');
        $day = ucwords(strftime('%A %d ',$date));
        $month_year = ucwords(strftime(' %B, %G',$date));
        return strftime($day.$of.$month_year,$date);
    }

    public static function Href($url)
    {	
        $CI =& get_instance();
        return base_url($CI->context->GetLangCode().'/'.$url);
    }

    public static function GenerateUniqueId($prefix)
    {
        $id = explode('.', uniqid('', true));
        return $prefix.substr($id[1], 2, 6);
    }

    public static function GetMenuItems($root, $menu)
    {
        $items = array();

        foreach($menu as $menu_item)
            if($menu_item->GetParentId() == $root->GetId())
                $items[] = $menu_item;

        return $items;
    }

    public static function PublicUrl($link)
    {
        return base_url('public/'.$link);
    }

    public static function WebImageUrl($link)
    {
        return base_url('public/images/web/'.$link);
    }

    public static function FileUrl($link)
    {
        return base_url('public/files/'.$link);
    }

    public static function GetTopParentsFromMenu($menu)
    {
        $topParents = array();

        foreach($menu as $item)
        {
            if($item->GetLevel() == 1)
                $topParents[] = $item;
        }

        return $topParents;
    }

    public static function GetChildItems($parent, $menu)
    {
        $childItems = array();

        foreach($menu as $item)
        {
            if($item->GetParentId() == $parent->GetId())
                $childItems[] = $item;
        }

        return $childItems;
    }

    public static function GetFileContent($filePath)
    {
        $baseDir = str_replace('index.php', 'public/files', $_SERVER['SCRIPT_FILENAME']);
        $filePath = $baseDir.'/'.$filePath;
        return file_get_contents($filePath);
    }
}