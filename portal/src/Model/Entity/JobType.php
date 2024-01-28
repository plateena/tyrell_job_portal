<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobType Entity
 *
 * @property int $id
 * @property string $name
 * @property int $job_category_id
 * @property int $sort_order
 * @property int $created_by
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property \Cake\I18n\DateTime|null $deleted
 *
 * @property \App\Model\Entity\JobCategory $job_category
 * @property \App\Model\Entity\Job[] $jobs
 */
class JobType extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'job_category_id' => true,
        'sort_order' => true,
        'created_by' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'job_category' => true,
        'jobs' => true,
    ];
}
