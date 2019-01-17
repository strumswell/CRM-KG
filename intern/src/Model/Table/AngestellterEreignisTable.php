<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AngestellterEreignis Model
 *
 * @property \App\Model\Table\AngestellterTable|\Cake\ORM\Association\BelongsTo $Angestellter
 * @property \App\Model\Table\EreignisTable|\Cake\ORM\Association\BelongsTo $Ereignis
 *
 * @method \App\Model\Entity\AngestellterEreigni get($primaryKey, $options = [])
 * @method \App\Model\Entity\AngestellterEreigni newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AngestellterEreigni[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterEreigni|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AngestellterEreigni|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AngestellterEreigni patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterEreigni[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterEreigni findOrCreate($search, callable $callback = null, $options = [])
 */
class AngestellterEreignisTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('angestellter_ereignis');

        $this->belongsTo('Angestellter', [
            'foreignKey' => 'angestellter_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ereignis', [
            'foreignKey' => 'ereignis_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['angestellter_id'], 'Angestellter'));
        $rules->add($rules->existsIn(['ereignis_id'], 'Ereignis'));

        return $rules;
    }
}
