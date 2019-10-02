<?php

return [

	'transforms' => [

		'render' => function ($node, array $params) use ($file) {

			/**
			 * @var $app
			 * @var $theme
			 * @var $builder
			 */
			extract($params);

			$app['styles']->add('builder-hd-flipcard', "{$file['dirname']}/css/flipcard.css", [], ['defer' => true]);

		},

	],

    'updates' => [

        //

    ],

];
