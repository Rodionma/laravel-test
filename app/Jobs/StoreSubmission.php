<?php

namespace App\Jobs;

use App\DTO\SubmissionDTO;
use App\Events\SubmissionSaved;
use App\Models\Submission;
use App\Repositories\SubmissionRepositoryInterface;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class StoreSubmission implements ShouldQueue
{
    use Queueable;


    public function __construct(protected SubmissionDTO $submissionDTO)
    {
    }


    public function handle(SubmissionRepositoryInterface $repository): void
    {
        $submission = new Submission();

        $submission->name = $this->submissionDTO->getName();
        $submission->email = $this->submissionDTO->getEmail();
        $submission->message = $this->submissionDTO->getMessage();

        $repository->store($submission);

        SubmissionSaved::dispatch($this->submissionDTO);
    }

    public function failed(Exception $exception): void
    {
        Log::channel('submissions')->error($exception->getMessage());
    }
}
