<?php if (isset($_SESSION['msg']['success'])): ?>
    <div class="row">
        <div class="container">
            <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div><?php echo $_SESSION['msg']['success']; ?></div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row mt-3">
    <div class="container">
        <div class="d-inline">
            <h1 class="mb-3">Panel de adminitración</h1>
            <a href="<?php echo url("admin/posts/create"); ?>" class="btn btn-success float-end">
                <i class="bi bi-plus"></i>
                Nuevo
            </a>
        </div>
    </div>
</div>
<div class="row mb-2">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Publicado el</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params['posts'] as $post): ?>
                    <tr>
                        <th scope="row"><?php echo $post->id; ?></th>
                        <td><?php echo $post->title; ?></td>
                        <td><?php echo $post->getCreatedAt(); ?></td>
                        <td>
                            <a href="<?php echo url("admin/posts/edit/$post->id"); ?>"
                               class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square"></i>
                                Editar
                            </a>
                            <form class="d-inline"
                                  action="<?php echo url("admin/posts/delete"); ?>"
                                  id="form_delete_post"
                                  method="POST">
                                <input type="hidden"
                                       name="id"
                                       value="<?php echo $post->id; ?>">
                                <button type="submit"
                                        class="my-1 btn btn-sm btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php clear_session_msg(); ?>
