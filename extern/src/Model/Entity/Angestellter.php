<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

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
 * @property \App\Model\Entity\Projekt[] $projekt
 * @property \App\Model\Entity\Termin[] $termin
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
        'projekt' => true,
        'termin' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
