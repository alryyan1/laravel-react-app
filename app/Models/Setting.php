<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property int|null $header
 * @property int|null $footer
 * @property string|null $header_base64
 * @property string|null $footer_base64
 * @property string|null $header_content
 * @property string|null $footer_content
 * @property string|null $logo_base64
 * @property string|null $lab_name
 * @property string|null $hospital_name
 * @property string|null $inventory_notification_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFooterBase64($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFooterContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereHeaderBase64($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereHeaderContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereHospitalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereInventoryNotificationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLabName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLogoBase64($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @property int $is_header
 * @property int $is_footer
 * @property int $is_logo
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsLogo($value)
 * @property int|null $print_direct
 * @property string $theme
 * @property string $lang
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePrintDirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTheme($value)
 * @property int $disable_doctor_service_check
 * @property string $currency
 * @property string $phone
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDisableDoctorServiceCheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePhone($value)
 * @property int $gov
 * @property int $country
 * @property int $barcode
 * @property int $show_water_mark
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereGov($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereShowWaterMark($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    protected $guarded = [];
    use HasFactory;
}
