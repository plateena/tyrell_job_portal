<!-- src/Template/Users/login.php -->
<div class="users form content">
    <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Please enter your email and password') ?></legend>
            <?= $this->Form->control('email', ['label' => 'Email']) ?>
            <?= $this->Form->control('password', ['label' => 'Password']) ?>
        </fieldset>
        <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>
