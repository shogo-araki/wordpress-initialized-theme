<?php 

// カスタム投稿を追加する
function add_custom_post_type()
{
    register_post_type(
        'customposts', // 1.投稿タイプ名 
        array(   // 2.オプション 
            'label' => 'customposts', // 投稿タイプの名前
            'public'        => true, // 利用する場合はtrueにする 
            'has_archive'   => true, // この投稿タイプのアーカイブを有効にする
            'menu_position' =>  4, // この投稿タイプが表示されるメニューの位置
            'menu_icon'     => 'dashicons-edit', // メニューで使用するアイコン
            'supports' => array( // サポートする機能
                'title', // タイトル
                'editor', // エディター, カスタム投稿の中にカスタムフィールドを追加するとき、エディターを使わない場合は非表示推奨
                'thumbnail', // アイキャッチ画像
            )
        )
    );
    flush_rewrite_rules(false);
}
add_action('init', 'add_custom_post_type');