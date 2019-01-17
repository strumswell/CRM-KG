<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AngestellterArbeitspaketFixture
 *
 */
class AngestellterArbeitspaketFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'angestellter_arbeitspaket';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'angestellter_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'arbeitspaket_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'arbeitspaket_id' => ['type' => 'index', 'columns' => ['arbeitspaket_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['angestellter_id', 'arbeitspaket_id'], 'length' => []],
            'angestellter_arbeitspaket_ibfk_1' => ['type' => 'foreign', 'columns' => ['angestellter_id'], 'references' => ['angestellter', 'angestellter_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'angestellter_arbeitspaket_ibfk_2' => ['type' => 'foreign', 'columns' => ['arbeitspaket_id'], 'references' => ['arbeitspaket', 'arbeitspaket_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'arbeitspaket_id' => 1
            ],
        ];
        parent::init();
    }
}
