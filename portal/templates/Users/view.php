<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="col-md-8">
        <div class="card border-primary mb-3">
            <div class="card-header">
                <h3 class="card-title"><?= h($user->email) ?></h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created') ?></th>
                        <td><?= h($user->created) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified') ?></th>
                        <td><?= h($user->modified) ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <?php if ($user->id !== 1): ?>
                    <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary me-1']) ?>
                    <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger me-1']) ?>
                <?php endif; ?>
                <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-secondary me-1']) ?>
                <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
