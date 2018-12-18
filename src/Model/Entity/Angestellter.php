<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Angestellter Entity
 *
 * @property string $Name
 * @property string $Vorname
 * @property int $PNr
 * @property string $Position
 * @property string $EMail
 * @property string $Tel
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
        'Telefon' => true
    ];
}
