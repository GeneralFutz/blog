<?= $this->extend('front/index') ?>

<?= $this->section('page_styles') ?><!-- Linked styles, inline CSS --><?= $this->endSection() ?>

<?= $this->section('header_scripts') ?><?= $this->endSection() ?>

<?= $this->section('page_title') ?>Post Feed<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<!-- The Post Feed (Loop)-->
<?php

if ($posts) {
    foreach ($posts as $post) {
        echo '<h2>' . $post->title . '</h2><br>';
        echo '<div>' . $post->content . '</div><br><hr><br>';
    }
}
?>

<?= $this->endSection() ?>

<?= $this->section('page_scripts') ?><?= $this->endSection() ?>