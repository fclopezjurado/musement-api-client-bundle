<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient\Infrastructure\Client\Exception;

use Exception;

class BadGatewayException extends Exception
{
    /**
     * @var string
     */
    protected $message = 'Bad gateway';
}
