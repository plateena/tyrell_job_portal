<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobsPracticalSkills Model
 *
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\BelongsTo $Jobs
 * @property \App\Model\Table\PracticalSkillsTable&\Cake\ORM\Association\BelongsTo $PracticalSkills
 *
 * @method \App\Model\Entity\JobsPracticalSkill newEmptyEntity()
 * @method \App\Model\Entity\JobsPracticalSkill newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\JobsPracticalSkill> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobsPracticalSkill get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\JobsPracticalSkill findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\JobsPracticalSkill patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\JobsPracticalSkill> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobsPracticalSkill|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\JobsPracticalSkill saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\JobsPracticalSkill>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsPracticalSkill>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobsPracticalSkill>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsPracticalSkill> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobsPracticalSkill>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsPracticalSkill>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobsPracticalSkill>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsPracticalSkill> deleteManyOrFail(iterable $entities, array $options = [])
 */
class JobsPracticalSkillsTable extends Table
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

        $this->setTable('jobs_practical_skills');
        $this->setDisplayField(['job_id', 'practical_skill_id']);
        $this->setPrimaryKey(['job_id', 'practical_skill_id']);

        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('PracticalSkills', [
            'foreignKey' => 'practical_skill_id',
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
        $rules->add($rules->existsIn('practical_skill_id', 'PracticalSkills'), ['errorField' => 'practical_skill_id']);

        return $rules;
    }
}
