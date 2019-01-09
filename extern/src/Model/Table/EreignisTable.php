<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ereignis Model
 *
 * @method \App\Model\Entity\Ereigni get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ereigni newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ereigni[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ereigni|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ereigni|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ereigni patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ereigni[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ereigni findOrCreate($search, callable $callback = null, $options = [])
 */
class EreignisTable extends Table
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

        $this->setTable('ereignis');
        $this->setDisplayField('EventID');
        $this->setPrimaryKey('EventID');
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
            ->integer('EventID')
            ->allowEmpty('EventID', 'create');

        $validator
            ->date('Datum')
            ->requirePresence('Datum', 'create')
            ->notEmpty('Datum');

        $validator
            ->scalar('Art')
            ->maxLength('Art', 255)
            ->requirePresence('Art', 'create')
            ->notEmpty('Art');

        $validator
            ->scalar('Bezeichnung')
            ->maxLength('Bezeichnung', 255)
            ->requirePresence('Bezeichnung', 'create')
            ->notEmpty('Bezeichnung');

        $validator
            ->integer('ProjektID')
            ->requirePresence('ProjektID', 'create')
            ->notEmpty('ProjektID');

        return $validator;
    }
}
