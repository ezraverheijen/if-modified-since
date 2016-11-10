<?php

/**
 * If-Modified-Since
 * 
 * PHP class to handle the `If-Modifed-Since` functionality.
 * 
 * @link https://varvy.com/ifmodified.html
 * 
 * @author    Ezra Verheijen <ezra.verheijen@gmail.com>
 * @link      https://github.com/ezraverheijen/if-modified-since
 * @copyright Ezra Verheijen
 * @license   MIT License
 */
class IfModifiedSince
{
    /**
     * Constructor
     * 
     * Tests if there's a timestamp to work with and if it's a valid Unix timestamp
     * before setting the headers.
     * 
     * @param int|string $mtime Resource last modified time
     */
    public function __construct($mtime)
    {
        if (empty($mtime) || !$this->isValidUnixTimeStamp($mtime)) {
            throw new Exception('Missing or invalid timestamp');
        }
        
        $this->respond((int) $mtime);
    }
    
    /**
     * Output the `Modified` response
     * 
     * @param int $mtime Unix timestamp the resource was last modified
     */
    protected function respond($mtime)
    {
        if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) &&
            strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $mtime)
        {
            http_response_code(304);         
            exit;
        } else {
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $mtime) . ' GMT');
        }
    }
    
    /**
     * Check if a value is a valid Unix timestamp
     * 
     * @param  mixed   $timestamp Value to check
     * @return boolean 
     */
    protected function isValidUnixTimeStamp($timestamp)
    {
        return (ctype_digit($timestamp) &&
                strtotime(date('d-m-Y H:i:s', $timestamp)) === (int) $timestamp);
    }
}
