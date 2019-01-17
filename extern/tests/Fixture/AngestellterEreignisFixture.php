<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AngestellterEreignisFixture
 *
 */
class AngestellterEreignisFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'angestellter_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ereignis_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ereignis_id' => ['type' => 'index', 'columns' => ['ereignis_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['angestellter_id', 'ereignis_id'], 'length' => []],
            'angestellter_ereignis_ibfk_1' => ['type' => 'foreign', 'columns' => ['angestellter_id'], 'references' => ['angestellter', 'angestellter_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'angestellter_ereignis_ibfk_2' => ['type' => 'foreign', 'columns' => ['ereignis_id'], 'references' => ['ereignis', 'ereignis_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'ereignis_id' => 1
            ],
        ];
        parent::init();
    }
}
