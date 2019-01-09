<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Arbeitspaket Entity
 *
 * @property int $TaskID
 * @property int $Fortschritt
 * @property float $Kosten
 * @property string $Beschreibung
 * @property string $Name
 * @property int $ProjektID
 * @property int $Zustaendiger
 */
class Arbeitspaket extends Entity
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
        'Fortschritt' => true,
        'Kosten' => true,
        'Beschreibung' => true,
        'Name' => true,
        'ProjektID' => true,
        'Zustaendiger' => true
    ];
}
