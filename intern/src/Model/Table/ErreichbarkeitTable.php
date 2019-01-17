<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Erreichbarkeit Model
 *
 * @property \App\Model\Table\ErreichbarkeitsTable|\Cake\ORM\Association\BelongsTo $Erreichbarkeits
 * @property \App\Model\Table\AngestellterTable|\Cake\ORM\Association\BelongsTo $Angestellter
 *
 * @method \App\Model\Entity\Erreichbarkeit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Erreichbarkeit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Erreichbarkeit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Erreichbarkeit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Erreichbarkeit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Erreichbarkeit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Erreichbarkeit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Erreichbarkeit findOrCreate($search, callable $callback = null, $options = [])
 */
class ErreichbarkeitTable extends Table
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

        $this->setTable('erreichbarkeit');
        $this->setDisplayField('erreichbarkeit_id');
        $this->setPrimaryKey(['erreichbarkeit_id', 'angestellter_id']);

        $this->belongsTo('Erreichbarkeits', [
            'foreignKey' => 'erreichbarkeit_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Angestellter', [
            'foreignKey' => 'angestellter_id',
            'joinType' => 'INNER'
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
            ->scalar('mo')
            ->maxLength('mo', 255)
            ->requirePresence('mo', 'create')
            ->notEmpty('mo');

        $validator
            ->scalar('di')
            ->maxLength('di', 255)
            ->requirePresence('di', 'create')
            ->notEmpty('di');

        $validator
            ->scalar('mi')
            ->maxLength('mi', 255)
            ->requirePresence('mi', 'create')
            ->notEmpty('mi');

        $validator
            ->scalar('don')
            ->maxLength('don', 255)
            ->requirePresence('don', 'create')
            ->notEmpty('don');

        $validator
            ->scalar('fr')
            ->maxLength('fr', 255)
            ->requirePresence('fr', 'create')
            ->notEmpty('fr');

        $validator
            ->scalar('sa')
            ->maxLength('sa', 255)
            ->requirePresence('sa', 'create')
            ->notEmpty('sa');

        $validator
            ->scalar('so')
            ->maxLength('so', 255)
            ->requirePresence('so', 'create')
            ->notEmpty('so');

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
        $rules->add($rules->existsIn(['erreichbarkeit_id'], 'Erreichbarkeits'));
        $rules->add($rules->existsIn(['angestellter_id'], 'Angestellter'));

        return $rules;
    }
}
