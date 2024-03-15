<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = ['company_name','title', 'description', 'tags'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
