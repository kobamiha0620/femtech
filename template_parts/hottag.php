<div class="side__hottag">
    <div class="side__hottag--inner">
    <h2 class="side__ttl">
        <span class="side__ttl--en">HOT TAG</span>
    </h2>
    <ul class="side__hottag--link">
    <?php
        $ar_tags = wp_tag_cloud('format=array&number=10&orderby=count&smallest=11&largest=11&order=DESC');
        foreach ($ar_tags as $tag) { 
        $name = strip_tags($tag);
        $tag_term = get_term_by('name', $name, 'post_tag');
        ?>
       <li><a href="/tag/<?php echo $tag_term->name ?>">#<?php echo $name; ?></a></li>
        <?php } ?>
    </ul>
    </div>
</div>