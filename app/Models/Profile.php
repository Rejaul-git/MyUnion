<?php
// app/Models/Profile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'holding_number',
        'name_en',
        'name_bn',
        'father_name_en',
        'father_name_bn',
        'mother_name_en',
        'mother_name_bn',
        'spouse_name_en',
        'spouse_name_bn',
        'email',
        'mobile',
        'birth_date',
        'gender',
        'marital_status',
        'current_division',
        'current_district',
        'current_upazila',
        'current_union',
        'current_ward',
        'current_village',
        'current_post_office',
        'current_post_code',
        'current_full_address',
        'permanent_division',
        'permanent_district',
        'permanent_upazila',
        'permanent_union',
        'permanent_ward',
        'permanent_village',
        'permanent_post_office',
        'permanent_post_code',
        'permanent_full_address',
        'same_as_current',
        'photo_path',
        'nid_path',
        'status',
        'remarks',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'same_as_current' => 'boolean',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the full photo URL
     */
    public function getPhotoUrlAttribute(): ?string
    {
        return $this->photo_path ? asset('storage/' . $this->photo_path) : null;
    }

    /**
     * Get the full NID document URL
     */
    public function getNidUrlAttribute(): ?string
    {
        return $this->nid_path ? asset('storage/' . $this->nid_path) : null;
    }

    /**
     * Get full current address
     */
    public function getCurrentAddressAttribute(): string
    {
        return "{$this->current_full_address}, {$this->current_village}, Ward: {$this->current_ward}, {$this->current_union}, {$this->current_upazila}, {$this->current_district}, {$this->current_division}";
    }

    /**
     * Get full permanent address
     */
    public function getPermanentAddressAttribute(): string
    {
        return "{$this->permanent_full_address}, {$this->permanent_village}, Ward: {$this->permanent_ward}, {$this->permanent_union}, {$this->permanent_upazila}, {$this->permanent_district}, {$this->permanent_division}";
    }

    /**
     * Scope to filter by status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope to filter by user
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
