<div class="container">
    <div>
        <form method="GET" action="<?= $this->MyUrl->generateUrl( "Jobs", "index") ?>">
            <input class="search-input" name="search" type="text" placeholder="Search...">
            <input type="submit" value="Search">
            <input type="reset" value="Reset">
        </form>
    </div>
    <div>
        Result:
        <div>
            <?php foreach ($jobs as $job): ?>
            <div><?= $job->name; ?></div>
            <div><?= strlen($job->description) > 100 ? substr($job->description, 0, 100) . "..." : $job->description; ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
