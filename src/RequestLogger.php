<?php

namespace SNicholson\RequestLogger;

use Slim\Http\Request;
use Slim\Http\Response;

class RequestLogger
{
    /**
     * @var Request
     */
    private $request;
    /**
     * @var Response
     */
    private $response;
    /**
     * @var string
     */
    private $logDirectory;

    public function __construct(Request $request, Response $response, $logDirectory = null)
    {
        if (is_null($logDirectory)) {
            $logDirectory = __DIR__ . '/../logs/' . (new \DateTime())->format('Y-m-d');
        }
        $this->request = $request;
        $this->response = $response;
        $this->logDirectory = $logDirectory;
    }

    public function log()
    {
        $logEntry = new LogEntry($this->request);
        $logEntry->writeToFile($this->logDirectory);
        return $logEntry->jsonSerialize();
    }
}