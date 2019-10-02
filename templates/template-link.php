<?php

$link = $props['link'] ? $this->el('a', [
    'href' => ['{link}'],
    'target' => ['_blank {@link_target}'],
    'uk-scroll' => strpos($props['link'], '#') === 0,
]) : null;

if ($link && $props['link_type'] == 'element') {

    $el->attr($link->attrs + [

        'class' => [
            'uk-display-block uk-link-toggle',
        ],

    ]);

    $props['title'] = $this->striptags($props['title']);
    $props['meta'] = $this->striptags($props['meta']);
    $props['content'] = $this->striptags($props['content']);

    if ($props['title'] && $props['title_hover_style'] != 'reset') {
        $props['title'] = $this->el('span', [
            'class' => [
                'uk-link-{title_hover_style: heading}',
                'uk-link {!title_hover_style}',
            ],
        ], $props['title'])->render($props);
    }

} elseif ($link && $props['link_type'] == 'content') {

    if ($props['image']) {
        $props['image'] = $link($props, ['class' => [

            'uk-position-cover' => $props['panel_style'] && $props['has_panel_card_image'] && in_array($props['image_align'], ['left', 'right']) && !$props['image_vertical_align'],

        ]], $props['image']);
    }

    if ($props['title']) {
        $props['title'] = $link($props, [
            'class' => [
                'uk-link-{title_hover_style}',
            ],
        ], $this->striptags($props['title']));
    }

} elseif ($link) {

    $link->attr([

        'class' => [
            'el-link',
            'uk-{link_style: link-(muted|text)}',
            'uk-button uk-button-{!link_style: |link-muted|link-text} [uk-button-{link_size}]',
        ],

    ]);

}

return $link;
