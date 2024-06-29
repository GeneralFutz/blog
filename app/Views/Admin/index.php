<?= $this->include('admin/_header') ?>

<div class="d-flex">
    <div id="admin-sidebar" class="">
        <div class="heading">DASHBOARD</div>
        <ul id="admin-menu">
            <li class="admin-menu-item">
                <a href="#">
                    <div>Users</div>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="#">
                    <div>Users</div>
                </a>
            </li>
            <li class="admin-menu-item">
                <a href="#">
                    <div>Users</div>
                </a>
            </li>
        </ul>
    </div>

    <div id="admin-main">
        <h1><?= $this->renderSection('page_title') ?></h1>
        <p><?= $this->renderSection('content') ?></p>
    </div>
</div>

<?php /* Scripts */  ?>
<script src="<?= base_url('assets/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/admin/admin.js') ?>"></script>
<?= $this->renderSection('page_scripts') ?>
</body>

</html>