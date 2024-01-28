<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Job Portal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php if ($this->Auth->isLoggedIn()) : ?>
                    <li class="nav-item">
                        <span class="nav-link">Welcome, <?php echo $this->Auth->getUser()->email; ?></span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link"><?php echo $this->Auth->getLogOutLink(); ?></span>
                    </li>
                    <li class="nav-item">
                        <?php echo $this->Html->link('User', ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?php echo $this->Html->link('Jobs', ['controller' => 'Jobs', 'action' => 'index'], ['class' => 'nav-link']); ?>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <?php echo $this->Auth->getLoginLink(null, ['class' => 'nav-link']); ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-3">
    <?= $this->Flash->render() ?> <!-- Renders flash messages -->
</div>
