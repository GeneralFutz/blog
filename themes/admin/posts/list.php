<?= $this->extend('index') ?>

<?= $this->section('header_scripts') ?>
<!-- DataTables -->
<?= $this->endSection() ?>

<?= $this->section('page_title') ?>Post List<?= $this->endSection() ?>

<!-- Post List as Table -->
<?= $this->section('content') ?>
<?php if ($posts) : ?>
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post) : ?>
                <tr>
                    <th scope="row"><?= esc($post->id); ?></th>
                    <td><?= esc($post->title); ?></td>
                    <td><?= esc($post->slug); ?></td>
                    <td>
                        <a href="<?= base_url('blog/post/' . esc($post->slug)) ?>" class="btn btn-sm btn-primary">View</a>
                        <a href="<?= base_url('admin/posts/edit/' . esc($post->id)) ?>" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


<?php endif; ?>

<?= $this->endSection() ?>
<?= $this->section('page_scripts') ?>

<?= $this->endSection() ?>s