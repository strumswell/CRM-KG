<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ErreichbarkeitTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ErreichbarkeitTable Test Case
 */
class ErreichbarkeitTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ErreichbarkeitTable
     */
    public $Erreichbarkeit;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.erreichbarkeit',
        'app.erreichbarkeits',
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
        $config = TableRegistry::getTableLocator()->exists('Erreichbarkeit') ? [] : ['className' => ErreichbarkeitTable::class];
        $this->Erreichbarkeit = TableRegistry::getTableLocator()->get('Erreichbarkeit', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Erreichbarkeit);

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
