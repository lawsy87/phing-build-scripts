<?php

require_once "phing/Task.php";

/**
 * Phing task to output a deploy log message and optionally email it
 */
class DeployLogTask extends Task {

    /**
     * Repo URL
     */
    protected $repo;

    /**
     * Release path deployment has been made to
     */
    protected $release;

    /**
     * Symlink location release is pointed to from (i.e. the live location)
     */
    protected $to;

    /**
     * Last commit details
     */
    protected $lastCommit;

    /**
     * Path to logs folder
     */
    protected $logPath;

    /**
     * If set, emails the log
     */
    protected $email;

    public function setRepo($repo) 
    {
        $this->repo = $repo;
    }

    public function setRelease($release)
    {
        $this->release = $release;
    }

    public function setTo($to) 
    {
        $this->to = $to;
    }

    public function setLastCommit($lastCommit) 
    {
        $this->lastCommit = $lastCommit;
    }

    public function setLogPath($logPath) 
    {
        $this->logPath = $logPath;
    }

    public function setEmail($email) 
    {
        $email = filter_var($this->email, FILTER_VALIDATE_EMAIL);
        if ($email === false) {
            throw new BuildException('You must pass a valid email address in the email attribute');
        }
        
        $this->email = $email;
    }

    /**
     * Ensure that correct parameters were passed in
     *
     * @return void
     */
    public function checkParams() 
    {
        $required = array('repo', 'release', 'to', 'logPath');
        $errors = array();
        foreach ($required as $property) {
            if (empty($this->$property)) {
                $errors[] = $property;
            }
        }
        if (count($errors) > 0) {
            throw new BuildException('You must specify the following attributes: ' . implode($errors, ', '));
        }
    }

    /**
     * Build the log message
     *  
     * @return void
     */
    public function main() 
    {
        $this->checkParams();

        $date = new DateTime();
        $dateFormatted = $date->format('%Y-%m-%d %H:%I:%S');

        $log = <<<EOD
Date: $dateFormatted

Deployment details
------------------
Deployed: {$this->repo}
Release:  {$this->release}
To:       {$this->to}
                    
EOD;

        if (!empty($this->lastCommit)) {
            $log .= <<<EOD
Latest commit
-------------
{$this->lastCommit}		

EOD;
        }

        // Do something with the log
        file_put_contents(rtrim($this->logPath, '/') . '/' . $date->format('%Y%m%d_%H%I%S') . '.log', $log);

        // Email the log
        if (!empty($this->email)) {
            mail($this->email, 'Deployment of {$this->repo} to {$this->to}', $log);
        }
    }

}
