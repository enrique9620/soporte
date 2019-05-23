<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RespuestaAnexos Model
 *
 * @property \App\Model\Table\RespuestasTable|\Cake\ORM\Association\BelongsTo $Respuestas
 *
 * @method \App\Model\Entity\RespuestaAnexo get($primaryKey, $options = [])
 * @method \App\Model\Entity\RespuestaAnexo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RespuestaAnexo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RespuestaAnexo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RespuestaAnexo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RespuestaAnexo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RespuestaAnexo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RespuestaAnexosTable extends Table
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

        $this->setTable('respuesta_anexos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Respuestas', [
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
            ->requirePresence('imagen', 'create')
            ->notEmpty('imagen');

        $validator
            ->allowEmpty('tipo');

        $validator
            ->allowEmpty('tamano');

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
        $rules->add($rules->existsIn(['respuesta_id'], 'Respuestas'));

        return $rules;
    }
}
