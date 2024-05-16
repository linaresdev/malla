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
        "style" => [
            "{n1}"          => "navbar-nav bg-white my-3 flex-column rounded-1 px-0",
            "{n2}"          => "dropdown-menu",
            "{item}"        => "nav-item",
            "{dropitem}"    => "nav-item dropdown",
            "{link}"        => "nav-link px-3",
            "{toggle}"      => "nav-link px-3 dropdown-toggle",
            "{droplink}"    => "dropdown-item",
            "{header}"      => "px-2",
            "{line}"        => "border-bottom my-0",
        ]
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
        if( empty($slug) ):
			return NULL;
		elseif($slug == "icon-toggle-nav"):
			return '<i class="mdi mdi-segment"></i> ';
		elseif( preg_match('/^mdi/', $slug) ) :
			return '<i class="mdi '.$slug.'"></i> ';
		elseif( preg_match('/^glyphicon/', $slug) ):
			return '<span class="'.$slug.'"></span> ';
		elseif ( preg_match('/[jpg|png|svg|gif]/i', $slug) ):
			return '<img src="'.__url($slug).'" class="navicon" alt="@"> ';
		endif;
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

    // public function line( $index )
    // {
    //     $html  = $this->tab($index);
    //     $html .= '<li class="'.$this->style("{line}").'">';
    //     // $html .= "\n";
    //     // $html .= '<hr class="dropdown-divider">';
    //     // $html .= $this->tab($index);
    //     $html .= "</li>\n";

    //     return $html;
    // }

    public function link( $item, $index=8 )
    {
        $icon   = $this->icon($item["icon"]);
        $label  = $this->label($item["label"]);
        $url    = $this->url($item["url"]);
        $style  = $this->style("{link}");
        $style  = $this->onLink($style, $url);
        
        $html  = $this->tab($index);
        $html .= '<a  href="'.$url.'" class="'.$style.'">'."\n";
        $html .= $this->tab($index+4);
        $html .= "$icon $label\n";
        $html .= $this->tab($index);
        $html .= "</a>\n";

        return $html;
    }

    public function dropdownLink($item, $index=8)
    { 
        $html  = $this->tab($index);
        $html .= '<a href="#" class="'.$this->style('{toggle}').'" data-toggle="dropdown" data-bs-toggle="dropdown">';
        $html .= "\n";
        $html .= $this->tab($index+4);
        $html .= $this->icon($item["icon"]);
        $html .= $this->label($item["label"]);
        $html .= "\n";
        $html .= $this->tab($index);
        $html .= "</a>\n";

        $html .= $this->tab($index);
        $html .= '<div class="'.$this->style('{n2}').'">';
        $html .= "\n";        
        
        foreach( $item["dropdown"] as $key => $nav ):
            $nav   = $nav->toArray();            
            
            if( $nav["type"] == "text" ) {
                
                $html .= $this->tab($index + 4);
                $html .= '<div class="'.$this->style("{header}").'">';
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
        if( !empty($this->menu->items) ) {
            
            $this->index = $index;       
            
            $html  = "\n";
            $html .= $this->tab($index);
            $html .= '<ul class="'.$this->style("{n1}").'">';
            $html .= "\n";
            
            foreach( $this->menu->items as $K0 => $V0 )
            {       
                $data = $V0->toArray(); 
                
                if( isLine($data) ) {
                    $html .= $this->tab($index+4);
                    $html .= '<li class="'.$this->style("{line}").'">';
                    $html .= "</li>\n";
                }

                if( isText($data) ) {
                    $html .= $this->tab($index+4);
                    $html .= '<li class="'.$this->style("{item}").'">';
                    $html .= "\n";
                    $html .= $this->tab($index+8);
                    $html .= '<div class="'.$this->style("{link}").'">';
                    $html .= $this->label($data["label"]); 
                    $html .= "</a>\n";
                    $html .= "\n";
                    $html .= $this->tab($index+4);
                    $html .= "</li>\n";
                }
                
                if( isSimpleLink( $data ) )
                { 
                    $html .= $this->tab($index+4);
                    $html .= '<li class="'.$this->style("{item}").'">';
                    $html .= "\n";
    
                    $html .= $this->link( $V0->toArray(), $index+8 );
    
                    $html .= $this->tab($index+4);
                    $html .= "</li>\n";
                }
               
                if( isDropdownLink( $data ) )
                {  
                    $html .= $this->tab($index+4);
                    $html .= '<li class="'.$this->style("{dropitem}").'">';
                    $html .= "\n";
                    
                    $html .= $this->dropdownLink( $data, $index+8 );
    
                    $html .= $this->tab($index+4);
                    $html .= "</li>\n";
                }
            }
    
            $html .= $this->tab($index);
            $html .= "<ul>\n";
    
            return $html;
        }
    }
}