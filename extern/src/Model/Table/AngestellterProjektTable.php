<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AngestellterProjekt Model
 *
 * @property \App\Model\Table\AngestellterTable|\Cake\ORM\Association\BelongsTo $Angestellter
 * @property \App\Model\Table\ProjektTable|\Cake\ORM\Association\BelongsTo $Projekt
 *
 * @method \App\Model\Entity\AngestellterProjekt get($primaryKey, $options = [])
 * @method \App\Model\Entity\AngestellterProjekt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AngestellterProjekt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterProjekt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AngestellterProjekt|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AngestellterProjekt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterProjekt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AngestellterProjekt findOrCreate($search, callable $callback = null, $options = [])
 */
class AngestellterProjektTable extends Table
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

        $this->setTable('angestellter_projekt');
        $this->setDisplayField('angestellter_id');
        $this->setPrimaryKey(['angestellter_id', 'projekt_id']);

        $this->belongsTo('Angestellter', [
            'foreignKey' => 'angestellter_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Projekt', [
            'foreignKey' => 'projekt_id',
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
        $rules->add($rules->existsIn(['projekt_id'], 'Projekt'));

        return $rules;
    }
}
