<?php

namespace YOOtheme;

return [

    'transforms' => [

        'render' => function ($node) {

            /**
             * @var Metadata $metadata
             */
            $metadata = app(Metadata::class);

            $metadata->set('style:builder-hd-flipcard', ['href' => Path::get('./css/hd-flipcard.css')]);
            $metadata->set('script:builder-hd-flipcard', ['src' => Path::get('./js/hd-flipcard.js'), 'defer' => true]);

        },

    ],

    'updates' => [

        '2.0.0-beta.5.1' => function ($node) {

            if (@$node->props['link_back_type'] === 'content') {
                $node->props['title_back_link'] = true;
                $node->props['image_back_link'] = true;
                $node->props['link_back_text'] = '';
            } elseif (@$node->props['link_back_type'] === 'element') {
                $node->props['panel_back_link'] = true;
                $node->props['link_back_text'] = '';
            }
            unset($node->props['link_back_type']);

        },
    ],

];
