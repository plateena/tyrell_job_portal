<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobsBasicAbilities Model
 *
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\BelongsTo $Jobs
 * @property \App\Model\Table\BasicAbilitiesTable&\Cake\ORM\Association\BelongsTo $BasicAbilities
 *
 * @method \App\Model\Entity\JobsBasicAbility newEmptyEntity()
 * @method \App\Model\Entity\JobsBasicAbility newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\JobsBasicAbility> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobsBasicAbility get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\JobsBasicAbility findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\JobsBasicAbility patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\JobsBasicAbility> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobsBasicAbility|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\JobsBasicAbility saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\JobsBasicAbility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsBasicAbility>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobsBasicAbility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsBasicAbility> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobsBasicAbility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsBasicAbility>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobsBasicAbility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsBasicAbility> deleteManyOrFail(iterable $entities, array $options = [])
 */
class JobsBasicAbilitiesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('jobs_basic_abilities');
        $this->setDisplayField(['job_id', 'basic_ability_id']);
        $this->setPrimaryKey(['job_id', 'basic_ability_id']);

        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('BasicAbilities', [
            'foreignKey' => 'basic_ability_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('sort_order')
            ->allowEmptyString('sort_order');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('job_id', 'Jobs'), ['errorField' => 'job_id']);
        $rules->add($rules->existsIn('basic_ability_id', 'BasicAbilities'), ['errorField' => 'basic_ability_id']);

        return $rules;
    }
}
