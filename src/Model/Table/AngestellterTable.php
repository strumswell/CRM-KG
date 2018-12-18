<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Angestellter Model
 *
 * @method \App\Model\Entity\Angestellter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Angestellter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Angestellter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Angestellter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Angestellter|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Angestellter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Angestellter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Angestellter findOrCreate($search, callable $callback = null, $options = [])
 */
class AngestellterTable extends Table
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

        $this->setTable('angestellter');
        $this->setDisplayField('PNr');
        $this->setPrimaryKey('PNr');
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
            ->scalar('Name')
            ->maxLength('Name', 255)
            ->requirePresence('Name', 'create')
            ->notEmpty('Name');

        $validator
            ->scalar('Vorname')
            ->maxLength('Vorname', 255)
            ->requirePresence('Vorname', 'create')
            ->notEmpty('Vorname');

        $validator
            ->integer('PNr')
            ->allowEmpty('PNr', 'create');

        $validator
            ->scalar('Position')
            ->maxLength('Position', 255)
            ->requirePresence('Position', 'create')
            ->notEmpty('Position');

        $validator
            ->scalar('EMail')
            ->maxLength('EMail', 255)
            ->requirePresence('EMail', 'create')
            ->notEmpty('EMail');

        $validator
            ->scalar('Telefon')
            ->maxLength('Telefon', 255)
            ->requirePresence('Telefon', 'create')
            ->notEmpty('Telefon');

        return $validator;
    }
}
