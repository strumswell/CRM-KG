<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ErreichbarkeitFixture
 *
 */
class ErreichbarkeitFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'erreichbarkeit';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'erreichbarkeit_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'mo' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'di' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'mi' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'don' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fr' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sa' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'so' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'angestellter_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'PNr' => ['type' => 'index', 'columns' => ['angestellter_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['erreichbarkeit_id', 'angestellter_id'], 'length' => []],
            'erreichbarkeit_ibfk_1' => ['type' => 'foreign', 'columns' => ['angestellter_id'], 'references' => ['angestellter', 'angestellter_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'erreichbarkeit_id' => 1,
                'mo' => 'Lorem ipsum dolor sit amet',
                'di' => 'Lorem ipsum dolor sit amet',
                'mi' => 'Lorem ipsum dolor sit amet',
                'don' => 'Lorem ipsum dolor sit amet',
                'fr' => 'Lorem ipsum dolor sit amet',
                'sa' => 'Lorem ipsum dolor sit amet',
                'so' => 'Lorem ipsum dolor sit amet',
                'angestellter_id' => 1
            ],
        ];
        parent::init();
    }
}
