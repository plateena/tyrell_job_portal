<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobsPracticalSkillsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobsPracticalSkillsTable Test Case
 */
class JobsPracticalSkillsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JobsPracticalSkillsTable
     */
    protected $JobsPracticalSkills;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.JobsPracticalSkills',
        'app.Jobs',
        'app.PracticalSkills',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('JobsPracticalSkills') ? [] : ['className' => JobsPracticalSkillsTable::class];
        $this->JobsPracticalSkills = $this->getTableLocator()->get('JobsPracticalSkills', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->JobsPracticalSkills);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\JobsPracticalSkillsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\JobsPracticalSkillsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
