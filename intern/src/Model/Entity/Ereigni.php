<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ereigni Entity
 *
 * @property int $ereignis_id
 * @property \Cake\I18n\FrozenDate $datum
 * @property string $art
 * @property string $bezeichnung
 * @property int $projekt_id
 *
 * @property \App\Model\Entity\Projekt $projekt
 * @property \App\Model\Entity\Angestellter[] $angestellter
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
        'datum' => true,
        'art' => true,
        'bezeichnung' => true,
        'projekt_id' => true,
        'projekt' => true,
        'angestellter' => true
    ];
}
