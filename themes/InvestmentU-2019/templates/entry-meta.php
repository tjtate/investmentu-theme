<div class="byline-container py-2">
    <?php
        $auth_id = get_the_author_meta('ID');
        $author_url = get_field('author_headshot', 'user_' . $auth_id); 
        $author = get_the_author(); 
    ?>

    <?php if(!empty($author_url)) { ?>
    <img src="<?php echo esc_url($author_url); ?>" alt="<?php echo esc_attr($author); ?>" class="headshot article-headshot align-middle d-inline-block" loading="lazy" />
    <?php } ?>
    <div class="align-middle d-inline-block ml-1">
        <p class="byline m-0"><?= __('By', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></p>
        <?php if(strtotime(get_the_date()) < strtotime(get_the_modified_time())): ?>
        <p class="publication-source m-0"><time class="updated" datetime="<?= get_the_modified_time('c'); ?>"><?= get_the_modified_time('M j, Y \a\t g:iA'); ?></time>
            </p>
        <?php else: ?>
          <p class="publication-source m-0"><time class="updated" datetime="<?= get_the_date('c'); ?>"><?= get_the_date('M j, Y \a\t g:iA'); ?></time>
            </p>
        <?php endif; ?>

    </div>
</div>
