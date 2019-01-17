<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TerminTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TerminTable Test Case
 */
class TerminTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TerminTable
     */
    public $Termin;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.termin',
        'app.projekt',
        'app.angestellter'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Termin') ? [] : ['className' => TerminTable::class];
        $this->Termin = TableRegistry::getTableLocator()->get('Termin', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Termin);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
