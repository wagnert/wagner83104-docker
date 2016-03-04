<?php
/**
 * This is project's console commands configuration for Robo task runner.
*
* @see http://robo.li/
*/
class RoboFile extends \Robo\Tasks
{

    public function sync()
    {
        $this->taskRsync()
        ->fromPath('/opt/appserver/webapps/')
        ->toHost('172.17.0.2')
        ->toUser('root')
        ->toPath('/opt/appserver/webapps/')
        ->remoteShell('ssh -i public_key')
        ->recursive()
        ->excludeVcs()
        ->checksum()
        ->wholeFile()
        ->verbose()
        ->progress()
        ->humanReadable()
        ->stats()
        ->run();
    }
}