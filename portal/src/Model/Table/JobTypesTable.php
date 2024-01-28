<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobTypes Model
 *
 * @property \App\Model\Table\JobCategoriesTable&\Cake\ORM\Association\BelongsTo $JobCategories
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\HasMany $Jobs
 *
 * @method \App\Model\Entity\JobType newEmptyEntity()
 * @method \App\Model\Entity\JobType newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\JobType> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobType get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\JobType findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\JobType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\JobType> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobType|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\JobType saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\JobType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobType>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobType> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobType>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobType> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JobTypesTable extends Table
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

        $this->setTable('job_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('JobCategories', [
            'foreignKey' => 'job_category_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Jobs', [
            'foreignKey' => 'job_type_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->notEmptyString('job_category_id');

        $validator
            ->integer('sort_order')
            ->notEmptyString('sort_order');

        $validator
            ->requirePresence('created_by', 'create')
            ->notEmptyString('created_by');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

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
        $rules->add($rules->existsIn('job_category_id', 'JobCategories'), ['errorField' => 'job_category_id']);

        return $rules;
    }
}
