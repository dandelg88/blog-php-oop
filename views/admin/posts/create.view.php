<h1 class="mb-3">Creando un articulo nuevo</h1>
<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form class="row g-3" action="<?php echo url("admin/posts/store"); ?>"
                      id="form_create_post"
                      method="POST"
                      autocomplete="off">
                    <div class="col-12 mb-2">
                        <label for="input_title" class="form-label">Título</label>
                        <input type="text"
                               class="form-control"
                               id="input_title"
                               name="title"
                               value="<?php echo $_POST['title'] ?? ''; ?>"
                               placeholder="Ingresa el título del post"
                               required>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="input_content" class="form-label">Contenido</label>
                        <textarea class="form-control"
                                  id="input_content"
                                  name="body"
                                  rows="6"
                                  required><?php echo $_POST['body'] ?? ''; ?></textarea>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="input_tags" class="form-label">Etiquetas</label>
                        <select class="form-select"
                                id="input_tags"
                                name="tags[]"
                                multiple aria-label="multiple select example"
                                required>
                                <?php foreach ($params['tags'] as $tag): ?>
                                    <option value="<?php echo $tag->id; ?>"
                                        <?php if (isset($_POST['tags'])): ?>
                                            <?php foreach ($_POST['tags'] as $postTag) {
                                                echo ($tag->id === (int) $postTag) ? 'selected' : '';
                                            } ?>
                                        <?php endif; ?>
                                    ><?php echo $tag->title; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12 mb-2">
                        <div class="float-end">
                            <a href="<?php echo url('admin/posts');?>" class="btn btn-link">Cancelar</a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-plus"></i>
                                Guardar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
