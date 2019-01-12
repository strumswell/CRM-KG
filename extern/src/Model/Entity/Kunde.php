<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher; //include this line
use Cake\ORM\Entity;

/**
 * Kunde Entity
 *
 * @property int $kunde_id
 * @property string $name
 * @property string $ort
 * @property int $plz
 * @property string $straße
 * @property int $hausnummer
 * @property string $email
 * @property string $telefon
 * @property string $username
 * @property string $passwort
 * @property \Cake\I18n\FrozenTime $registriert_am
 */
class Kunde extends Entity
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
        'name' => true,
        'ort' => true,
        'plz' => true,
        'straße' => true,
        'hausnummer' => true,
        'email' => true,
        'telefon' => true,
        'username' => true,
        'password' => true,
        'registriert_am' => true
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
