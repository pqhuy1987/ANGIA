<?php

$options = array();

$options[] = array(
	'id'          => 'jnews_youtube_api',
	'transport'   => 'refresh',
	'default'     => '',
	'type'        => 'jnews-text',
	'label'       => esc_html__( 'Youtube API', 'jnews' ),
	'description' => sprintf(
		__( 'Insert your youtube API right here. For more information, <a href="%s">please go here</a>', 'jnews' ),
		'https://developers.google.com/youtube/v3/getting-started'
	),
);

return $options;