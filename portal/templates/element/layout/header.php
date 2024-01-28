<header class="bg-primary py-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h1 class="text-white mb-0">Job Portal</h1>
        <?php if ($this->Auth->isLoggedIn()) : ?>
            <div class="d-flex align-items-center text-white">
                <span class="me-3"><i class="bi bi-person"></i> <?php echo $this->Auth->getUser()->email; ?></span>
                <span>
                    <a href="<?php echo Cake\Routing\Router::url(['controller' => 'Users', 'action' => 'logout']); ?>" style="text-decoration: none;" class="text-white">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </span>
            </div>
        <?php else: ?>
            <?php echo $this->Auth->getLoginLink(null, ['class' => 'btn btn-light']); ?>
        <?php endif; ?>
    </div>
</header>

<?php if ($this->Auth->isLoggedIn()) : ?>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item text-white">
                    <a class="nav-link" href="/"><i class="bi bi-house-door-fill"></i></a>
                </li>
                <li class="nav-item text-white">
                    <?php echo $this->Html->link('User', ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']); ?>
                </li>
                <li class="nav-item text-white">
                    <?php echo $this->Html->link('Jobs', ['controller' => 'Jobs', 'action' => 'index'], ['class' => 'nav-link']); ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php endif; ?>
