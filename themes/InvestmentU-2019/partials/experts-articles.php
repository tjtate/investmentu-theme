<div class="row my-4 row-eq-height category-article-preview-row border-top related-author-posts pt-4">
    <div class="col-12">
        <h2>Articles by <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn p-black"><?= get_the_author(); ?></a></h2>
    </div>
    <?php echo get_related_author_posts(); ?>
</div>
