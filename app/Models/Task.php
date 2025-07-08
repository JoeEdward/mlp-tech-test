<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    /**
     * Will return true if task is completed
     *
     * @return bool
     */
    protected function getIsCompleteAttribute(): bool
    {
        return (bool) $this->completed_at;
    }

    /**
     * Marks the task as completed in the database
     * @return void
     */
    public function markTaskAsComplete(): void
    {
        $this->update([
            'completed_at' => Carbon::now()
        ]);
    }

    protected function casts(): array
    {
        return [
            'completed_at' => 'datetime',
        ];
    }
}
