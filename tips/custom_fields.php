<?php

// https://fit-jp.com/customfield/
// カスタム投稿にカスタムフィールドを追加する

function custom_fields()
{
    add_meta_box('foods_setting', 'sample', 'insert_custom_fields', 'sample', 'normal');
}
add_action('admin_menu', 'custom_fields');


function insert_custom_fields()
{
    global $post;
    echo 'sample1: <input type="text" name="sample1" value="' . get_post_meta($post->ID, 'sample1', true) . '" size="50" /><br>';
    echo 'sample2: <input type="text" name="sample2" value="' . get_post_meta($post->ID, 'sample2', true) . '" size="50" /><br>';
    echo 'sample3: <textarea type="text" name="sample3" style="width:500px;" />' . get_post_meta($post->ID, 'sample3', true) . '</textarea><br>';
}

function save_custom_fields($post_id)
{
    $sample1 = "sample1";
    $sample2 = "sample2";
    $sample3 = "sample3";

    if (!empty($_POST[$sample1])) {
        update_post_meta($post_id, $sample1, $_POST[$sample1]);
    } else {
        delete_post_meta($post_id, $sample1);
    }
    if (!empty($_POST[$sample2])) {
        update_post_meta($post_id, $sample2, $_POST[$sample2]);
    } else {
        delete_post_meta($post_id, $sample2);
    }
    if (!empty($_POST[$sample3])) {
        update_post_meta($post_id, $sample3, $_POST[$sample3]);
    } else {
        delete_post_meta($post_id, $sample3);
    }
}
add_action('save_post', 'save_custom_fields');



// 表示の仕方　改行付き　textboxタグに使う
// echo nl2br(get_post_meta($post->ID, 'sample3', true)); 

// 表示の仕方　改行なし inputタグに使う
// echo get_post_meta($post->ID, 'sample1', true);