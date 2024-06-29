<?= $this->extend('admin/index') ?>

<?= $this->section('header_scripts') ?>
<!-- TinyMCE Scripts -->
<script src="<?= base_url('assets/tinymce/tinymce.min.js') ?>" referrerpolicy="origin"></script>
<script src="<?= base_url('assets/js/editor/editor.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>
<?= isset($post) ? 'Edit Post' : 'Create New Post' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="form-wrapper col-lg-10 mx-auto">
    <?= validation_list_errors('alert_list') ?>
    <form action="<?= isset($post) ? "/admin/posts/update/{$post->id}" : '/admin/posts/create' ?>" method="post">
        <label for="post-title" class="form-label">Post Title</label>
        <input type="text" class="form-control mb-2" name="title" id="post-title" value="<?= old('title', $post->title ?? '') ?>">
        <textarea id="editor" class="form-control mb-2" name="content">
            <?= old('content', $post->content ?? 'Hello World!') ?>
        </textarea>
        <button class="btn btn-secondary" type="submit"><?= isset($post) ? 'Update Post' : 'Publish Post' ?></button>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('page_scripts') ?><?= $this->endSection() ?>