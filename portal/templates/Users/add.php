<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo __('Actions') ?></h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <?php echo $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-secondary btn-sm']) ?>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo __('Add User') ?></h5>
                <?php echo $this->Form->create($user) ?>
                <fieldset>
                    <div class="mb-3">
                        <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => ['text' => 'Email']]) ?>
                    </div>
                    <div class="mb-3">
                        <?php echo $this->Form->control('password', ['class' => 'form-control', 'label' => ['text' => 'Password']]) ?>
                    </div>
                </fieldset>
                <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                <?php echo $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
