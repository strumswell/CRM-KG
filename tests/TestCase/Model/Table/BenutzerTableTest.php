<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BenutzerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BenutzerTable Test Case
 */
class BenutzerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BenutzerTable
     */
    public $Benutzer;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.benutzer'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Benutzer') ? [] : ['className' => BenutzerTable::class];
        $this->Benutzer = TableRegistry::getTableLocator()->get('Benutzer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Benutzer);

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
