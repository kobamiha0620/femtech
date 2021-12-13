<!-- pagenation -->
<div class="pager">
<div class="pagination">

<?php 
if ($the_query->max_num_pages > 1) {
    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => 'page/%#%/',
        'current' => max(1, $paged),
        'mid_size' => 1,
        'type'          => 'plain',
        'prev_text'     => __( '＜'), // 「前へ」リンクのテキスト
        'next_text'     => __( '＞'), // 「次へ」リンクのテキスト
        'total' => $the_query->max_num_pages
    ));
}
?>
</div>
</div><!-- /pagenation -->