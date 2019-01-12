<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Kunde Model
 *
 * @method \App\Model\Entity\Kunde get($primaryKey, $options = [])
 * @method \App\Model\Entity\Kunde newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Kunde[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Kunde|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kunde|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kunde patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Kunde[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Kunde findOrCreate($search, callable $callback = null, $options = [])
 */
class KundeTable extends Table
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

        $this->setTable('kunde');
        $this->setDisplayField('name');
        $this->setPrimaryKey('kunde_id');
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
            ->integer('kunde_id')
            ->allowEmpty('kunde_id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('ort')
            ->maxLength('ort', 255)
            ->requirePresence('ort', 'create')
            ->notEmpty('ort');

        $validator
            ->integer('plz')
            ->requirePresence('plz', 'create')
            ->notEmpty('plz');

        $validator
            ->scalar('straße')
            ->maxLength('straße', 255)
            ->requirePresence('straße', 'create')
            ->notEmpty('straße');

        $validator
            ->integer('hausnummer')
            ->requirePresence('hausnummer', 'create')
            ->notEmpty('hausnummer');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('telefon')
            ->maxLength('telefon', 255)
            ->requirePresence('telefon', 'create')
            ->notEmpty('telefon');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->dateTime('registriert_am')
            ->requirePresence('registriert_am', 'create')
            ->notEmpty('registriert_am');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
