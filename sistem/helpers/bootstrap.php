<?php

/**
 * @author Boomer
 * @copyright 2013
 */

if(!function_exists('slider')) 
{
    function slider( $id = '' , $item )
    {
        if( !is_array( $item )) {
            return;
        }
        $content =  '<div id="'.$id.'" class="carousel slide "><div class="carousel-inner">';
        $item_num = count( $item );
        for( $x = 0; $x < $item_num ; $x++) 
        {
            if($x == 0) {
                $content .= '<div class="item active">';
            } else {
                $content .= '<div class="item">';
            }
                $content .= '   <img src="'.$item[$x]['image'].'" alt="">
                                <div class="carousel-caption ">
                                    <h4>'.$item[$x]['title'].'</h4>
                                    <p>'.$item[$x]['info'].'</p>
                                </div></div>';
        }
        $content .= '</div><a class="carousel-control left" href="#'.$id.'" data-slide="prev"><img src="'.domain().'media/img/prev.png"/></a><a class="carousel-control right" href="#'.$id.'" data-slide="next"><img src="'.domain().'media/img/next.png"/></a></div>';
        return $content;
    }
    
    function menu_data( $arr, $parent = 0 )
    {
        $pages = Array();
        foreach($arr as $page)
        {
            if($page['parent'] == $parent) {
                $page['sub'] = isset($page['sub']) ? $page['sub'] : menu_data($arr, $page['id']);
                $pages[] = $page;
            }
        }
        return $pages;
    }
    
    function menu_bootstap( $nav )
    {
        $html = '';

        foreach($nav as $page)
        {   
            if( $page['sub'] ) {
                $html .= '<li class="dropdown">';
                $html .= '<a class="dropdown-toggle" data-toggle="dropdown" href="' . $page['link'] . '">' . $page['title'] . '</a>';
                $html .='<ul class="dropdown-menu">';
                $html .= menu_bootstap( $page['sub'] );
                $html .= '</ul></li>';
            } else {
                $html .= '<li>';
                $html .= '<a href="' . $page['link'] . '">' .$page['title'] . '</a>';
                $html .= menu_bootstap( $page['sub'] );
                $html .= '</li>';
            }
        }
        return $html;
    }
        
}
   function get_menu($data, $parent = 0) {
	static $i = 1;
	$tab = str_repeat("\t\t", $i);
	if (isset($data[$parent])) {
		$html = "\n$tab<ul class='nav'>";
		$i++;
		foreach ($data[$parent] as $v) {
			$child = get_menu($data, $v->id);
		
            if( $v->url == current_url()) {
                	$html .= "\n\t$tab<li class='active'>";
            } else {
                	$html .= "\n\t$tab<li>";
            }
                        
			$html .= '<a href="'.domain().$v->url.'"><i class="'.$v->icon.'"></i> '.$v->title.'</a>';
			if ($child) {
				$i--;
				$html .= $child;
				$html .= "\n\t$tab";
			}
			$html .= '</li>';
		}
		$html .= "\n$tab</ul>";
		return $html;
	} else {
		return false;
	}
}
?>