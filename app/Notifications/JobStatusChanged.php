<?php

namespace App\Notifications;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class JobStatusChanged extends Notification
{
    use Queueable;

    public function __construct(public Job $job)
    {
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toArray($notifiable): array
    {
        return [
            'job_id' => $this->job->id,
            'title' => $this->job->title,
            'status' => $this->job->status,
            'rejection_reason' => $this->job->rejection_reason,
            'message' => "Your job posting '{$this->job->title}' has been " . ($this->job->status === 'approved' ? 'approved!' : 'rejected.')
        ];
    }
}
