<?php

namespace App\Http\Controllers;

use App\DTO\SubmissionDTO;
use App\Services\SubmissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class SubmissionController extends Controller
{
    public function __construct(private SubmissionService $submissionService)
    {}

    public function store(Request $request): JsonResponse
    {
        try{
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $dto = new SubmissionDto(
            $request->get('name'),
            $request->get('email'),
            $request->get('message'),
        );

        $dto = $this->submissionService->submissionJobStart($dto);

        return response()->json([
            'name' => $dto->getName(),
            'email' => $dto->getEmail(),
            'message' => $dto->getMessage(),
        ]);
    }
}
