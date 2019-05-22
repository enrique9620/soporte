<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bugs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sistemas
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $BugAnexo
 * @property \Cake\ORM\Association\HasMany $Respuestas
 *
 * @method \App\Model\Entity\Bug get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bug newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bug[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bug|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bug patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bug[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bug findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BugsTable extends Table
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

        $this->setTable('bugs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sistemas', [
            'foreignKey' => 'sistema_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BugAnexo', [
            'foreignKey' => 'bug_id'
        ]);
        $this->hasMany('Respuestas', [
            'foreignKey' => 'bug_id'
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('asunto');

        $validator
            ->allowEmpty('descripcion');

        $validator
            ->uuid('usuarioid')
            ->allowEmpty('usuarioid');

        $validator
            ->allowEmpty('username');

        $validator
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->allowEmpty('correo');

        $validator
            ->allowEmpty('sistemaoperativo');

        $validator
            ->allowEmpty('navegador');

        $validator
            ->dateTime('fecha_inicio')
            ->allowEmpty('fecha_inicio');

        $validator
            ->dateTime('fecha_fin')
            ->allowEmpty('fecha_fin');

        $validator
            ->boolean('leido')
            ->requirePresence('leido', 'create')
            ->notEmpty('leido');

        $validator
            ->integer('activo')
            ->allowEmpty('activo');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['sistema_id'], 'Sistemas'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
