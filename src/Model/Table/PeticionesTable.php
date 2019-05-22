<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Peticiones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Bugs
 * @property \Cake\ORM\Association\BelongsTo $Estadopeticiones
 *
 * @method \App\Model\Entity\Peticione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Peticione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Peticione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Peticione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Peticione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Peticione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Peticione findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PeticionesTable extends Table
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

        $this->setTable('peticiones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Bugs', [
            'foreignKey' => 'bug_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Estadopeticiones', [
            'foreignKey' => 'estadopeticion_id',
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('descripcion');

        $validator
            ->allowEmpty('imagen');

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

        return $rules;
    }
}
