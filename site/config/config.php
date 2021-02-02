<?php
/*

---------------------------------------
Kirby Configuration
---------------------------------------

*/

return [
	'environment' => 'production',

	// language
	'languages' => true,
	'languages.detect' => true,

	// Cachebuster plugin
	'schnti.cachebuster.active' => false,

	// Markdown plugin
	'community.markdown-field.buttons'    => [['h1', 'h2', 'h3', 'h4', 'h5', 'h6'], 'bold', 'italic', 'divider', 'link','pagelink', 'email', 'file', 'divider', 'ul', 'ol', 'blockquote'],
	'community.markdown-field.font'       => [
		'family'  => 'sans-serif',
		'scaling' => true,
		'size'    => 'regular',
	],
	'community.markdown-field.query'      => [
		'pagelink' => null,
		'images'   => 'page.images',
		'files'    => 'page.files.filterBy("type", "!=", "image")',
	],
	'community.markdown-field.modals'     => true,
	'community.markdown-field.blank'      => false,
	'community.markdown-field.invisibles' => false,

	// thumbs
  'thumbs' => [
    'quality' => 80,
    'driver' => 'im',
    'bin' => '/usr/bin/convert',
    'presets' => [
      'listitem' => [ 'width' => 300, 'height' => 170, 'crop' => 'center' ]
    ],
    'srcsets' => [
      'default' => [300, 600, 800, 1024],
      'cover' => [800, 1024, 1536, 2048],
      'square' => [
        '300vw' => [ 'width' => 300, 'height' => 300, 'crop' => 'center' ],
        '600vw' => [ 'width' => 600, 'height' => 600, 'crop' => 'center' ],
        '800vw' => [ 'width' => 800, 'height' => 800, 'crop' => 'center' ],
      ],
    ]
  ],
];
