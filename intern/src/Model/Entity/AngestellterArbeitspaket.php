<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AngestellterArbeitspaket Entity
 *
 * @property int $angestellter_id
 * @property int $arbeitspaket_id
 *
 * @property \App\Model\Entity\Angestellter $angestellter
 * @property \App\Model\Entity\Arbeitspaket $arbeitspaket
 */
class AngestellterArbeitspaket extends Entity
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
        'angestellter' => true,
        'arbeitspaket' => true
    ];
}
