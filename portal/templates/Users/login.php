<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow rounded">
                <div class="card-body">
                    <?= $this->Form->create() ?>
                    <fieldset>
                        <legend class="mb-4"><?= __('Please enter your email and password') ?></legend>
                        <div class="mb-3">
                            <?= $this->Form->control('email', ['label' => 'Email', 'class' => 'form-control']) ?>
                        </div>
                        <div class="mb-3">
                            <?= $this->Form->control('password', ['label' => 'Password', 'class' => 'form-control']) ?>
                        </div>
                    </fieldset>
                    <div class="mt-4">
                        <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary']); ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
