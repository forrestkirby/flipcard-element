<?php

/* Flipcard Element Copyright (C) 2016�2021 YOOtheme GmbH, 2019�2021 Thomas Weidlich GNU GPL v3 */

$link = $props['link_text'] ? $this->el('p', [
    //
]) : null;

if ($link && $props['link_text']) {

    $link->attr([

        'class' => [
            'el-link',
            'uk-{link_style: link-(muted|text)}',
            'uk-button uk-button-{!link_style: |link-muted|link-text} [uk-button-{link_size}]',
        ],

    ]);

}

return $link;
