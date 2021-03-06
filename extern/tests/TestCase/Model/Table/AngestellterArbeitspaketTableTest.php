<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AngestellterArbeitspaketTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AngestellterArbeitspaketTable Test Case
 */
class AngestellterArbeitspaketTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AngestellterArbeitspaketTable
     */
    public $AngestellterArbeitspaket;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.angestellter_arbeitspaket',
        'app.angestellter',
        'app.arbeitspaket'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AngestellterArbeitspaket') ? [] : ['className' => AngestellterArbeitspaketTable::class];
        $this->AngestellterArbeitspaket = TableRegistry::getTableLocator()->get('AngestellterArbeitspaket', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AngestellterArbeitspaket);

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
