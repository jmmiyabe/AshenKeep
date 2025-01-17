<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Applicants extends Model
{
    protected $table = 'applicant';
    protected $fillable = [
        'full_name',
        'permanent_address',
        'current_address',
        'provincial_address',
        'email',
        'landline_number',
        'mobile_number',
        'date_of_birth',
        'place_of_birth',
        'citizenship',
        'place_of_catholic_baptism',
        'date_of_catholic_baptism',
        'religious_organization_affiliated_with',
        'donors_occupation',
        'employers_name_or_business_name',
        'business_address',
        'employers_email_or_business_email_address',
        'business_landline_number',
        'business_mobile_number',
        'position',
        'years_in_employment_or_business',
        'spouses_name',
        'spouses_date_of_birth',
        'spouses_place_of_birth',
        'spouses_email_address',
        'spouses_landline_number',
        'spouses_mobile_number',
        'fathers_name',
        'fathers_email_address',
        'fathers_landline_number',
        'fathers_mobile_number',
        'mothers_name',
        'mothers_email_address',
        'mothers_landline_number',
        'mothers_mobile_number',
    ];    
}