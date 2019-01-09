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
        'TaskID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Fortschritt' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Kosten' => ['type' => 'decimal', 'length' => 11, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'in €'],
        'Beschreibung' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ProjektID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Zustaendiger' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'ProjektID' => ['type' => 'index', 'columns' => ['ProjektID'], 'length' => []],
            'Zustaendiger' => ['type' => 'index', 'columns' => ['Zustaendiger'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['TaskID'], 'length' => []],
            'arbeitspaket_ibfk_1' => ['type' => 'foreign', 'columns' => ['ProjektID'], 'references' => ['projekt', 'ProjektID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'arbeitspaket_ibfk_2' => ['type' => 'foreign', 'columns' => ['Zustaendiger'], 'references' => ['angestellter', 'PNr'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'TaskID' => 1,
                'Fortschritt' => 1,
                'Kosten' => 1.5,
                'Beschreibung' => 'Lorem ipsum dolor sit amet',
                'Name' => 'Lorem ipsum dolor sit amet',
                'ProjektID' => 1,
                'Zustaendiger' => 1
            ],
        ];
        parent::init();
    }
}
