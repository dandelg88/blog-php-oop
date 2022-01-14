<article class="blog-post">
    <h2 class="blog-post-title"><?php echo $params['post']->title; ?></h2>
    <div class="mb-1">
        <?php foreach ($params['post']->tags() as $tag): ?>
            <span class="badge rounded-pill bg-success">
                <a class="text-decoration-none text-white" href="<?php echo url("tags/$tag->id"); ?>">
                    <?php echo $tag->title; ?>
                </a>
            </span>
        <?php endforeach; ?>
    </div>
    <p class="blog-post-meta">
        <small>Publicado el <?php echo $params['post']->getCreatedAt(); ?> por <a href="#">John Smith</a></small>
    </p>
    <p><?php echo $params['post']->body; ?></p>
    <a href="<?php echo url('posts'); ?>" class="btn btn-danger float-end">
        <i class="bi bi-caret-left"></i>
        Regresar
    </a>
</article>
