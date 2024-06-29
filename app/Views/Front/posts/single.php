<?= $this->extend('front/index') ?>

<?= $this->section('page_styles') ?><!-- Linked styles, inline CSS --><?= $this->endSection() ?>

<?= $this->section('header_scripts') ?><?= $this->endSection() ?>


<?= $this->section('content') ?>
<!-- The Post Feed (Loop)-->
<?= $this->section('page_title') ?><?= $post->title ?? "No Post Found" ?><?= $this->endSection(); ?>

<?php

if ($post) {
    //echo '<h2>' . $post->title . '</h2><br>';
    echo '<div>' . $post->content . '</div><br><hr><br>';
}

?>

<?= $this->endSection() ?>

<?= $this->section('page_scripts') ?><?= $this->endSection() ?>