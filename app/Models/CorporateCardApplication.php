<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateCardApplication extends Model
{
    use HasFactory;

    protected $fillable = ['applicant_name','position','phone_work','phone_work_mobile', 'manager_id', 'property_n_procurement_manager_id','justification' ];

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manger_id');
    }

    public function propertyAndProcurementManager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'property_n_procurement_manager_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}