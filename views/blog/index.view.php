<h1 class="mb-3">Últimos artículos publicados</h1>
<p></p>
<div class="row mb-2">
    <?php foreach ($params['posts'] as $post): ?>
        <div class="col-md-12">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <div class="mb-1">
                        <?php foreach ($post->tags() as $tag): ?>
                            <span class="badge rounded-pill bg-success">
                                <a class="text-decoration-none text-white" href="<?php echo url("tags/$tag->id"); ?>">
                                    <?php echo $tag->title; ?>
                                </a>
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <h3 class="mb-0"><?php echo $post->title; ?></h3>
                    <div class="mb-1 text-muted"><small>Publicado el <?php echo $post->getCreatedAt(); ?></small></div>
                    <p class="card-text mb-auto"><?php echo $post->getExcerpt(); ?></p>
                    <div>
                        <a href="<?php echo url("posts/$post->id"); ?>" class="float-end btn btn-link">Continuar leyendo</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
