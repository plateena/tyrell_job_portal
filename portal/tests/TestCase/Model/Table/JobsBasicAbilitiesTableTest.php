<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobsBasicAbilitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobsBasicAbilitiesTable Test Case
 */
class JobsBasicAbilitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JobsBasicAbilitiesTable
     */
    protected $JobsBasicAbilities;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.JobsBasicAbilities',
        'app.Jobs',
        'app.BasicAbilities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('JobsBasicAbilities') ? [] : ['className' => JobsBasicAbilitiesTable::class];
        $this->JobsBasicAbilities = $this->getTableLocator()->get('JobsBasicAbilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->JobsBasicAbilities);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\JobsBasicAbilitiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\JobsBasicAbilitiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
