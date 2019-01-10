<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Projekt Entity
 *
 * @property int $ProjektID
 * @property string $Name
 * @property string $Beschreibung
 * @property int $KDNr
 */
class Projekt extends Entity
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
        'Projektname' => true,
        'Beschreibung' => true,
        'KDNr' => true
    ];
}
