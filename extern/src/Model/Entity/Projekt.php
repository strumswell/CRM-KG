<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Projekt Entity
 *
 * @property int $projekt_id
 * @property string $projektname
 * @property string $beschreibung
 * @property int $kunde_id
 * @property bool $abgeschlossen
 * @property \Cake\I18n\FrozenTime $hinzugefuegt_am
 *
 * @property \App\Model\Entity\Kunde $kunde
 * @property \App\Model\Entity\Angestellter[] $angestellter
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
        'projektname' => true,
        'beschreibung' => true,
        'kunde_id' => true,
        'abgeschlossen' => true,
        'hinzugefuegt_am' => true,
        'kunde' => true,
        'angestellter' => true
    ];
}
