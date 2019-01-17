<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Erreichbarkeit Entity
 *
 * @property int $erreichbarkeit_id
 * @property string $mo
 * @property string $di
 * @property string $mi
 * @property string $don
 * @property string $fr
 * @property string $sa
 * @property string $so
 * @property int $angestellter_id
 *
 * @property \App\Model\Entity\Erreichbarkeit $erreichbarkeit
 * @property \App\Model\Entity\Angestellter $angestellter
 */
class Erreichbarkeit extends Entity
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
        'mo' => true,
        'di' => true,
        'mi' => true,
        'don' => true,
        'fr' => true,
        'sa' => true,
        'so' => true,
        'erreichbarkeit' => true,
        'angestellter' => true
    ];
}
