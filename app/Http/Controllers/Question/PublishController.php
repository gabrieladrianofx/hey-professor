<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PublishController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        Gate::authorize('publish', $question);
        // abort_unless(user()->can('publish', $question), Response::HTTP_FORBIDDEN);

        $question->update(['draft' => false]);

        return back();
    }
}
