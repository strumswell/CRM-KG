<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjektTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjektTable Test Case
 */
class ProjektTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjektTable
     */
    public $Projekt;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projekt'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Projekt') ? [] : ['className' => ProjektTable::class];
        $this->Projekt = TableRegistry::getTableLocator()->get('Projekt', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Projekt);

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
}
