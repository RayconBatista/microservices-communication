<?php

namespace RayconBatista\MicroservicesCommunication\Services\Traits;

use Illuminate\Support\Facades\Http;

trait ConsumeExternalService
{
  public function headers(array $headers = [])
  {
    $newHeader = [
      'Accept' => 'application/json',
      'Authorization' => $this->token
    ];
    
    $headers = array_merge($newHeader, $headers);

    return Http::withHeaders($headers);
  }

  public function request(
    string $method, 
    string $endpoint, 
    array $formParams = [], 
    array $headers = []
  ) {
    return $this->headers($headers)->$method($this->url . $endpoint, $formParams);
  }
}