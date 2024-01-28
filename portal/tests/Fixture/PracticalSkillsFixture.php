<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PracticalSkillsFixture
 */
class PracticalSkillsFixture extends TestFixture
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
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'sort_order' => 1,
                'created_by' => 1,
                'created' => '2024-01-28 05:22:09',
                'modified' => '2024-01-28 05:22:09',
                'deleted' => '2024-01-28 05:22:09',
            ],
        ];
        parent::init();
    }
}
