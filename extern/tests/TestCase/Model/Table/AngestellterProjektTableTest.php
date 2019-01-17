<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AngestellterProjektTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AngestellterProjektTable Test Case
 */
class AngestellterProjektTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AngestellterProjektTable
     */
    public $AngestellterProjekt;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.angestellter_projekt',
        'app.angestellter',
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
        $config = TableRegistry::getTableLocator()->exists('AngestellterProjekt') ? [] : ['className' => AngestellterProjektTable::class];
        $this->AngestellterProjekt = TableRegistry::getTableLocator()->get('AngestellterProjekt', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AngestellterProjekt);

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
