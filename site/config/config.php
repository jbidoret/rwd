<?php
/*

---------------------------------------
Kirby Configuration
---------------------------------------

*/

return [
	'environment' => 'production',
	'debug'=>true,

	// language
	'languages' => true,
	'languages.detect' => true,

	// Blockqotes
	'accentgrave.quote.blockquote_classname' => "pullquote",

	// MD extra
	'markdown' => [
    'extra' => true
  ],

	// Smartypants
	'smartypants' => true,


	// Commentions
	'sgkirby.commentions.templatesWithComments' => ['note', 'link', 'interview', 'theme'],
	'sgkirby.commentions.templatesWithWebmentions' => ['note'],

	// 'sgkirby.commentions.templatesWithWebmentions' => ['note', 'interview',],
	'sgkirby.commentions.t.fr.snippet.list.dateFormat.date'     => 'd/m/y H:i',
	'sgkirby.commentions.t.fr.snippet.list.dateFormat.strftime' => '%d/%m/%Y %H:%M',
	'sgkirby.commentions.t.fr.snippet.form.email.optional'      => 'E-mail <span>optionel ; n’est pas affiché</span>',
	'sgkirby.commentions.t.fr.snippet.form.website.optional'    => 'Site web <span>optionel ; public si saisi</span>',
	'sgkirby.commentions.t.fr.snippet.form.responseurl' 				=> 'URL de la réponse <span>assurez-vous qu’elle contient un lien vers cette page</span>',
	'sgkirby.commentions.t.fr.snippet.form.ctacomment'          => 'Contribuer',
	'sgkirby.commentions.t.fr.snippet.form.comment'             => 'Messsage',
	'sgkirby.commentions.t.fr.snippet.list.comments'						=> 'Contributions',
	'sgkirby.commentions.t.fr.feedback.comment.queued'          => 'Merci ! Soyez patient·e, votre contribution doit être validé avant publication : )',
	'sgkirby.commentions.t.fr.feedback.comment.thankyou'        => 'Merci de votre contribution !',
	'sgkirby.commentions.t.fr.feedback.webmention.queued'       => 'Merci, votre webmention est en attente de traitement. Soyez patient·e, elle doit être validé avant publication : )',
	'sgkirby.commentions.commentfields' => [
		'name' => true,  // include name field and mark as required
		'email',         // include email as optional field
		'website',       // include optional website field
	],
	'sgkirby.commentions.hideforms' => true,
	'sgkirby.commentions.expand' => true,
	'sgkirby.commentions.secret' => 'toutsutoutblanccorpsnublancunmetrejambescolleescommecousues',



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

	'hooks' => [
		'page.create:after' => function ($page) {
			if ($page->intendedTemplate() == "event"){
				$page->changeStatus('listed');
			}
		},
		'page.update:after' => function ($newPage, $oldPage) {
			if ($newPage->intendedTemplate() == "event"){
				// $newPage->changeStatus('listed');
			}
		}
	],
	
	// RSS
	'routes' => [
		[
			'pattern' => 'feed',
			'method' => 'GET',
			'language' => '*',
			'action'  => function ($language) {
					$options = [
							'en' => [
									'title'       => 'Radical web design – Latest publications',
									'feedurl' 		=> site()->url() . '/en/feed/',
									'description' => 'Notes, links, resources',
									'link'        => '/en/feed',
									'datefield'   => 'date',
									'textfield'   => 'introduction',
									'snippet'     => 'feed/rss'
							],
							'fr' => [
									'title'       => 'Radical web design – Dernières publications',
									'feedurl' 		=> site()->url() . '/fr/feed/',
									'description' => 'Notes, liens, ressources',
									'link'        => '/fr/feed',
									'datefield'   => 'date',
									'textfield'   => 'introduction',
									'snippet'     => 'feed/rss'
							]
					];
					// site()->visit(page(), $language->code());
					$feed = site()->index()->filter(function ($page) use($language) {
						return in_array( $page->intendedTemplate(), ["note", "link"]);
					})->sortBy(function ($page) {
						return $page->date()->toDate();
					}, 'desc')->feed($options[$language->code()]);
					return $feed;
			}
		]
	]
];
