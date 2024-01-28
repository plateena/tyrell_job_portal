<?php
$perPageOptions = [20, 50, 100];
$perPage = 50;

if(isset($_GET['perPage'])) {
    $perPage = $_GET['perPage'];
}
?>
<div class="container">
    <div>
        <?php echo $this->Form->create(null, [
            "url" => ["controller" => "Jobs", "action" => "index"],
            "type" => "get",
        ]); ?>
        <div class="search-form">
            <input class="search-input" name="search" type="text" placeholder="Search..." value="<?php echo isset(
                $searchTerm
            )
                ? h($searchTerm)
                : ""; ?>">
            <button type="submit">Search</button>
            <button type="reset">Reset</button>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
    <div>
        <div class="per-page-selection">
            <?php echo $this->Form->create(null, [
                "url" => ["controller" => "Jobs", "action" => "index"],
                "type" => "get",
            ]); ?>
            <label for="per_page">Per Page:</label>
            <select id="per_page" name="per_page">
                <?php foreach ($perPageOptions as $option): ?>
                    <option value="<?php echo $option; ?>" <?php echo isset( $perPage) && $perPage == $option ? "selected" : ""; ?>><?php echo $option; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Apply</button>
            <?php echo $this->Form->end(); ?>
        </div>
        <div class="result">
            <?php if ($jobs): ?>
                <?php foreach ($jobs as $job): ?>
                    <div><?php echo h($job->name); ?></div>
                    <div><?php echo h($job->getShortDescription()); ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if ($this->Paginator->hasNext()): ?>
            <div class="pagination">
                <?php echo $this->Paginator->prev(__("Previous")); ?>
                <?php echo $this->Paginator->numbers(); ?>
                <?php echo $this->Paginator->next(__("Next")); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
