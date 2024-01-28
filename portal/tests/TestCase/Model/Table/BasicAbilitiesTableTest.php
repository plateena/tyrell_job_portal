<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BasicAbilitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BasicAbilitiesTable Test Case
 */
class BasicAbilitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BasicAbilitiesTable
     */
    protected $BasicAbilities;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.BasicAbilities',
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
        $config = $this->getTableLocator()->exists('BasicAbilities') ? [] : ['className' => BasicAbilitiesTable::class];
        $this->BasicAbilities = $this->getTableLocator()->get('BasicAbilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->BasicAbilities);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BasicAbilitiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
