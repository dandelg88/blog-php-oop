<h1 class="mb-3"><?php echo $params['tag']->title; ?></h1>

<div class="row mb-2">
    <?php foreach ($params['tag']->posts() as $post): ?>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h5 class="mb-0"><?php echo $post->title; ?></h5>
                    <div>
                        <a href="/posts/<?php echo $post->id; ?>" class="float-end stretched-link">Ir al post</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<a href="<?php echo url('posts'); ?>" class="btn btn-danger float-end">
    Ver todos los articulos
</a>


