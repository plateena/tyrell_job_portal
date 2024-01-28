<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobCategories Model
 *
 * @property \App\Model\Table\JobTypesTable&\Cake\ORM\Association\HasMany $JobTypes
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\HasMany $Jobs
 *
 * @method \App\Model\Entity\JobCategory newEmptyEntity()
 * @method \App\Model\Entity\JobCategory newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\JobCategory> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobCategory get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\JobCategory findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\JobCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\JobCategory> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobCategory|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\JobCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\JobCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobCategory>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobCategory> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobCategory>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobCategory>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobCategory> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JobCategoriesTable extends Table
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

        $this->setTable('job_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('JobTypes', [
            'foreignKey' => 'job_category_id',
        ]);
        $this->hasMany('Jobs', [
            'foreignKey' => 'job_category_id',
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
}
