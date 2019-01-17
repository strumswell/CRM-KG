<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Arbeitspaket Entity
 *
 * @property int $arbeitspaket_id
 * @property int $fortschritt
 * @property float $kosten
 * @property string $beschreibung
 * @property string $name
 * @property int $projekt_id
 * @property int $zustaendiger
 * @property \Cake\I18n\FrozenTime $hinzugefuegt_am
 * @property \Cake\I18n\FrozenTime|null $abgeschlossen_am
 * @property \Cake\I18n\FrozenTime|null $frist
 *
 * @property \App\Model\Entity\Projekt $projekt
 * @property \App\Model\Entity\Angestellter[] $angestellter
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
        'fortschritt' => true,
        'kosten' => true,
        'beschreibung' => true,
        'name' => true,
        'projekt_id' => true,
        'zustaendiger' => true,
        'hinzugefuegt_am' => true,
        'abgeschlossen_am' => true,
        'frist' => true,
        'projekt' => true,
        'angestellter' => true
    ];
}
