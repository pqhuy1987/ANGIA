<?php
/**
 * @author : Jegtheme
 */
namespace JNews\Module\Element;

use JNews\Module\ModuleOptionAbstract;

class Element_Userlist_Option extends ModuleOptionAbstract
{
    public function compatible_column()
    {
        return array( 4, 8 , 12 );
    }

    public function set_options()
    {
        $this->set_general_option();
        $this->set_header_option();
        $this->set_content_filter_option(5);
    }

    public function get_module_name()
    {
        return esc_html__('JNews - User/Author List', 'jnews');
    }

    public function set_general_option()
    {
        $this->options[] = array(
            'type'          => 'radioimage',
            'param_name'    => 'authorlist_style',
            'std'           => 'style-1',
            'value'         => array(
                JNEWS_THEME_URL . '/assets/img/admin/author-1.png'  => 'style-1',
                JNEWS_THEME_URL . '/assets/img/admin/author-2.png'  => 'style-2',
                JNEWS_THEME_URL . '/assets/img/admin/author-3.png'  => 'style-3',
            ),
            'heading'       => esc_html__('Author List Style', 'jnews'),
            'description'   => esc_html__('Choose which style that fit your site.', 'jnews'),
        );
        $this->options[] = array(
            'type'          => 'dropdown',
            'param_name'    => 'authorlist_block',
            'heading'       => esc_html__('Author Blocks Width per Row', 'jnews'),
            'description'   => esc_html__('Please choose number of author block per row that fit your layout.', 'jnews'),
            'std'           => 'jeg_4_block',
            'value'         => array(
                '1 Block  — (100%)'   => 'jeg_1_block',
                '2 Blocks — (50%)'    => 'jeg_2_block',
                '3 Blocks — (33%)'    => 'jeg_3_block',
                '4 Blocks — (25%)'    => 'jeg_4_block',
                '5 Blocks — (20%)'    => 'jeg_5_block',
            ),
        );
        $this->options[] = array(
            'type'          => 'checkbox',
            'param_name'    => 'authorlist_desc',
            'heading'       => esc_html__('Hide Description', 'jnews'),
            'value'         => array( esc_html__('  Hide author description.', 'jnews') => 'no' ),
        );
        $this->options[] = array(
            'type'          => 'checkbox',
            'param_name'    => 'authorlist_trunc',
            'heading'       => esc_html__('Truncate Description', 'jnews'),
            'value'         => array( esc_html__('  Truncate author description if it is too long.', 'jnews') => 'no' ),
        );
        $this->options[] = array(
            'type'          => 'checkbox',
            'param_name'    => 'authorlist_social',
            'heading'       => esc_html__('Hide Socials', 'jnews'),
            'value'         => array( esc_html__('  Hide author social accounts.', 'jnews') => 'no' ),
        );
        $this->options[] = array(
            'type'          => 'dropdown',
            'param_name'    => 'authorlist_align',
            'std'           => 'jeg_author_align_left',
            'value'         => array(
                'Center'   => 'jeg_author_align_center',
                'Left'     => 'jeg_author_align_left',
                'Right'    => 'jeg_author_align_right',
            ),
            'heading'       => esc_html__('Author List Align', 'jnews'),
        );
    }

