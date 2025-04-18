<?php

namespace Tests\Unit;

use App\DTO\SubmissionDTO;
use App\Jobs\StoreSubmission;
use App\Repositories\SubmissionRepository;
use App\Repositories\SubmissionRepositoryInterface;
use App\Services\SubmissionService;
use Illuminate\Support\Facades\Bus;
use Mockery;
use Tests\TestCase;


class SubmissionTest extends TestCase
{
    public function test_store(): void
    {
        $mock = Mockery::mock(SubmissionRepository::class);

        $submissionService = new SubmissionService($mock);

        $submission = $submissionService->submissionJobStart(new SubmissionDTO(
            'test',
            'test@gmail.com',
            'test message'
        ));

        $this->assertInstanceOf(SubmissionDTO::class, $submission);
        Bus::assertDispatched(StoreSubmission::class);
        Bus::assertDispatchedTimes(StoreSubmission::class);
    }
}
