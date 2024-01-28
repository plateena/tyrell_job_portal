<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobsPersonalities Model
 *
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\BelongsTo $Jobs
 * @property \App\Model\Table\PersonalitiesTable&\Cake\ORM\Association\BelongsTo $Personalities
 *
 * @method \App\Model\Entity\JobsPersonality newEmptyEntity()
 * @method \App\Model\Entity\JobsPersonality newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\JobsPersonality> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobsPersonality get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\JobsPersonality findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\JobsPersonality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\JobsPersonality> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobsPersonality|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\JobsPersonality saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\JobsPersonality>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsPersonality>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobsPersonality>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsPersonality> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobsPersonality>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsPersonality>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JobsPersonality>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JobsPersonality> deleteManyOrFail(iterable $entities, array $options = [])
 */
class JobsPersonalitiesTable extends Table
{
    /**
     * Initialize method
     *
     * @param  array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable("jobs_personalities");
        $this->setDisplayField(["job_id", "personality_id"]);
        $this->setPrimaryKey(["job_id", "personality_id"]);

        $this->belongsTo(
            "Jobs", [
            "className" => "Jobs",
            "foreignKey" => "job_id",
            ]
        );

        $this->belongsTo(
            "Personalities", [
            "className" => "Personalities",
            "foreignKey" => "personality_id",
            ]
        );
    }

    /**
     * Default validation rules.
     *
     * @param  \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator->integer("sort_order")->allowEmptyString("sort_order");

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param  \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add(
            $rules->existsIn("job_id", "Jobs"), [
            "errorField" => "job_id",
            ]
        );
        $rules->add(
            $rules->existsIn("personality_id", "Personalities"), [
            "errorField" => "personality_id",
            ]
        );

        return $rules;
    }
}
