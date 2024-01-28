<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobsBasicAbility Entity
 *
 * @property int $job_id
 * @property int $basic_ability_id
 * @property int|null $sort_order
 *
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\BasicAbility $basic_ability
 */
class JobsBasicAbility extends Entity
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
        'sort_order' => true,
        'job' => true,
        'basic_ability' => true,
    ];
}
