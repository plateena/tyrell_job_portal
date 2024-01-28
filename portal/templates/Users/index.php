<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0"><?= __('Users') ?></h3>
        <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="bg-dark text-white">
                <tr>
                    <th class="text-white"><?= $this->Paginator->sort('ID') ?></th>
                    <th class="text-white"><?= $this->Paginator->sort('Email') ?></th>
                    <th class="text-white"><?= $this->Paginator->sort('Created') ?></th>
                    <th class="text-white"><?= $this->Paginator->sort('Modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->created->format('d M Y H:i:s')) ?></td>
                        <td><?= h($user->modified->format('d M Y H:i:s')) ?></td>
                        <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-outline-secondary me-1 text-decoration-none']) ?>
                            <?php if ($user->id !== 1): ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-outline-secondary me-1 text-decoration-none']) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-sm btn-outline-danger text-decoration-none']) ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between align-items-center mt-4">
        <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </div>
</div>
