<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AngestellterProjektFixture
 *
 */
class AngestellterProjektFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'angestellter_projekt';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'angestellter_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'projekt_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'projekt_id' => ['type' => 'index', 'columns' => ['projekt_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['angestellter_id', 'projekt_id'], 'length' => []],
            'angestellter_projekt_ibfk_1' => ['type' => 'foreign', 'columns' => ['angestellter_id'], 'references' => ['angestellter', 'angestellter_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'angestellter_projekt_ibfk_2' => ['type' => 'foreign', 'columns' => ['projekt_id'], 'references' => ['projekt', 'projekt_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'angestellter_id' => 1,
                'projekt_id' => 1
            ],
        ];
        parent::init();
    }
}
