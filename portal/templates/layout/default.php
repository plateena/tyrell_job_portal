<!-- File: src/Template/Layout/default.ctp -->
<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('app.css') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
</head>
<body>
    <!-- Header Section -->
    <header>
        <?= $this->element('layout/header'); ?>
    </header>

    <!-- Main Content Section -->
    <main>
        <?php echo $this->fetch('content'); ?>
    </main>

    <!-- Footer Section -->
    <footer>
        <?php echo $this->fetch('footer'); ?>
    </footer>
</body>
</html>
