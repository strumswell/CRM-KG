<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Arbeitspaket Model
 *
 * @property \App\Model\Table\ProjektTable|\Cake\ORM\Association\BelongsTo $Projekt
 * @property \App\Model\Table\AngestellterTable|\Cake\ORM\Association\BelongsToMany $Angestellter
 *
 * @method \App\Model\Entity\Arbeitspaket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Arbeitspaket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Arbeitspaket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Arbeitspaket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Arbeitspaket|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Arbeitspaket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Arbeitspaket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Arbeitspaket findOrCreate($search, callable $callback = null, $options = [])
 */
class ArbeitspaketTable extends Table
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

        $this->setTable('arbeitspaket');
        $this->setDisplayField('name');
        $this->setPrimaryKey('arbeitspaket_id');

        $this->belongsTo('Projekt', [
            'foreignKey' => 'projekt_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsToMany('Angestellter', [
            'foreignKey' => 'arbeitspaket_id',
            'targetForeignKey' => 'angestellter_id',
            'joinTable' => 'angestellter_arbeitspaket'
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
            ->integer('arbeitspaket_id')
            ->allowEmpty('arbeitspaket_id', 'create');

        $validator
            ->integer('fortschritt')
            ->requirePresence('fortschritt', 'create')
            ->notEmpty('fortschritt');

        $validator
            ->decimal('kosten')
            ->requirePresence('kosten', 'create')
            ->notEmpty('kosten');

        $validator
            ->scalar('beschreibung')
            ->maxLength('beschreibung', 255)
            ->requirePresence('beschreibung', 'create')
            ->notEmpty('beschreibung');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->integer('zustaendiger')
            ->requirePresence('zustaendiger', 'create')
            ->notEmpty('zustaendiger');

        $validator
            ->dateTime('hinzugefuegt_am')
            ->requirePresence('hinzugefuegt_am', 'create')
            ->notEmpty('hinzugefuegt_am');

        $validator
            ->dateTime('abgeschlossen_am')
            ->allowEmpty('abgeschlossen_am');

        $validator
            ->date('frist')
            ->allowEmpty('frist');

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
