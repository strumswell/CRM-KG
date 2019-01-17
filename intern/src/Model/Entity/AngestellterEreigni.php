<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AngestellterEreigni Entity
 *
 * @property int $angestellter_id
 * @property int $ereignis_id
 *
 * @property \App\Model\Entity\Angestellter $angestellter
 * @property \App\Model\Entity\Ereigni $ereigni
 */
class AngestellterEreigni extends Entity
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
        'angestellter_id' => true,
        'ereignis_id' => true,
        'angestellter' => true,
        'ereigni' => true
    ];
}
