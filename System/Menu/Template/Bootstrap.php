<?php
namespace Malla\Menu\Template;

/*
*---------------------------------------------------------
* ©IIPEC
*---------------------------------------------------------
*/

class Bootstrap 
{
    protected $index;

    protected $menu;

    protected $filters = [
    ];

    public function __construct($menu)
    {
        $this->menu = $menu;
        
        foreach($this->filters as $key => $filter ) {
            $this->menu->addFilter($key, $filter);
        }        
    }

    public function icon($slug)
    {
        if( array_key_exists("icons", $this->menu->filters) ) {
            if( is_array( ($data = $this->menu->filters["icons"]) ) )
            {
                foreach($data as $alia => $replace )
                {
                    $slug = str_replace($alia, $replace, $slug);
                }
            }
        }

        if( empty($slug) ):
			return NULL;
		elseif($slug == "icon-toggle-nav"):
			return '<i class="mdi mdi-segment"></i> ';
		elseif( preg_match('/^mdi/', $slug) ) :
			return '<i class="mdi '.$slug.'"></i> ';
		elseif( preg_match('/^glyphicon/', $slug) ):
			return '<span class="'.$slug.'"></span> ';
		elseif ( preg_match('/[jpg|png|svg|gif]/i', $slug) ):
			return '<img src="'.__url($slug).'" class="'.$this->style("{img-avatar}").'" alt="@"> ';
		endif;
    }

    public function view($path, $data=[]) {

        if( view()->exists($path) ) {
            return view($path);
        }

        return "No view";
    }

    public function label($slug)
    {
        if( array_key_exists("label", $this->menu->filters) )
        {            
            ## MATCH
            if( array_key_exists("match", $this->menu->filters["label"]) )
            {
                foreach( $this->menu->filters["label"]["match"] as $opt => $replace )
                {
                    if( $slug == $opt ) {
                        $slug = str_replace($slug, $replace, $slug);
                    }
                }
            }
            ## DRESS
            if( array_key_exists("dress", $this->menu->filters["label"]) )
            {
                foreach( $this->menu->filters["label"]["dress"] as $opt => $skin )
                {
                    $slug = str_replace($opt, $slug, $skin);                    
                }
            }

        }

        return $slug;
    }

    public function url($slug)
    {
        return __url($slug);
    }

    public function onLink($slug, $url)
    {
        if( __url(request()->path()) == $url ) {
            $slug = "$slug active";
        }

        return $slug;
    }

    public function style($slug)
    {
        if( array_key_exists("style", $this->menu->filters) ) {
            if( is_array( ($data = $this->menu->filters["style"]) ) )
            {
                foreach($data as $alia => $replace )
                {
                    $slug = str_replace($alia, $replace, $slug);
                }
            }
        }
        return $slug;
    }

    public function tab( $exp=0, $inp=" " )
    {
        return str_repeat( $inp, $exp + $this->index );
    }

    public function link( $item, $index=8, $row )
    {
        $icon   = $this->icon($item["icon"]);
        $label  = $this->label($item["label"]);
        $url    = $this->url($item["url"]);
        $style  = $this->style("{link} nav-link-$row");
        $style  = $this->onLink($style, $url);
        
        $html  = $this->tab($index);
        $html .= '<a  href="'.$url.'" class="'.$style.'">'."\n";
        $html .= $this->tab($index+4);
        $html .= "$icon $label\n";
        $html .= $this->tab($index);
        $html .= "</a>\n";

        return $html;
    }

    public function dropdownLink($item, $index=8, $row)
    {
        $html  = $this->tab($index);
        $html .= '<a href="#" class="'.$this->style("{toggle} nav-link-$row").'" data-toggle="dropdown" data-bs-toggle="dropdown">';
        $html .= "\n";
        $html .= $this->tab($index+4);
        $html .= $this->icon($item["icon"]);
        $html .= $this->label($item["label"]);
        $html .= "\n";
        $html .= $this->tab($index);
        $html .= "</a>\n";

        $html .= $this->tab($index);
        $html .= '<div class="'.$this->style("{n2} dropdown-menu-$row").'">';
        $html .= "\n";        
        
        foreach( $item["dropdown"] as $key => $nav ):
            $nav   = $nav->toArray();            
            
            if( $nav["type"] == "blade" ) {
                $html .= $this->tab($index + 4);
                $html .= $this->view($nav["label"]);
                $html .= "\n";
            }
            if( $nav["type"] == "text" ) {                
                $html .= $this->tab($index + 4);
                $html .= '<div class="'.$this->style("{header} text-$row").'">';
                $html .= $nav["label"];
                $html .= '</div>';
                $html .= "\n";
            }

            if( $nav["type"] == "line" ) {
                $html .= $this->tab($index + 4);
                $html .= '<div class="'.$this->style("{line}").'">';
                $html .= '</div>';
                $html .= "\n";
            }

            if( isSimpleLink($nav))
            {
                $html .= $this->tab($index + 4);
                $html .= '<a  href="'.$this->url($nav["url"]).'" class="'.$this->style("{droplink}").'">';
                
                $html .= "\n";
                $html .= $this->tab($index+8);
                $html .= $this->icon($nav["icon"]);
                $html .= $this->label($nav["label"]);
                $html .= "\n";
    
                $html .= $this->tab($index + 4);
                $html .= "</a>\n";
            }

        endforeach;
    

        $html .= $this->tab($index);
        $html .= "</div>\n";

        return $html;
    }

    public function nav($index)
    {
        if( !empty($this->menu->items) )
        {            
            $this->index = $index;       
            
            $html  = "";
            $html .= $this->tab($index);
            $html .= '<ul class="'.$this->style("{n1}").'">';
            $html .= "\n";
            $row   = 0;
            
            foreach( $this->menu->items as $K0 => $V0 )
            {       
                $data = $V0->toArray(); 
                $row++;

                if( isLine($data) ) {
                    $html .= $this->tab($index+4);
                    $html .= '<li class="'.$this->style("{line} line-$row").'">';
                    $html .= "</li>\n";
                }

                if( isText($data) ) {
                    $html .= $this->tab($index+4);
                    $html .= '<li class="'.$this->style("{item} {notify}").'">';
                    $html .= "\n";
                    $html .= $this->tab($index+8);
                    $html .= '<a class="'.$this->style("{link} text-$row").'">';
                    $html .= $this->label($data["label"]); 
                    $html .= "</a>\n";
                    $html .= "\n";
                    $html .= $this->tab($index+4);
                    $html .= "</li>\n";
                }
                
                if( isSimpleLink( $data ) )
                { 
                    $html .= $this->tab($index+4);
                    $html .= '<li class="'.$this->style("{item} nav-item-$row").'">';
                    $html .= "\n";
    
                    $html .= $this->link( $V0->toArray(), $index+8, $row );
    
                    $html .= $this->tab($index+4);
                    $html .= "</li>\n";
                }
               
                if( isDropdownLink( $data ) )
                {  
                    $html .= $this->tab($index+4);
                    $html .= '<li class="'.$this->style("{dropitem} dropdown-$row").'">';
                    $html .= "\n";
                    
                    $html .= $this->dropdownLink( $data, $index+8, $row );
    
                    $html .= $this->tab($index+4);
                    $html .= "</li>\n";
                }
            }
   
            $html .= $this->tab($index);
            $html .= "</ul>";
    
            return $html;
        }
    }
}