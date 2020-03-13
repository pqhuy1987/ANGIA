<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Element;

use JNews\Module\ModuleViewAbstract;

class Element_Userlist_View extends ModuleViewAbstract
{
    public function render_module($attr, $column_class)
    {
        /** Variables (for readability) */
        $style          = $attr['authorlist_style'];
        $align          = $attr['authorlist_align'];
        $block          = $attr['authorlist_block'];
        $hide_desc      = $attr['authorlist_desc'];
        $hide_social    = $attr['authorlist_social'];
        $trunc_desc     = $attr['authorlist_trunc'];
        $show_role      = $attr['authorlist_show_role'];
        $hide_role      = $attr['authorlist_hide_role'];
        $exclude        = array_filter(explode(",",$attr['exclude_author']));
        $include        = array_filter(explode(",",$attr['include_author']));
        $social_array   = $this->declare_socials();
        $output         = "";


        /** Get authors data */
        if ($show_role === 'All'){
            $user_query = new \WP_User_Query( $attr );
        }
        else {
            $user_query = new \WP_User_Query( array( 'role' => $show_role ) );
        }
        if ($hide_role !== 'None') {
            $user_query = new \WP_User_Query( array( 'role__not_in' => $hide_role ) );
        }
        $authors = $user_query->get_results();


        /** Get author alignment */
        $align_css = "";
        if ($align === 'jeg_author_align_left'){
            $align_css = "style = text-align:left";
        }
        elseif ($align === 'jeg_author_align_right'){
            $align_css = "style = text-align:right";
        }


        /** Get style option */
        if (!empty($style)) {
            $output = $output."<div class='jeg_authorlist ".$style." ".$block."' ".$align_css.">";
        }
        else {
            $output = $output."<div class='jeg_authorlist style-1 ".$block."' ".$align_css.">";
        }


        /** Render Title */
        $output = $output.$this->render_header($attr)."<ul>";


        /** Author List Content */
        foreach ($authors as $author) {
            if ($this->author_filter($author->ID,$include,$exclude)) {

                // ~ AVATAR
                $output = $output . "<li><div class='jeg_authorlist-photo'><a href=\"" . get_bloginfo('url') . "/?author=" . $author->ID . "\">" . get_avatar($author->ID, 150) . "</a></div>";

                // ~ NAME
                $output = $output."<div class='jeg_authorlist-content'>";
                if (get_user_meta($author->ID, 'first_name', true) || get_user_meta($author->ID, 'last_name', true)) {
                    $name = get_user_meta($author->ID, 'first_name', true) . " " . get_user_meta($author->ID, 'last_name', true);
                } else {
                    $name = get_the_author_meta('display_name', $author->ID);
                }
                /*$name = strlen($name) > 70 ? substr($name, 0, 70) . "..." : $name;*/
                $output = $output . "<a href=\"" . get_bloginfo('url') . "/?author=" . $author->ID . "\" class='jeg_authorlist-name'>" . $name . "</a>";

                // ~ DESCRIPTION
                if (!$hide_desc) {
                    $desc = get_the_author_meta('description', $author->ID);
                    if ($trunc_desc) {
                        $desc = strlen($desc) > 140 ? substr($desc, 0, 140) . "..." : $desc;
                    }
                    $output = $output . "<span class='jeg_authorlist-desc'>" . $desc . "</span>";
                }
                $output = $output."</div>";

                // ~ SOCIALS
                $socials = $this->check_socials($author->ID,$social_array);
                if (!$hide_social && !empty($socials)) {
                    $output = $output . "<div class='jeg_authorlist-socials'>" . $socials . "</div>";
                }

                // ~ CLOSING LIST TAGS
                $output = $output . "</li>";
            }
        }
        $output = $output."</ul></div>";

        return $output;
    }

    public function author_filter($author_id,$include,$exclude)
    {
        if ( (!empty($include) && !in_array($author_id,$include)) || (!empty($exclude) && in_array($author_id,$exclude)) ) {
            return false;
        }
        else {
            return true;
        }
    }

    public function render_header($attr)
    {
        if ( defined('POLYLANG_VERSION') ) {
            $attr['first_title'] = jnews_return_polylang($attr['first_title']);
            $attr['second_title'] = jnews_return_polylang($attr['second_title']);
            $attr['header_filter_text'] = jnews_return_polylang($attr['header_filter_text']);
        }

        // Heading
        $subtitle       = ! empty($attr['second_title']) ? "<strong>{$attr['second_title']}</strong>"  : "";
        $header_class   = "jeg_block_{$attr['header_type']}";
        $heading_title  = $attr['first_title'] . $subtitle;

        $output = "";

        if(!empty($heading_title)) {
            $heading_icon   = empty($attr['header_icon']) ? "" : "<i class='{$attr['header_icon']}'></i>";
            $heading_title  = "<span>{$heading_icon}{$attr['first_title']}{$subtitle}</span>";
            $heading_title  = ! empty($attr['url']) ? "<a href='{$attr['url']}'>{$heading_title}</a>" : $heading_title;
            $heading_title  = "<h3 class=\"jeg_block_title\">{$heading_title}</h3>";

            // Now Render Output
            $output =
                "<div class=\"jeg_block_heading {$header_class} jeg_subcat_right\">
                {$heading_title}
            </div>";
        }

        return $output;
    }

    public function declare_socials()
    {
        $social_array   = array(
            "url"           => "fa-globe",
            "facebook"      => "fa-facebook-official",
            "twitter"       => "fa-twitter",
            "linkedin"      => "fa-linkedin",
            "pinterest"     => "fa-pinterest",
            "behance"       => "fa-behance",
            "github"        => "fa-github",
            "flickr"        => "fa-flickr",
            "tumblr"        => "fa-tumblr",
            "dribbble"      => "fa-dribbble",
            "soundcloud"    => "fa-soundcloud",
            "instagram"     => "fa-instagram",
            "vimeo"         => "fa-vimeo",
            "youtube"       => "fa-youtube-play",
            "vk"            => "fa-vk",
            "reddit"        => "fa-reddit",
            "weibo"         => "fa-weibo",
            "rss"           => "fa-rss"
        );

        return $social_array;
    }

    public function check_socials($author,$social_array)
    {
        $socials = "";

        foreach ($social_array as $key => $value) {
            if( get_the_author_meta( $key, $author  )){
                $socials = $socials . "<a target='_blank' href='".get_the_author_meta( $key, $author  )."' class='".$key."'><i class='fa ".$value."'></i> </a>";
            }
        }

        return $socials;
    }
}