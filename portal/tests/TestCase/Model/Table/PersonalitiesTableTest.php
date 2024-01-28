<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonalitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonalitiesTable Test Case
 */
class PersonalitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonalitiesTable
     */
    protected $Personalities;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Personalities',
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
        $config = $this->getTableLocator()->exists('Personalities') ? [] : ['className' => PersonalitiesTable::class];
        $this->Personalities = $this->getTableLocator()->get('Personalities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Personalities);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PersonalitiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
