<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Angestellter Model
 *
 * @property \App\Model\Table\ArbeitspaketTable|\Cake\ORM\Association\BelongsToMany $Arbeitspaket
 * @property \App\Model\Table\EreignisTable|\Cake\ORM\Association\BelongsToMany $Ereignis
 * @property \App\Model\Table\ProjektTable|\Cake\ORM\Association\BelongsToMany $Projekt
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
        $this->setDisplayField('angestellter_id');
        $this->setPrimaryKey('angestellter_id');

        $this->belongsToMany('Arbeitspaket', [
            'foreignKey' => 'angestellter_id',
            'targetForeignKey' => 'arbeitspaket_id',
            'joinTable' => 'angestellter_arbeitspaket'
        ]);
        $this->belongsToMany('Ereignis', [
            'foreignKey' => 'angestellter_id',
            'targetForeignKey' => 'ereigni_id',
            'joinTable' => 'angestellter_ereignis'
        ]);
        $this->belongsToMany('Projekt', [
            'foreignKey' => 'angestellter_id',
            'targetForeignKey' => 'projekt_id',
            'joinTable' => 'angestellter_projekt'
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
            ->scalar('nachname')
            ->maxLength('nachname', 255)
            ->requirePresence('nachname', 'create')
            ->notEmpty('nachname');

        $validator
            ->scalar('vorname')
            ->maxLength('vorname', 255)
            ->requirePresence('vorname', 'create')
            ->notEmpty('vorname');

        $validator
            ->integer('angestellter_id')
            ->allowEmpty('angestellter_id', 'create');

        $validator
            ->scalar('position')
            ->maxLength('position', 255)
            ->requirePresence('position', 'create')
            ->notEmpty('position');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('telefon')
            ->maxLength('telefon', 255)
            ->requirePresence('telefon', 'create')
            ->notEmpty('telefon');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->scalar('passwort')
            ->maxLength('passwort', 255)
            ->requirePresence('passwort', 'create')
            ->notEmpty('passwort');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
