<?php

// Image
if ($props['image_back']) {

    $image_back = $this->el('image', [

        'class' => [
            'el-image-back',
            'uk-border-{image_back_border}' => !$props['panel_back_style'] || ($props['panel_back_style'] && (!$props['panel_back_card_image'] || $props['image_back_align'] == 'between')),
            'uk-box-shadow-{image_back_box_shadow} {@!panel_back_style}',

            'uk-text-{image_back_svg_color} {@image_back_svg_inline}' => $this->isImage($props['image_back']) == 'svg',
            'uk-margin[-{image_back_margin}]-top {@!image_back_margin: remove} {@!image_back_box_decoration}' => $props['image_back_align'] == 'between' || ($props['image_back_align'] == 'bottom' && !($props['panel_back_style'] && $props['panel_back_card_image'])),
        ],

        'src' => $props['image_back'],
        'alt' => $props['image_back_alt'],
        'width' => $props['image_back_width'],
        'height' => $props['image_back_height'],
        'uk-svg' => $props['image_back_svg_inline'],
        'uk-cover' => $props['panel_back_style'] && $props['panel_back_card_image'] && in_array($props['image_back_align'], ['left', 'right']),
        'thumbnail' => true,
    ]);

    echo $image_back($props, []);

    // Placeholder image if card and layout left or right
    if ($image_back->attrs['uk-cover']) {
        echo $image_back($props, [
            'class' => ['uk-invisible'],
            'uk-cover' => false,
        ]);
    }

// Icon
} elseif ($props['icon_back']) {

    $icon_back = $this->el('span', [

        'class' => [
            'el-image-back',
            'uk-text-{icon_color}',
            'uk-margin[-{image_margin}]-top {@!image_margin: remove}' => $props['image_align'] == 'between' || ($props['image_align'] == 'bottom' && !($props['panel_style'] && $props['panel_card_image'])),
        ],

        'uk-icon' => [
            'icon: {icon_back};',
            'ratio: {icon_back_ratio};',
        ],

    ]);

    echo $icon_back($props, '');
}