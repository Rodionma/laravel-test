<?php

namespace App\Services;

use App\DTO\SubmissionDTO;
use App\Jobs\StoreSubmission;
use App\Repositories\SubmissionRepositoryInterface;

class SubmissionService
{
    private SubmissionRepositoryInterface $submissionRepository;
    public function __construct(SubmissionRepositoryInterface $submissionRepository)
    {
        $this->submissionRepository = $submissionRepository;
    }

    public function submissionJobStart(SubmissionDTO $submission): SubmissionDTO
    {
        StoreSubmission::dispatch($submission);

        return $submission;
    }
}
