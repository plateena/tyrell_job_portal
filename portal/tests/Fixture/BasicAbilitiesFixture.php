<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BasicAbilitiesFixture
 */
class BasicAbilitiesFixture extends TestFixture
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
                'created' => '2024-01-28 05:22:48',
                'modified' => '2024-01-28 05:22:48',
                'deleted' => '2024-01-28 05:22:48',
            ],
        ];
        parent::init();
    }
}
