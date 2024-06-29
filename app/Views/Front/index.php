<?= $this->include('front/_header') ?>

<div class="container-md">
    <div class="row">
        <h1><?= $this->renderSection('page_title') ?></h1>
        <?= $this->renderSection('content') ?>
    </div>
</div>

<?php /* Scripts */  ?>
<?= $this->renderSection('page_scripts') ?>
<script src="<?= base_url('assets/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>