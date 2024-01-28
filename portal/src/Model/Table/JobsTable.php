<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
 * @property \App\Model\Table\JobCategoriesTable&\Cake\ORM\Association\BelongsTo $JobCategories
 * @property \App\Model\Table\JobTypesTable&\Cake\ORM\Association\BelongsTo $JobTypes
 * @property \App\Model\Table\JobsCareerPathsTable&\Cake\ORM\Association\HasMany $JobsCareerPaths
 * @property \App\Model\Table\JobsRecQualificationsTable&\Cake\ORM\Association\HasMany $JobsRecQualifications
 * @property \App\Model\Table\JobsReqQualificationsTable&\Cake\ORM\Association\HasMany $JobsReqQualifications
 * @property \App\Model\Table\JobsToolsTable&\Cake\ORM\Association\HasMany $JobsTools
 * @property \App\Model\Table\BasicAbilitiesTable&\Cake\ORM\Association\BelongsToMany $BasicAbilities
 * @property \App\Model\Table\PersonalitiesTable&\Cake\ORM\Association\BelongsToMany $Personalities
 * @property \App\Model\Table\PracticalSkillsTable&\Cake\ORM\Association\BelongsToMany $PracticalSkills
 *
 * @method \App\Model\Entity\Job newEmptyEntity()
 * @method \App\Model\Entity\Job newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Job> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Job get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Job findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Job patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Job> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Job|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Job saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Job>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Job>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Job>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Job> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Job>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Job>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Job>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Job> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JobsTable extends Table
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

        $this->setTable('jobs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('JobCategories', [
            'foreignKey' => 'job_category_id',
            'joinType' => 'LEFT',
        ]);

        $this->belongsTo('JobTypes', [
            'foreignKey' => 'job_type_id',
            'joinType' => 'LEFT',
        ]);
        
        $this->hasMany('JobsCareerPaths', [
            'foreignKey' => 'job_id',
            'joinType' => 'LEFT',
        ]);

        $this->hasMany('JobsRecQualifications', [
            'foreignKey' => 'job_id',
            'joinType' => 'LEFT',
        ]);

        $this->hasMany('JobsReqQualifications', [
            'foreignKey' => 'job_id',
            'joinType' => 'LEFT',
        ]);

        $this->hasMany('JobsTools', [
            'foreignKey' => 'job_id',
            'joinType' => 'LEFT',
        ]);

        $this->belongsToMany('BasicAbilities', [
            'foreignKey' => 'job_id',
            'targetForeignKey' => 'basic_ability_id',
            'joinTable' => 'jobs_basic_abilities',
            'joinType' => 'LEFT',
        ]);

        $this->belongsToMany('Personalities', [
            'className' => 'Personalities',
            'joinTable' => 'jobs_personalities',
            'foreignKey' => 'job_id',
            'targetForeignKey' => 'personality_id'
        ]);

        $this->belongsToMany('PracticalSkills', [
            'foreignKey' => 'job_id',
            'targetForeignKey' => 'practical_skill_id',
            'joinTable' => 'jobs_practical_skills',
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
            ->allowEmptyString('media_id');

        $validator
            ->notEmptyString('job_category_id');

        $validator
            ->notEmptyString('job_type_id');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('detail')
            ->allowEmptyString('detail');

        $validator
            ->scalar('business_skill')
            ->maxLength('business_skill', 1000)
            ->allowEmptyString('business_skill');

        $validator
            ->scalar('knowledge')
            ->maxLength('knowledge', 1000)
            ->allowEmptyString('knowledge');

        $validator
            ->scalar('location')
            ->maxLength('location', 1000)
            ->allowEmptyString('location');

        $validator
            ->scalar('activity')
            ->maxLength('activity', 1000)
            ->allowEmptyString('activity');

        $validator
            ->boolean('academic_degree_doctor')
            ->allowEmptyString('academic_degree_doctor');

        $validator
            ->boolean('academic_degree_master')
            ->allowEmptyString('academic_degree_master');

        $validator
            ->boolean('academic_degree_professional')
            ->allowEmptyString('academic_degree_professional');

        $validator
            ->boolean('academic_degree_bachelor')
            ->allowEmptyString('academic_degree_bachelor');

        $validator
            ->scalar('salary_statistic_group')
            ->maxLength('salary_statistic_group', 255)
            ->allowEmptyString('salary_statistic_group');

        $validator
            ->decimal('salary_range_first_year')
            ->allowEmptyString('salary_range_first_year');

        $validator
            ->decimal('salary_range_average')
            ->allowEmptyString('salary_range_average');

        $validator
            ->scalar('salary_range_remarks')
            ->maxLength('salary_range_remarks', 1000)
            ->allowEmptyString('salary_range_remarks');

        $validator
            ->scalar('restriction')
            ->maxLength('restriction', 1000)
            ->allowEmptyString('restriction');

        $validator
            ->scalar('estimated_total_workers')
            ->maxLength('estimated_total_workers', 255)
            ->allowEmptyString('estimated_total_workers');

        $validator
            ->scalar('remarks')
            ->maxLength('remarks', 1000)
            ->allowEmptyString('remarks');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmptyString('url');

        $validator
            ->scalar('seo_description')
            ->maxLength('seo_description', 1000)
            ->allowEmptyString('seo_description');

        $validator
            ->scalar('seo_keywords')
            ->maxLength('seo_keywords', 255)
            ->allowEmptyString('seo_keywords');

        $validator
            ->integer('sort_order')
            ->notEmptyString('sort_order');

        $validator
            ->boolean('publish_status')
            ->requirePresence('publish_status', 'create')
            ->notEmptyString('publish_status');

        $validator
            ->integer('version')
            ->notEmptyString('version');

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
        $rules->add($rules->existsIn('job_type_id', 'JobTypes'), ['errorField' => 'job_type_id']);

        return $rules;
    }
}
