<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <?php echo $this->Html->css('bootstrap.min.css') ?>
    <?php echo $this->Html->css('app.css') ?>
    <?php echo $this->Html->script('bootstrap.min.js') ?>
</head>
<body>
    <!-- Header Section -->
    <header class="bg-primary py-3">
        <div class="container-fluid">
            <?php echo $this->element('layout/header'); ?>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 border-left border-right" style="">
                    <?php echo $this->fetch('content'); ?>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </main>

    <!-- In your view file -->
    <?php echo $this->Flash->render(); ?>

    <!-- Footer Section -->
    <div class="mt-5 pt-5">
        <?php echo $this->element('layout/footer'); ?>
    </div>
</body>
</html>
