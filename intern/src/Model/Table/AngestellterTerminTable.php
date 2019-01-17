<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AngestellterTermin Model
 *
 * @property \App\Model\Table\AngestellterTable|\Cake\ORM\Association\BelongsTo $Angestellter
 * @property \App\Model\Table\TerminTable|\Cake\ORM\Association\BelongsTo $Termin
 *
 * @method \App\Model\Entity\AngestellterTermin get($primaryKey, $options = [])
 * @method \App\Model\Entity\AngestellterTermin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AngestellterTermin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterTermin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AngestellterTermin|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AngestellterTermin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterTermin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterTermin findOrCreate($search, callable $callback = null, $options = [])
 */
class AngestellterTerminTable extends Table
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

        $this->setTable('angestellter_termin');
        $this->setDisplayField('angestellter_id');
        $this->setPrimaryKey(['angestellter_id', 'termin_id']);

        $this->belongsTo('Angestellter', [
            'foreignKey' => 'angestellter_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Termin', [
            'foreignKey' => 'termin_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['angestellter_id'], 'Angestellter'));
        $rules->add($rules->existsIn(['termin_id'], 'Termin'));

        return $rules;
    }
}
