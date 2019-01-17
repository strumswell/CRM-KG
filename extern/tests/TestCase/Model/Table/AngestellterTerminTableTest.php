<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AngestellterTerminTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AngestellterTerminTable Test Case
 */
class AngestellterTerminTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AngestellterTerminTable
     */
    public $AngestellterTermin;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.angestellter_termin',
        'app.angestellter',
        'app.termin'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AngestellterTermin') ? [] : ['className' => AngestellterTerminTable::class];
        $this->AngestellterTermin = TableRegistry::getTableLocator()->get('AngestellterTermin', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AngestellterTermin);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
