<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;


/**
 * Angestellter Entity
 *
 * @property string $Name
 * @property string $Vorname
 * @property int $PNr
 * @property string $Position
 * @property string $EMail
 * @property string $Telefon
 * @property string $Username
 * @property string $Password
 */
class Angestellter extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'Name' => true,
        'Vorname' => true,
        'Position' => true,
        'EMail' => true,
        'Telefon' => true,
        'Username' => true,
        'Password' => true
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
