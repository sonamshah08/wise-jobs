<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyJob extends Model
{
    use HasFactory;
    protected $table = 'company_jobs';

    protected $fillable = [
        'title',
        'description',
        'salary',
        'company_id',
        'location',
        'is_remote',
    ];

     // Define relationships (e.g., with company)
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
