<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Kunde Entity
 *
 * @property int $KDNr
 * @property string $Name
 * @property string $Ort
 * @property int $PLZ
 * @property string $Straße
 * @property int $Hausnummer
 * @property string $EMail
 * @property string $Tel
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
        'Name' => true,
        'Ort' => true,
        'PLZ' => true,
        'Straße' => true,
        'Hausnummer' => true,
        'EMail' => true,
        'Tel' => true
    ];
}
