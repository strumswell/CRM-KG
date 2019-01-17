<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AngestellterArbeitspaket Model
 *
 * @property \App\Model\Table\AngestellterTable|\Cake\ORM\Association\BelongsTo $Angestellter
 * @property \App\Model\Table\ArbeitspaketTable|\Cake\ORM\Association\BelongsTo $Arbeitspaket
 *
 * @method \App\Model\Entity\AngestellterArbeitspaket get($primaryKey, $options = [])
 * @method \App\Model\Entity\AngestellterArbeitspaket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AngestellterArbeitspaket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterArbeitspaket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AngestellterArbeitspaket|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AngestellterArbeitspaket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterArbeitspaket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterArbeitspaket findOrCreate($search, callable $callback = null, $options = [])
 */
class AngestellterArbeitspaketTable extends Table
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

        $this->setTable('angestellter_arbeitspaket');
        $this->setDisplayField('angestellter_id');
        $this->setPrimaryKey(['angestellter_id', 'arbeitspaket_id']);

        $this->belongsTo('Angestellter', [
            'foreignKey' => 'angestellter_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Arbeitspaket', [
            'foreignKey' => 'arbeitspaket_id',
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
        $rules->add($rules->existsIn(['arbeitspaket_id'], 'Arbeitspaket'));

        return $rules;
    }
}
