<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property string $phone
 * @property string $email
 * @property float $salary
 * @property int $is_manager
 * @property string|null $job_position
 * @property string|null $first_contract_date
 * @property string|null $working_hours
 * @property int|null $department_id
 * @property string|null $resume
 * @property string|null $address
 * @property string|null $language
 * @property string|null $home_work_distance
 * @property string|null $martial_status
 * @property int|null $number_of_children
 * @property string|null $emergency_contact_name
 * @property string|null $emergency_contact_phone
 * @property int $country_id
 * @property string|null $passport_no
 * @property string|null $date_of_birth
 * @property string|null $place_of_birth
 * @property int $non_resident
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmergencyContactName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmergencyContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFirstContractDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereHomeWorkDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereIsManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereJobPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereMartialStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNonResident($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereNumberOfChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePassportNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePlaceOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereResume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereWorkingHours($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    use HasFactory;
}
