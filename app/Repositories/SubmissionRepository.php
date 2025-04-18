<?php

namespace App\Repositories;

use App\Models\Submission;

class SubmissionRepository implements SubmissionRepositoryInterface
{
    public function store(Submission $submission): Submission
    {
        $submission->save();

        return $submission;
    }
}
