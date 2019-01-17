<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AngestellterEreignisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AngestellterEreignisTable Test Case
 */
class AngestellterEreignisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AngestellterEreignisTable
     */
    public $AngestellterEreignis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.angestellter_ereignis',
        'app.angestellter',
        'app.ereignis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AngestellterEreignis') ? [] : ['className' => AngestellterEreignisTable::class];
        $this->AngestellterEreignis = TableRegistry::getTableLocator()->get('AngestellterEreignis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AngestellterEreignis);

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
