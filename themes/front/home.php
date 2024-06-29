<?= $this->extend('layout') ?>

<?= $this->section('page_styles') ?><!-- Linked styles, inline CSS --><?= $this->endSection() ?>

<?= $this->section('header_scripts') ?><?= $this->endSection() ?>

<?= $this->section('page_title') ?>
Home
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<?php
/** <!-- The Front Page --> */
?>
<img src="<?= asset('front/img/Firefly.png', 'img') ?>" alt="">
<?= $this->endSection() ?>

<?= $this->section('page_scripts') ?><?= $this->endSection() ?>