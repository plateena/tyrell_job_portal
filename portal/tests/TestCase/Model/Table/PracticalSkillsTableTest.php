<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PracticalSkillsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PracticalSkillsTable Test Case
 */
class PracticalSkillsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PracticalSkillsTable
     */
    protected $PracticalSkills;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.PracticalSkills',
        'app.Jobs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PracticalSkills') ? [] : ['className' => PracticalSkillsTable::class];
        $this->PracticalSkills = $this->getTableLocator()->get('PracticalSkills', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PracticalSkills);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PracticalSkillsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
