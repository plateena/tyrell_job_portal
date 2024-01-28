<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JobTypesFixture
 */
class JobTypesFixture extends TestFixture
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
                'job_category_id' => 1,
                'sort_order' => 1,
                'created_by' => 1,
                'created' => '2024-01-27 11:20:59',
                'modified' => '2024-01-27 11:20:59',
                'deleted' => '2024-01-27 11:20:59',
            ],
        ];
        parent::init();
    }
}
