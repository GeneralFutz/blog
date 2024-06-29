<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('page_title', true) ?></title>

    <link href="<?= base_url('assets/css/theme.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/admin.css') ?>" rel="stylesheet">
    <style>

    </style>
    <?= $this->renderSection('page_styles') ?>
    <?= $this->renderSection('header_scripts') ?>
</head>

<body class="admin">
    <!-- ChatGpt: -->
    <header id="admin-toolbar" class="bg-dark text-light">
        <div class="d-flex">
            <button id="admin-sidebar-toggle" role="button" class="btn btn-dark">
                <div>MENU</div>
            </button>
            <a href="<?= base_url() ?>" class="btn btn-dark">
                <div>HOME</div>
            </a>
            <a href="<?= base_url('blog') ?>" class="btn btn-dark">
                <div>FEED</div>
            </a>
            <a href="<?= base_url('admin/posts/create') ?>" class="btn btn-dark">
                <div>NEW</div>
            </a>
        </div>
    </header>