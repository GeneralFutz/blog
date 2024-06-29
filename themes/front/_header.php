<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('page_title', true) ?></title>

    <?php /* Page Styles */ ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/theme.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/prism/prism.css') ?>">

    <?= $this->renderSection('page_styles') ?>

    <?php /* Header Scripts */  ?>
    <script src="<?= base_url('assets/prism/prism.js') ?>"></script>
    <?= $this->renderSection('header_scripts') ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-primary" data-bs-theme="dark">
            <div class="container-md">
                <a class="navbar-brand" href="<?= base_url() ?>">Site Name</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('blog') ?>">Blog</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu" data-bs-theme="light">
                                <li><a class="dropdown-item" href="<?= base_url('admin/posts') ?>">Posts List</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('admin/posts/create') ?>">New Post</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>