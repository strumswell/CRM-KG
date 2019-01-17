<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AngestellterTerminFixture
 *
 */
class AngestellterTerminFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'angestellter_termin';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'angestellter_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'termin_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ereignis_id' => ['type' => 'index', 'columns' => ['termin_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['angestellter_id', 'termin_id'], 'length' => []],
            'angestellter_termin_ibfk_1' => ['type' => 'foreign', 'columns' => ['angestellter_id'], 'references' => ['angestellter', 'angestellter_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'angestellter_termin_ibfk_2' => ['type' => 'foreign', 'columns' => ['termin_id'], 'references' => ['termin', 'termin_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'termin_id' => 1
            ],
        ];
        parent::init();
    }
}
