<?php
namespace zcrmsdk\oauth\exception;

class ZohoOAuthException extends \Exception
{
    
    protected $message = 'Unknown exception';
    
    // Exception message
    private $string;
    
    // Unknown
    protected $code = 0;
    
    // User-defined exception code
    protected string $file = ""; // Temporary fix until we upgrade to new SDK - https://help.zoho.com/portal/en/community/topic/type-of-zcrmsdk-crm-exception-zcrmexception-file-must-be-string-as-in-class-exception
    
    // Source filename of exception
    protected int $line; // Temporary fix until we upgrade to new SDK - https://help.zoho.com/portal/en/community/topic/type-of-zcrmsdk-crm-exception-zcrmexception-file-must-be-string-as-in-class-exception
    
    // Source line of exception
    private $trace;
    
    public function __construct($message = null, $code = 0)
    {
        if (! $message) {
            throw new $this('Unknown ' . get_class($this));
        }
        parent::__construct($message, $code);
    }
    
    public function __toString()
    {
        return get_class($this) . " Caused by:'{$this->message}' in {$this->file}({$this->line})\n" . "{$this->getTraceAsString()}";
    }
}
