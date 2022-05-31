<?php
// サムネイル有効化
add_theme_support('post-thumbnails');

// タイトルタグ有効化
add_theme_support('title-tag');

// 各ページのタイトル出力
function change_title_tag($title)
{
    $title = 'dev';
    $current_url = get_the_permalink();
    if (strpos($current_url, "/contact") !== false) {
        $title = "お問い合わせ | " . $title;
    } else if (strpos($current_url, "/company") !== false) {
        $title = "会社概要 | " . $title;
    }
    return $title;
}
add_filter('pre_get_document_title', 'change_title_tag');
