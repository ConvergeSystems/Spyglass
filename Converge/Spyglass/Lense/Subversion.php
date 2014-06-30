<?php

namespace Converge\Spyglass\Lense;

/**
 * Prints SVN info in the Spyglass
 *
 * @package \Converge\Spyglass\Lense
 */
class Subversion extends \Converge\Spyglass\Lense
{
    /**
     * The path at which you would like to run `svn info`
     *
     * @var string
     */
    private $_path = '';
    
    /**
     * Get the name of the Lense for displaying on the spyglass.
     *
     * @return string The name of this lense
     */
    public function getName()
    {
        return 'Subversion';
    }
    
    /**
     * Sets the path at which `svn info` will be run.
     *
     * @param string $path The path at which `svn info` will be run.
     * @uses \Converge\Spyglass\Lense\Subversion::$_path To set the path.
     * @return \Converge\Spyglass\Lense\Subversion This lense with the path set
     */
    public function setPath($path)
    {
        $this->_path = realpath($path);
        
        return $this;
    }
    
    /**
     * Returns the HTML for this lense
     *
     * @uses \Converge\Spyglass\Lense\Subversion::$_path to run `svn info`
     * @uses \Converge\Spyglass\Lense::dataList() to decorate the output
     * @return string HTML for this lense.
     */
    public function getHtml()
    {
        $html    = array();
        $info    = array();
        $data    = array();
        $command = sprintf('svn info %s', $this->_path);

        exec($command, $info);

        foreach ($info as $item) {
            $broken = explode(':' , $item);
            $data[array_shift($broken)] = implode(':', $broken);
        }
        
        return self::dataList($data);
    }
}
