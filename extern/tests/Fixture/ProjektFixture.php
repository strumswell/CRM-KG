<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjektFixture
 *
 */
class ProjektFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'projekt';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'projekt_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'projektname' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'beschreibung' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'kunde_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'abgeschlossen' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'hinzugefuegt_am' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'KDNr' => ['type' => 'index', 'columns' => ['kunde_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['projekt_id'], 'length' => []],
            'projekt_ibfk_1' => ['type' => 'foreign', 'columns' => ['kunde_id'], 'references' => ['kunde', 'kunde_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'projekt_id' => 1,
                'projektname' => 'Lorem ipsum dolor sit amet',
                'beschreibung' => 'Lorem ipsum dolor sit amet',
                'kunde_id' => 1,
                'abgeschlossen' => 1,
                'hinzugefuegt_am' => '2019-01-12 18:33:35'
            ],
        ];
        parent::init();
    }
}
