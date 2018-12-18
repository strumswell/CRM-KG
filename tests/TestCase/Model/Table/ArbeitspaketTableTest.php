<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArbeitspaketTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArbeitspaketTable Test Case
 */
class ArbeitspaketTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ArbeitspaketTable
     */
    public $Arbeitspaket;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('Arbeitspaket') ? [] : ['className' => ArbeitspaketTable::class];
        $this->Arbeitspaket = TableRegistry::getTableLocator()->get('Arbeitspaket', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Arbeitspaket);

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
