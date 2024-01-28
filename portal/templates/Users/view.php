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
                <h3 class="card-title"><?php echo h($user->email) ?></h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th><?php echo __('Email') ?></th>
                        <td><?php echo h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Id') ?></th>
                        <td><?php echo $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Created') ?></th>
                        <td><?php echo h($user->created) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo __('Modified') ?></th>
                        <td><?php echo h($user->modified) ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <?php if ($user->id !== 1) : ?>
                    <?php echo $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary me-1']) ?>
                    <?php echo $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger me-1']) ?>
                <?php endif; ?>
                <?php echo $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-secondary me-1']) ?>
                <?php echo $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
</div>
