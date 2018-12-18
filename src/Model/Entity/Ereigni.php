<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ereigni Entity
 *
 * @property int $EventID
 * @property \Cake\I18n\FrozenDate $Datum
 * @property string $Art
 * @property string $Bezeichnung
 * @property int $ProjektID
 */
class Ereigni extends Entity
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
        'Datum' => true,
        'Art' => true,
        'Bezeichnung' => true,
        'ProjektID' => true
    ];
}
