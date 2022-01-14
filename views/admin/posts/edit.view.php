<h1 class="mb-3">Editando el articulo #<?php echo $params['post']->id; ?></h1>
<div class="row">
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <form class="row g-3" action="<?php echo url("admin/posts/update"); ?>"
                      id="form_edit_post"
                      method="POST"
                      autocomplete="off">
                    <div class="col-12 mb-2">
                        <label for="input_title" class="form-label">Título</label>
                        <input type="hidden"
                               name="id"
                               value="<?php echo $params['post']->id; ?>">
                        <input type="text"
                               class="form-control"
                               id="input_title"
                               name="title"
                               value="<?php echo $params['post']->title; ?>"
                               placeholder="Ingresa el título del post"
                               required>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="input_content" class="form-label">Contenido</label>
                        <textarea class="form-control"
                                  id="input_content"
                                  name="body"
                                  rows="6"
                                  required><?php echo $params['post']->body; ?></textarea>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                        <label for="input_tags" class="form-label">Etiquetas</label>
                        <select class="form-select"
                                id="input_tags"
                                name="tags[]"
                                multiple aria-label="multiple select example"
                                required>
                                <?php foreach ($params['tags'] as $tag): ?>
                                    <option value="<?php echo $tag->id; ?>"
                                        <?php foreach ($params['post']->tags() as $postTag) {
                                            echo $tag->id === $postTag->id ? 'selected' : '';
                                        } ?>>
                                        <?php echo $tag->title; ?>
                                    </option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="float-end">
                            <a href="<?php echo url('admin/posts');?>" class="btn btn-link">Cancelar</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i>
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
