<?php
namespace WOSPM\Checker;

/**
 * Class for getting the projects git info
 */
class ProjectRepository extends \Cz\Git\GitRepository
{
    /**
     * Get information of project git remote
     *
     * @return array
     */
    public function getRemoteOrigin()
    {
        $remote = $this->extractFromCommand(
            'git config --get remote.origin.url',
            'trim'
        );

        $remote[0] = str_replace('.git', '', $remote[0]);
        $output    = explode('@', str_replace(':', '@', $remote[0]));

        return array(
            "vendor" => $output[1],
            "repo"   => $output[0]
        );
    }
}
