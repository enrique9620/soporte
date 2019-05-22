<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Respuestas Model
 *
 * @property \App\Model\Table\BugsTable|\Cake\ORM\Association\BelongsTo $Bugs
 * @property \App\Model\Table\EstadopeticionesTable|\Cake\ORM\Association\BelongsTo $Estadopeticiones
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RespuestaAnexosTable|\Cake\ORM\Association\HasMany $RespuestaAnexos
 *
 * @method \App\Model\Entity\Respuesta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Respuesta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Respuesta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Respuesta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Respuesta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Respuesta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Respuesta findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RespuestasTable extends Table
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

        $this->setTable('respuestas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Bugs', [
            'foreignKey' => 'bug_id'
        ]);
        $this->belongsTo('Estadopeticiones', [
            'foreignKey' => 'estadopeticion_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id'
        ]);
        $this->hasMany('RespuestaAnexos', [
            'foreignKey' => 'respuesta_id'
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
            ->uuid('usuarioid')
            ->allowEmpty('usuarioid');

        $validator
            ->allowEmpty('descripcion');

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
        $rules->add($rules->existsIn(['bug_id'], 'Bugs'));
        $rules->add($rules->existsIn(['estadopeticion_id'], 'Estadopeticiones'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }
}
