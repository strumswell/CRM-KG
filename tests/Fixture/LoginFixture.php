<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LoginFixture
 *
 */
class LoginFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'login';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'UserID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'PNr' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'KDNr' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Username' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'PNr' => ['type' => 'index', 'columns' => ['PNr'], 'length' => []],
            'KDNr' => ['type' => 'index', 'columns' => ['KDNr'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['UserID'], 'length' => []],
            'login_ibfk_1' => ['type' => 'foreign', 'columns' => ['PNr'], 'references' => ['angestellter', 'PNr'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'login_ibfk_2' => ['type' => 'foreign', 'columns' => ['KDNr'], 'references' => ['kunde', 'KDNr'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'UserID' => 1,
                'PNr' => 1,
                'KDNr' => 1,
                'Username' => 'Lorem ipsum dolor sit amet',
                'Password' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
