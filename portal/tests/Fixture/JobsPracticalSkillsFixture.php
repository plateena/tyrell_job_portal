<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JobsPracticalSkillsFixture
 */
class JobsPracticalSkillsFixture extends TestFixture
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
                'practical_skill_id' => 1,
                'sort_order' => 1,
            ],
        ];
        parent::init();
    }
}
