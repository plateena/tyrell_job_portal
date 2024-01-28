<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JobsPersonalitiesFixture
 */
class JobsPersonalitiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'job_id' => 1,
                'personality_id' => 1,
                'sort_order' => 1,
            ],
        ];
        parent::init();
    }
}
