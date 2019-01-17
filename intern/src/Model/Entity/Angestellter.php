<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Angestellter Entity
 *
 * @property string $nachname
 * @property string $vorname
 * @property int $angestellter_id
 * @property string $position
 * @property string $email
 * @property string $telefon
 * @property string $username
 * @property string $password
 *
 * @property \App\Model\Entity\Arbeitspaket[] $arbeitspaket
 * @property \App\Model\Entity\Ereigni[] $ereignis
 * @property \App\Model\Entity\Projekt[] $projekt
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
        'nachname' => true,
        'vorname' => true,
        'position' => true,
        'email' => true,
        'telefon' => true,
        'username' => true,
        'password' => true,
        'arbeitspaket' => true,
        'ereignis' => true,
        'projekt' => true
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
