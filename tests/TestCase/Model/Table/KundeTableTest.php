<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KundeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KundeTable Test Case
 */
class KundeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KundeTable
     */
    public $Kunde;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.kunde'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Kunde') ? [] : ['className' => KundeTable::class];
        $this->Kunde = TableRegistry::getTableLocator()->get('Kunde', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Kunde);

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
