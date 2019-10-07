<?php

$link_back = $props['link_back'] ? $this->el('a', [
    'href' => ['{link_back}'],
    'target' => ['_blank {@link_back_target}'],
    'uk-scroll' => strpos($props['link_back'], '#') === 0,
]) : null;

if ($link_back && $props['link_back_type'] == 'element') {

    $back->attr($link_back->attrs + [

        'class' => [
            'uk-display-block uk-link-toggle',
        ],

    ]);

    $props['title_back'] = $this->striptags($props['title_back']);
    $props['meta_back'] = $this->striptags($props['meta_back']);
    $props['content_back'] = $this->striptags($props['content_back']);

} elseif ($link_back && $props['link_back_type'] == 'content') {

    if ($props['image_back']) {
        $props['image_back'] = $link_back($props, ['class' => [

            'uk-position-cover' => $props['panel_back_style'] && $props['has_panel_back_card_image'] && in_array($props['image_back_align'], ['left', 'right']) && !$props['image_back_vertical_align'],

        ]], $props['image_back']);
    }

    if ($props['title_back']) {
        $props['title_back'] = $link_back($props, [
            'class' => [
                'uk-link-reset',
            ],
        ], $this->striptags($props['title_back']));
    }

} elseif ($link_back) {

    $link_back->attr([

        'class' => [
            'el-link-back',
            'uk-{link_back_style: link-(muted|text)}',
            'uk-button uk-button-{!link_back_style: |link-muted|link-text} [uk-button-{link_back_size}]',
        ],

    ]);

}

return $link_back;
