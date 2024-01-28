<?php
$perPageOptions = [20, 50, 100];
$perPage = 50;

if (isset($_GET['per_page'])) {
    $perPage = $_GET['per_page'];
}

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <?php echo $this->Form->create(null, [
                "url" => ["controller" => "Jobs", "action" => "index"],
                "type" => "get",
                "id" => "search-form"
            ]); ?>
            <div class="input-group">
                <input id="search-input" class="form-control" name="search" type="text" placeholder="Search..." value="<?php echo h($searchTerm); ?>">
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Search</button>
                <button id="reset-btn" class="btn btn-secondary" type="button"><i class="bi bi-arrow-counterclockwise"></i> Reset</button>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

    <?php if (!empty($searchTerm)): ?>
        <div class="mt-3">
            <p>Showing results for: <?php echo h($searchTerm); ?></p>
        </div>
    <?php endif; ?>

    <div class="result mt-4">
        <?php if (!empty($jobs)): ?>
            <?php foreach ($jobs as $job): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo h($job->name); ?></h5>
                        <hr>
                        <p class="card-text"><?php echo h($job->getShortDescription()); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No jobs found.</p>
        <?php endif; ?>
    </div>

    <?php if ($this->Paginator->hasNext()): ?>
        <div class="pagination mt-4 d-flex justify-content-center">
            <ul class="pagination">
                <?php echo $this->Paginator->prev(__("<<"), ['class' => 'btn btn-secondary']); ?>
                <?php echo $this->Paginator->numbers(['class' => 'btn btn-secondary', 'template' => 'paginator']); ?>
                <?php echo $this->Paginator->next(__(">>"), ['class' => 'btn btn-secondary']); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="mt-4">
        <label class="me-2">Per page:</label>
        <div class="per-page-group btn-group">
            <label class="btn <?php echo ($perPage == $perPageOptions[0]) ? ' active' : ''; ?>">
                <?php echo $this->Html->link($perPageOptions[0], ['?' => ['per_page' => $perPageOptions[0]]]); ?>
            </label>
            <label class="btn <?php echo ($perPage == $perPageOptions[1]) ? ' active' : ''; ?>">
                <?php echo $this->Html->link($perPageOptions[1], ['?' => ['per_page' => $perPageOptions[1]]]); ?>
            </label>
            <label class="btn <?php echo ($perPage == $perPageOptions[2]) ? ' active' : ''; ?>">
                <?php echo $this->Html->link($perPageOptions[2], ['?' => ['per_page' => $perPageOptions[2]]]); ?>
            </label>
        </div>
    </div>
</div>

<script>
    document.querySelector('#reset-btn').addEventListener('click', function() {
        document.querySelector('#search-input').value = ''
        document.querySelector('#search-form').submit()
    });
</script>
