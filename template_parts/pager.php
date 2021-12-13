<div class="pager">
<?php 
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
the_posts_pagination(
    array(
        'mid_size'      => 1, // 現在ページの左右に表示するページ番号の数
        'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
        'prev_text'     => __( '＜'), // 「前へ」リンクのテキスト
        'next_text'     => __( '＞'), // 「次へ」リンクのテキスト
        'type'          => 'plain', // 戻り値の指定 (plain/list)
    )
); ?>
</div>

