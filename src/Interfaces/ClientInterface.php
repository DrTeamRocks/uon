<?php

namespace Uon\Interfaces;

use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    /**
     * Execute request and return response
     *
     * @return null|object Array with data or NULL if error
     *
     * @throws \Uon\Exceptions\UonEmptyResponseException If empty response received from U-On
     * @throws \Uon\Exceptions\UonTooManyRequests If amount or repeats is more than allowed
     * @throws \Uon\Exceptions\UonParameterNotSetException If config parameter is not set
     * @throws \Uon\Exceptions\UonHttpClientException If http exception occurred
     */
    public function exec();

    /**
     * Execute query and return RAW response from remote API
     *
     * @return null|\Psr\Http\Message\ResponseInterface RAW response or NULL if error
     *
     * @throws \Uon\Exceptions\UonEmptyResponseException If empty response received from U-On
     * @throws \Uon\Exceptions\UonTooManyRequests If amount or repeats is more than allowed
     * @throws \Uon\Exceptions\UonParameterNotSetException If config parameter is not set
     * @throws \Uon\Exceptions\UonHttpClientException If http exception occurred
     */
    public function raw(): ?ResponseInterface;
}
