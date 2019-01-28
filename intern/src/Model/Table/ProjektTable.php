<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projekt Model
 *
 * @property \App\Model\Table\KundeTable|\Cake\ORM\Association\BelongsTo $Kunde
 * @property \App\Model\Table\AngestellterTable|\Cake\ORM\Association\BelongsToMany $Angestellter
 *
 * @method \App\Model\Entity\Projekt get($primaryKey, $options = [])
 * @method \App\Model\Entity\Projekt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Projekt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Projekt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projekt|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projekt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Projekt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Projekt findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjektTable extends Table
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

        $this->setTable('projekt');
        $this->setDisplayField('projekt_id');
        $this->setPrimaryKey('projekt_id');

        $this->belongsTo('Kunde', [
            'foreignKey' => 'kunde_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Angestellter', [
            'foreignKey' => 'projekt_id',
            'targetForeignKey' => 'angestellter_id',
            'joinTable' => 'angestellter_projekt'
        ]);
        $this->hasMany('Arbeitspaket')
            ->setForeignKey(['projekt_id'])
            ->setBindingKey(['projekt_id'])
            ->setStrategy('subquery');
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
            ->integer('projekt_id')
            ->allowEmpty('projekt_id', 'create');

        $validator
            ->scalar('projektname')
            ->maxLength('projektname', 255)
            ->requirePresence('projektname', 'create')
            ->notEmpty('projektname');

        $validator
            ->scalar('beschreibung')
            ->maxLength('beschreibung', 255)
            ->requirePresence('beschreibung', 'create')
            ->notEmpty('beschreibung');

        $validator
            ->boolean('abgeschlossen')
            ->requirePresence('abgeschlossen', 'create')
            ->notEmpty('abgeschlossen');

        $validator
            ->dateTime('hinzugefuegt_am')
            ->requirePresence('hinzugefuegt_am', 'create')
            ->notEmpty('hinzugefuegt_am');

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
        $rules->add($rules->existsIn(['kunde_id'], 'Kunde'));

        return $rules;
    }
}
