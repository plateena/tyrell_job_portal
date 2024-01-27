<h1>Job Portal</h1>
<nav>
    <?php if ($this->Auth->isLoggedIn()) : ?>
        <!-- Display username or logout link -->
        <span>Welcome, <?php echo $this->Auth->getUser()->email; ?>
        <span><?php echo $this->Auth->getLogOutLink(); ?></span>
        <?php echo $this->Html->link('User', ['controller' => 'Users', 'action' => 'index']); ?>
    <?php else: ?>
        <!-- Display login link -->
        <?php echo $this->Auth->getLoginLink() ?>
    <?php endif; ?>
</nav>

<div>
    <?= $this->Flash->render() ?> <!-- Renders flash messages -->
</div>
