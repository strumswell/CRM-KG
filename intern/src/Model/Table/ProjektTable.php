<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projekt Model
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
        $this->setDisplayField('ProjektID');
        $this->setPrimaryKey('ProjektID');
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
            ->integer('ProjektID')
            ->allowEmpty('ProjektID', 'create');

        $validator
            ->scalar('Projektname')
            ->maxLength('Name', 255)
            ->requirePresence('Name', 'create')
            ->notEmpty('Name');

        $validator
            ->scalar('Beschreibung')
            ->maxLength('Beschreibung', 255)
            ->requirePresence('Beschreibung', 'create')
            ->notEmpty('Beschreibung');

        $validator
            ->integer('KDNr')
            ->requirePresence('KDNr', 'create')
            ->notEmpty('KDNr');

        return $validator;
    }
}
