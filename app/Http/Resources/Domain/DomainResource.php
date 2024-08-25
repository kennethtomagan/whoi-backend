<?php

namespace App\Http\Resources\Domain;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DomainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Check if the 'WhoisRecord' key exists and is not empty
        if (empty($this->resource['WhoisRecord'])) {
            return [];
        }

        $data = $this->resource['WhoisRecord'];

        return [
            'domain_information' => [
                'domain' => $this->returnData($data, 'domainName'),
                'registrar' => $this->returnData($data, 'registrarName'),
                'registrationDate' => $this->returnData($data, 'createdDateNormalized'),
                'expirationDate' => $this->returnData($data, 'expiresDateNormalized'),
                'estimatedAge' => $this->returnData($data, 'estimatedDomainAge'),
                'hostnames' => $data['registryData']['nameServers']['hostNames'] ?? [],
            ],
            'contact_information' => [
                'registrarantName' => $this->returnData($data['registrant'] ?? [], 'name'),
                'technicalContactName' => $this->returnData($data['technicalContact'] ?? [], 'name'),
                'administrativeContactName' => $this->returnData($data['administrativeContact'] ?? [], 'name'),
                'contactEmail' => $this->returnData($data, 'contactEmail'),
            ]
        ];
    }

    /**
     * Helper method to return data if the key exists or return null.
     *
     * @param array $array The array to check.
     * @param string $key The key to look for.
     * @return mixed|null The value if found, or null if not.
     */
    private function returnData(array $array, string $key)
    {
        return $array[$key] ?? "N/A";
    }
}
