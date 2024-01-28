<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0"><?php echo __('Users') ?></h3>
        <?php echo $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th class="text-white text-center"><?php echo $this->Paginator->sort('ID') ?></th>
                    <th class="text-white text-center"><?php echo $this->Paginator->sort('Email') ?></th>
                    <th class="text-white text-center"><?php echo $this->Paginator->sort('Created') ?></th>
                    <th class="text-white text-center"><?php echo $this->Paginator->sort('Modified') ?></th>
                    <th class="actions text-center"><?php echo __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td class="text-center"><?php echo $this->Number->format($user->id) ?></td>
                        <td><?php echo h($user->email) ?></td>
                        <td class="text-center"><?php echo h($user->created->format('d M Y H:i:s')) ?></td>
                        <td class="text-center"><?php echo h($user->modified->format('d M Y H:i:s')) ?></td>
                        <td class="actions text-center">
                                <?php echo $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-outline-secondary me-1 text-decoration-none']) ?>
                            <?php if ($user->id !== 1) : ?>
                                <?php echo $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-outline-secondary me-1 text-decoration-none']) ?>
                                <?php echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-sm btn-outline-danger text-decoration-none']) ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between align-items-center mt-4">
        <?php echo $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </div>
</div>
