<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <div class="mb-3">
                    <?= $this->Form->control('email', ['class' => 'form-control', 'label' => ['text' => 'Email']]) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('password', ['class' => 'form-control', 'label' => ['text' => 'New Password'], 'value' => '', 'placeholder' => 'Enter new password']) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="column">
        <div class="d-flex justify-content-end">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger me-2']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        </div>
    </div>
</div>
