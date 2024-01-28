<div class="container">
    <div>
        <form method="GET" action="<?php echo $this->MyUrl->generateUrl( "Jobs", "index") ?>">
            <input class="search-input" name="search" type="text" placeholder="Search...">
            <input type="submit" value="Search">
            <input type="reset" value="Reset">
        </form>
    </div>
    <div>
        Result:
        <div>
            <?php if ($jobs): ?>
                <?php foreach ($jobs as $job): ?>
                    <div><?php echo $job->name ?></div>
                    <div><?php echo $job->getShortDescription() ?></div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
