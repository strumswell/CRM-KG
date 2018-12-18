<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoginTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoginTable Test Case
 */
class LoginTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoginTable
     */
    public $Login;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.login'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Login') ? [] : ['className' => LoginTable::class];
        $this->Login = TableRegistry::getTableLocator()->get('Login', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Login);

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
