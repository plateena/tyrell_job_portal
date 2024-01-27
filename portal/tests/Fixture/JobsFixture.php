<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JobsFixture
 */
class JobsFixture extends TestFixture
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
                'media_id' => 1,
                'job_category_id' => 1,
                'job_type_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'detail' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'business_skill' => 'Lorem ipsum dolor sit amet',
                'knowledge' => 'Lorem ipsum dolor sit amet',
                'location' => 'Lorem ipsum dolor sit amet',
                'activity' => 'Lorem ipsum dolor sit amet',
                'academic_degree_doctor' => 1,
                'academic_degree_master' => 1,
                'academic_degree_professional' => 1,
                'academic_degree_bachelor' => 1,
                'salary_statistic_group' => 'Lorem ipsum dolor sit amet',
                'salary_range_first_year' => 1.5,
                'salary_range_average' => 1.5,
                'salary_range_remarks' => 'Lorem ipsum dolor sit amet',
                'restriction' => 'Lorem ipsum dolor sit amet',
                'estimated_total_workers' => 'Lorem ipsum dolor sit amet',
                'remarks' => 'Lorem ipsum dolor sit amet',
                'url' => 'Lorem ipsum dolor sit amet',
                'seo_description' => 'Lorem ipsum dolor sit amet',
                'seo_keywords' => 'Lorem ipsum dolor sit amet',
                'sort_order' => 1,
                'publish_status' => 1,
                'version' => 1,
                'created_by' => 1,
                'created' => '2024-01-27 10:05:52',
                'modified' => '2024-01-27 10:05:52',
                'deleted' => '2024-01-27 10:05:52',
            ],
        ];
        parent::init();
    }
}
