<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
<!--    <link href="adminassets/css/styles.css" rel="stylesheet" />-->
    <?= $this->Html->css(['admin-styles']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <?= $this->element('nav');?>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
     <?= $this->element('sidebar');?>
    </div>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">

        </footer>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!--<script src="adminassets/js/scripts.js"></script>-->
</body>
</html>
