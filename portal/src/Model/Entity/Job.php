<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property string $name
 * @property int|null $media_id
 * @property int $job_category_id
 * @property int $job_type_id
 * @property string|null $description
 * @property string|null $detail
 * @property string|null $business_skill
 * @property string|null $knowledge
 * @property string|null $location
 * @property string|null $activity
 * @property bool|null $academic_degree_doctor
 * @property bool|null $academic_degree_master
 * @property bool|null $academic_degree_professional
 * @property bool|null $academic_degree_bachelor
 * @property string|null $salary_statistic_group
 * @property string|null $salary_range_first_year
 * @property string|null $salary_range_average
 * @property string|null $salary_range_remarks
 * @property string|null $restriction
 * @property string|null $estimated_total_workers
 * @property string|null $remarks
 * @property string|null $url
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property int $sort_order
 * @property bool $publish_status
 * @property int $version
 * @property int $created_by
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property \Cake\I18n\DateTime|null $deleted
 *
 * @property \App\Model\Entity\JobCategory $job_category
 * @property \App\Model\Entity\JobType $job_type
 * @property \App\Model\Entity\JobsCareerPath[] $jobs_career_paths
 * @property \App\Model\Entity\JobsRecQualification[] $jobs_rec_qualifications
 * @property \App\Model\Entity\JobsReqQualification[] $jobs_req_qualifications
 * @property \App\Model\Entity\JobsTool[] $jobs_tools
 * @property \App\Model\Entity\BasicAbility[] $basic_abilities
 * @property \App\Model\Entity\Personality[] $personalities
 * @property \App\Model\Entity\PracticalSkill[] $practical_skills
 */
class Job extends Entity
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
        "name" => true,
        "media_id" => true,
        "job_category_id" => true,
        "job_type_id" => true,
        "description" => true,
        "detail" => true,
        "business_skill" => true,
        "knowledge" => true,
        "location" => true,
        "activity" => true,
        "academic_degree_doctor" => true,
        "academic_degree_master" => true,
        "academic_degree_professional" => true,
        "academic_degree_bachelor" => true,
        "salary_statistic_group" => true,
        "salary_range_first_year" => true,
        "salary_range_average" => true,
        "salary_range_remarks" => true,
        "restriction" => true,
        "estimated_total_workers" => true,
        "remarks" => true,
        "url" => true,
        "seo_description" => true,
        "seo_keywords" => true,
        "sort_order" => true,
        "publish_status" => true,
        "version" => true,
        "created_by" => true,
        "created" => true,
        "modified" => true,
        "deleted" => true,
        "job_category" => true,
        "job_type" => true,
        "jobs_career_paths" => true,
        "jobs_rec_qualifications" => true,
        "jobs_req_qualifications" => true,
        "jobs_tools" => true,
        "basic_abilities" => true,
        "personalities" => true,
        "practical_skills" => true,
    ];

    /**
     * Virtual field: Short Description
     *
     * This virtual field returns a shortened version of the description field,
     * truncated to the specified length (default: 100 characters) followed by an ellipsis
     * if the description length exceeds the specified length.
     *
     * @param  int $length The maximum length of the shortened description (default: 100)
     * @return string Shortened description
     */
    public function getShortDescription($length = 100): string
    {
        return strlen($this->description) > $length
            ? substr($this->description, 0, $length) . "..."
            : $this->description;
    }
}
