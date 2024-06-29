<?= $this->include('_header') ?>

<div class="container-md">
    <div class="row">
        <?= $this->renderSection('content') ?>
    </div>
</div>

<?php /* Scripts */  ?>
<?= $this->renderSection('page_scripts') ?>
<script src="<?= base_url('assets/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>