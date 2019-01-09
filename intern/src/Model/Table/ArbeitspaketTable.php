<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Arbeitspaket Model
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
        $this->setDisplayField('TaskID');
        $this->setPrimaryKey('TaskID');
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
            ->integer('TaskID')
            ->allowEmpty('TaskID', 'create');

        $validator
            ->integer('Fortschritt')
            ->requirePresence('Fortschritt', 'create')
            ->notEmpty('Fortschritt');

        $validator
            ->decimal('Kosten')
            ->requirePresence('Kosten', 'create')
            ->notEmpty('Kosten');

        $validator
            ->scalar('Beschreibung')
            ->maxLength('Beschreibung', 255)
            ->requirePresence('Beschreibung', 'create')
            ->notEmpty('Beschreibung');

        $validator
            ->scalar('Name')
            ->maxLength('Name', 255)
            ->requirePresence('Name', 'create')
            ->notEmpty('Name');

        $validator
            ->integer('ProjektID')
            ->requirePresence('ProjektID', 'create')
            ->notEmpty('ProjektID');

        $validator
            ->integer('Zustaendiger')
            ->requirePresence('Zustaendiger', 'create')
            ->notEmpty('Zustaendiger');

        return $validator;
    }
}
