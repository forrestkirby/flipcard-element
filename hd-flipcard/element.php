<?php

namespace YOOtheme;

return [

	'transforms' => [

		'render' => function ($node) {

			/**
			 * @var Metadata $metadata
			 */
			$metadata = app(Metadata::class);

			$metadata->set('style:builder-hd-flipcard', ['href' => Path::get('./css/flipcard.css'), 'defer' => true]);

		},

	],

    'updates' => [

        //

    ],

];
