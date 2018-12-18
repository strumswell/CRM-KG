<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AngestellterTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AngestellterTable Test Case
 */
class AngestellterTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AngestellterTable
     */
    public $Angestellter;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Angestellter') ? [] : ['className' => AngestellterTable::class];
        $this->Angestellter = TableRegistry::getTableLocator()->get('Angestellter', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Angestellter);

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
