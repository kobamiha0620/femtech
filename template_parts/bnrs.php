<div class="side__bnrs">
<?php query_posts('post_type=post&posts_per_page=1&cat=431'); ?>
<?php if (have_posts()): ?>
    <a href="<?php the_permalink(); ?>" >
        <img src="https://femtech.tv/wp-content/uploads/2022/01/bnr_runa.png" alt="ルナスコープ" width="100%">
    </a>
<?php endif; ?>

    <a href="/consultation/">
        <img src="https://femtech.tv/wp-content/uploads/2022/01/bnr_onayami.png" alt="あなたのお悩み募集" width="100%">
    </a>
    <a href="/wrecruit/">
        <img src="https://femtech.tv/wp-content/uploads/2022/06/bnr_wrecruit.png" alt="ライター募集" width="100%">
    </a>
</div>

