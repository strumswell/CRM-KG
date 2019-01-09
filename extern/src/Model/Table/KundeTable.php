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
        $this->setDisplayField('KDNr');
        $this->setPrimaryKey('KDNr');
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
            ->integer('KDNr')
            ->allowEmpty('KDNr', 'create');

        $validator
            ->scalar('Name')
            ->maxLength('Name', 255)
            ->requirePresence('Name', 'create')
            ->notEmpty('Name');

        $validator
            ->scalar('Ort')
            ->maxLength('Ort', 255)
            ->requirePresence('Ort', 'create')
            ->notEmpty('Ort');

        $validator
            ->integer('PLZ')
            ->requirePresence('PLZ', 'create')
            ->notEmpty('PLZ');

        $validator
            ->scalar('Straße')
            ->maxLength('Straße', 255)
            ->requirePresence('Straße', 'create')
            ->notEmpty('Straße');

        $validator
            ->integer('Hausnummer')
            ->requirePresence('Hausnummer', 'create')
            ->notEmpty('Hausnummer');

        $validator
            ->scalar('EMail')
            ->maxLength('EMail', 255)
            ->requirePresence('EMail', 'create')
            ->notEmpty('EMail');

        $validator
            ->scalar('Tel')
            ->maxLength('Tel', 255)
            ->requirePresence('Tel', 'create')
            ->notEmpty('Tel');

        $validator
            ->scalar('Username')
            ->maxLength('Username', 255)
            ->requirePresence('Username', 'create')
            ->notEmpty('Username');

        $validator
            ->scalar('Password')
            ->maxLength('Password', 255)
            ->requirePresence('Password', 'create')
            ->notEmpty('Password');

        return $validator;
    }
}
