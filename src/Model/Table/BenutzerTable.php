<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Benutzer Model
 *
 * @method \App\Model\Entity\Benutzer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Benutzer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Benutzer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Benutzer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Benutzer|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Benutzer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Benutzer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Benutzer findOrCreate($search, callable $callback = null, $options = [])
 */
class BenutzerTable extends Table
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

        $this->setTable('benutzer');
        $this->setDisplayField('UserID');
        $this->setPrimaryKey('UserID');
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
            ->integer('UserID')
            ->allowEmpty('UserID', 'create');

        $validator
            ->integer('PNr')
            ->allowEmpty('PNr');

        $validator
            ->integer('KDNr')
            ->allowEmpty('KDNr');

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
