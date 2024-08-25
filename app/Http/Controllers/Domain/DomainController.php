<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Http\Requests\Domain\DomainRequest;
use App\Http\Resources\Domain\DomainResource;
use Illuminate\Http\Request;
use App\Services\WhoisService;

class DomainController extends Controller
{
    /**
     * The WhoisService instance.
     *
     * @var \App\Services\WhoisService
     */
    protected $whoisService;

    /**
     * Create a new DomainController instance.
     *
     * @param \App\Services\WhoisService $whoisService
     * @return void
     */
    public function __construct(WhoisService $whoisService)
    {
        $this->whoisService = $whoisService;
    }

    /**
     * Handle the incoming request to fetch WHOIS data.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(DomainRequest $request)
    {
        $domainName = $request->input('domain');
        $whoisData = $this->whoisService->getWhoisData($domainName);

        return new DomainResource($whoisData);
        // return response()->json($whoisData);
    }
}
