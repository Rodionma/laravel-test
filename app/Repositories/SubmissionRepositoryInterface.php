<?php

namespace App\Repositories;

use App\Models\Submission;

interface SubmissionRepositoryInterface
{
    public function store(Submission $submission): Submission;
}
