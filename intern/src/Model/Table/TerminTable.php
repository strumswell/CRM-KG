<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Termin Model
 *
 * @property \App\Model\Table\ProjektTable|\Cake\ORM\Association\BelongsTo $Projekt
 * @property \App\Model\Table\AngestellterTable|\Cake\ORM\Association\BelongsToMany $Angestellter
 *
 * @method \App\Model\Entity\Termin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Termin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Termin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Termin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Termin|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Termin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Termin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Termin findOrCreate($search, callable $callback = null, $options = [])
 */
class TerminTable extends Table
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

        $this->setTable('termin');
        $this->setDisplayField('termin_id');
        $this->setPrimaryKey('termin_id');

        $this->belongsTo('Projekt', [
            'foreignKey' => 'projekt_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Angestellter', [
            'foreignKey' => 'termin_id',
            'targetForeignKey' => 'angestellter_id',
            'joinTable' => 'angestellter_termin'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('termin_id')
            ->allowEmpty('termin_id', 'create');

        $validator
            ->date('datum')
            ->requirePresence('datum', 'create')
            ->notEmpty('datum');

        $validator
            ->scalar('art')
            ->maxLength('art', 255)
            ->requirePresence('art', 'create')
            ->notEmpty('art');

        $validator
            ->scalar('bezeichnung')
            ->maxLength('bezeichnung', 255)
            ->requirePresence('bezeichnung', 'create')
            ->notEmpty('bezeichnung');

        return $validator;
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
        $rules->add($rules->existsIn(['projekt_id'], 'Projekt'));

        return $rules;
    }
}
