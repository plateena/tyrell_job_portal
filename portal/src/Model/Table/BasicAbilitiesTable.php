<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BasicAbilities Model
 *
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\BelongsToMany $Jobs
 *
 * @method \App\Model\Entity\BasicAbility newEmptyEntity()
 * @method \App\Model\Entity\BasicAbility newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\BasicAbility> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BasicAbility get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\BasicAbility findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\BasicAbility patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\BasicAbility> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BasicAbility|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\BasicAbility saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\BasicAbility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BasicAbility>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BasicAbility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BasicAbility> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BasicAbility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BasicAbility>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\BasicAbility>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\BasicAbility> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BasicAbilitiesTable extends Table
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

        $this->setTable('basic_abilities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Jobs', [
            'foreignKey' => 'basic_ability_id',
            'targetForeignKey' => 'job_id',
            'joinTable' => 'jobs_basic_abilities',
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
