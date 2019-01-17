<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AngestellterController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AngestellterController Test Case
 */
class AngestellterControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.angestellter',
        'app.arbeitspaket',
        'app.projekt',
        'app.termin',
        'app.angestellter_arbeitspaket',
        'app.angestellter_projekt',
        'app.angestellter_termin'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
