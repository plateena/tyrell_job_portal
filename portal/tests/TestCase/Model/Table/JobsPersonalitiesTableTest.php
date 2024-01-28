<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobsPersonalitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobsPersonalitiesTable Test Case
 */
class JobsPersonalitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JobsPersonalitiesTable
     */
    protected $JobsPersonalities;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.JobsPersonalities',
        'app.Jobs',
        'app.Personalities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('JobsPersonalities') ? [] : ['className' => JobsPersonalitiesTable::class];
        $this->JobsPersonalities = $this->getTableLocator()->get('JobsPersonalities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->JobsPersonalities);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\JobsPersonalitiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\JobsPersonalitiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
