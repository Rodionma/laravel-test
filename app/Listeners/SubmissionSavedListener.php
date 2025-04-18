<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Support\Facades\Log;

class SubmissionSavedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(SubmissionSaved $event): void
    {
        $submission = $event->getSubmission();

        Log::channel('submissions')->info(
            'Submission saved: ' . $submission->getName() . '; ' . $submission->getEmail()
        );
    }
}
