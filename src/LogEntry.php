<?php

namespace SNicholson\RequestLogger;

use JsonSerializable;
use Slim\Http\Request;

/**
 * Class LogEntry
 *
 * Takes a simple Slim 3.0 Request and creates a log entry
 *
 * @package SNicholson\RequestLogger
 */
class LogEntry implements JsonSerializable
{

    /**
     * @var Request
     */
    private $request;

    /**
     * LogEntry constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'timestamp' => (new \DateTime('now'))->format('U'),
            'path'      => $this->request->getUri()->getPath(),
            'params'    => $this->request->getParams(),
            'method'    => $this->request->getMethod(),
            'headers'   => $this->request->getHeaders(),
        ];
    }

    /**
     * Writes the contents of this log entry into a file
     *
     * @param $fileName
     */
    public function writeToFile($fileName)
    {
        file_put_contents($fileName, json_encode($this->jsonSerialize()) . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}