    public function set_header_option()
    {
        $this->options[] = array(
            'type' => 'iconpicker',
            'param_name' => 'header_icon',
            'heading' => esc_html__('Header Icon', 'jnews'),
            'description' => esc_html__('Choose icon for this block icon.', 'jnews'),
            'group' => esc_html__('Header', 'jnews'),
            'std' => '',
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 100,
            )
        );
        $this->options[] = array(
            'type' => 'textfield',
            'param_name' => 'first_title',
            'holder' => 'span',
            'heading' => esc_html__('Title', 'jnews'),
            'description' => esc_html__('Main title of Module Block.', 'jnews'),
            'group' => esc_html__('Header', 'jnews'),
        );
        $this->options[] = array(
            'type' => 'textfield',
            'param_name' => 'second_title',
            'holder' => 'span',
            'heading' => esc_html__('Second Title', 'jnews'),
            'description' => esc_html__('Secondary title of Module Block.', 'jnews'),
            'group' => esc_html__('Header', 'jnews'),
        );
        $this->options[] = array(
            'type' => 'textfield',
            'param_name' => 'url',
            'heading' => esc_html__('Title URL', 'jnews'),
            'description' => esc_html__('Insert URL of heading title.', 'jnews'),
            'group' => esc_html__('Header', 'jnews'),
        );
        $this->options[] = array(
            'type' => 'radioimage',
            'param_name' => 'header_type',
            'std' => 'heading_6',
            'value' => array(
                JNEWS_THEME_URL . '/assets/img/admin/heading-1.png' => 'heading_1',
                JNEWS_THEME_URL . '/assets/img/admin/heading-2.png' => 'heading_2',
                JNEWS_THEME_URL . '/assets/img/admin/heading-3.png' => 'heading_3',
                JNEWS_THEME_URL . '/assets/img/admin/heading-4.png' => 'heading_4',
                JNEWS_THEME_URL . '/assets/img/admin/heading-5.png' => 'heading_5',
                JNEWS_THEME_URL . '/assets/img/admin/heading-6.png' => 'heading_6',
                JNEWS_THEME_URL . '/assets/img/admin/heading-7.png' => 'heading_7',
                JNEWS_THEME_URL . '/assets/img/admin/heading-8.png' => 'heading_8',
                JNEWS_THEME_URL . '/assets/img/admin/heading-9.png' => 'heading_9',
            ),
            'heading' => esc_html__('Header Type', 'jnews'),
            'description' => esc_html__('Choose which header type fit with your content design.', 'jnews'),
            'group' => esc_html__('Header', 'jnews'),
        );
        $this->options[] = array(
            'type' => 'colorpicker',
            'param_name' => 'header_background',
            'heading' => esc_html__('Header Background', 'jnews'),
            'description' => esc_html__('This option may not work for all of heading type.', 'jnews'),
            'group' => esc_html__('Header', 'jnews'),
            'dependency' => array('element' => "header_type", 'value' => array('heading_1', 'heading_2', 'heading_3', 'heading_4', 'heading_5'))
        );
        $this->options[] = array(
            'type' => 'colorpicker',
            'param_name' => 'header_secondary_background',
            'heading' => esc_html__('Header Secondary Background', 'jnews'),
            'description' => esc_html__('change secondary background', 'jnews'),
            'group' => esc_html__('Header', 'jnews'),
            'dependency' => array('element' => "header_type", 'value' => array('heading_2'))
        );
        $this->options[] = array(
            'type' => 'colorpicker',
            'param_name' => 'header_text_color',
            'heading' => esc_html__('Header Text Color', 'jnews'),
            'description' => esc_html__('Change color of your header text', 'jnews'),
            'group' => esc_html__('Header', 'jnews'),
        );
        $this->options[] = array(
            'type' => 'colorpicker',
            'param_name' => 'header_line_color',
            'heading' => esc_html__('Header line Color', 'jnews'),
            'description' => esc_html__('Change line color of your header', 'jnews'),
            'group' => esc_html__('Header', 'jnews'),
            'dependency' => array('element' => "header_type", 'value' => array('heading_1', 'heading_5', 'heading_6', 'heading_9'))
        );
        $this->options[] = array(
            'type' => 'colorpicker',
            'param_name' => 'header_accent_color',
            'heading' => esc_html__('Header Accent', 'jnews'),
            'description' => esc_html__('Change Accent of your header', 'jnews'),
            'group' => esc_html__('Header', 'jnews'),
            'dependency' => array('element' => "header_type", 'value' => array('heading_6', 'heading_7'))
        );
    }

    public function set_content_filter_option($number = 10, $hide_number_post = false) {
        $this->options[] = array(
            'type'          => 'dropdown',
            'param_name'    => 'authorlist_show_role',
            'std'           => 'All',
            'value'         => array(
                'All'           => 'All',
                'Administrator' => 'Administrator',
                'Editor'        => 'Editor',
                'Author'        => 'Author',
                'Contributor'   => 'Contributor',
                'Subscriber'    => 'Subscriber',
            ),
            'heading'       => esc_html__('Show Role', 'jnews'),
            'description'   => wp_kses(__("Choose which user role will only be shown in this module.<br/>Note : If you have custom user role, it might not available here.", 'jnews'), wp_kses_allowed_html()),
            'group'         => esc_html__('Content Filter', 'jnews'),
        );
        $this->options[] = array(
            'type'          => 'dropdown',
            'param_name'    => 'authorlist_hide_role',
            'std'           => 'None',
            'value'         => array(
                'None'          => 'None',
                'Administrator' => 'Administrator',
                'Editor'        => 'Editor',
                'Author'        => 'Author',
                'Contributor'   => 'Contributor',
                'Subscriber'    => 'Subscriber',
            ),
            'heading'       => esc_html__('Hide Role', 'jnews'),
            'description'   => wp_kses(__("Choose which user role will only be hidden in this module.<br/>Note : <br/>- <b>Hide Role</b> option will override <b>Show Role</b> option,<br/>- If you have custom user role, it might not available here.", 'jnews'), wp_kses_allowed_html()),
            'group'         => esc_html__('Content Filter', 'jnews'),
        );
        $this->options[] = array(
            'type'          => 'select',
            'multiple'      => PHP_INT_MAX,
            'ajax'          => 'jeg_find_author',
            'options'       => 'jeg_get_author_option',
            'nonce'         => wp_create_nonce( 'jeg_find_author' ),

            'param_name'    => 'include_author',
            'heading'       => esc_html__('Include Author ID', 'jnews'),
            'description'   => wp_kses(__("Tips :<br/> - You can search author id by inputing the author display name.<br/>- You can also directly insert the author id, and click enter to add it on the list.", 'jnews'), wp_kses_allowed_html()),
            'group'         => esc_html__('Content Filter', 'jnews'),
            'std'           => '',
        );

        $this->options[] = array(
            'type'          => 'select',
            'multiple'      => PHP_INT_MAX,
            'ajax'          => 'jeg_find_author',
            'options'       => 'jeg_get_author_option',
            'nonce'         => wp_create_nonce( 'jeg_find_author' ),

            'param_name'    => 'exclude_author',
            'heading'       => esc_html__('Exclude Author ID', 'jnews'),
            'description'   => wp_kses(__("Tips :<br/> - You can search author id by inputing the author display name.<br/>- You can also directly insert the author id, and click enter to add it on the list.", 'jnews'), wp_kses_allowed_html()),
            'group'         => esc_html__('Content Filter', 'jnews'),
            'std'           => '',
        );
    }
}