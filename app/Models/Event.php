<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'title',
        'description',
        'start_date',
        'end_date',
        'local',
        'workload',
        'photo_path',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function speakers()
    {
        return $this->belongsToMany(
            User::class,
            'events_speakers',
            'event_id',
            'user_id'
        )->withTimestamps();
    }

    public function addSpeaker($id)
    {
        $this->speakers()->syncWithoutDetaching([$id]);
    }

    public function removeSpeaker($id)
    {
        $this->speakers()->detach($id);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'events_participants', 'event_id', 'user_id')->withTimestamps();
    }

    public function addParticipant($id)
    {
        $this->participants()->syncWithoutDetaching([$id]);
    }

    public function removeParticipant($id)
    {
        $this->participants()->detach($id);
    }

}
