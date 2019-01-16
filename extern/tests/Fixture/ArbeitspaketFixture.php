<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArbeitspaketFixture
 *
 */
class ArbeitspaketFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'arbeitspaket';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'arbeitspaket_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fortschritt' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'in %', 'precision' => null, 'autoIncrement' => null],
        'kosten' => ['type' => 'decimal', 'length' => 11, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'in €'],
        'beschreibung' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'projekt_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'zustaendiger' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'hinzugefuegt_am' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'abgeschlossen_am' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'frist' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'ProjektID' => ['type' => 'index', 'columns' => ['projekt_id'], 'length' => []],
            'Zustaendiger' => ['type' => 'index', 'columns' => ['zustaendiger'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['arbeitspaket_id'], 'length' => []],
            'arbeitspaket_ibfk_1' => ['type' => 'foreign', 'columns' => ['projekt_id'], 'references' => ['projekt', 'projekt_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'arbeitspaket_ibfk_2' => ['type' => 'foreign', 'columns' => ['zustaendiger'], 'references' => ['angestellter', 'angestellter_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'arbeitspaket_id' => 1,
                'fortschritt' => 1,
                'kosten' => 1.5,
                'beschreibung' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'projekt_id' => 1,
                'zustaendiger' => 1,
                'hinzugefuegt_am' => '2019-01-12 18:31:45',
                'abgeschlossen_am' => '2019-01-12 18:31:45',
                'frist' => '2019-01-12 18:31:45'
            ],
        ];
        parent::init();
    }
}
