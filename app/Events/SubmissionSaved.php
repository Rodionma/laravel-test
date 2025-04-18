<?php

namespace App\Events;

use App\DTO\SubmissionDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubmissionSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(protected SubmissionDTO $submission)
    {
    }

    /**
     * @return SubmissionDTO
     */
    public function getSubmission(): SubmissionDTO
    {
        return $this->submission;
    }

}
