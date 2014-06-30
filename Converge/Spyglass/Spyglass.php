<?php

namespace Converge\Spyglass;

/**
 * Class to gather lenses and display them on the page.
 *
 * @package Converge\Spyglass
 */
class Spyglass
{
    /**
     * An array of lenses for spyglass
     *
     * @var Lense[] An array of spyglass lenses
     */
    private $_lenses = array();
    
    /**
     * Get the array of lenses for Spyglass
     *
     * @uses \Converge\Spyglass::$_lenses
     * @return Lense[] An array of spyglass lenses
     */
    public function getLenses()
    {
        return $this->_lenses;
    }
    
    /**
     * Add a lense to the spyglass
     *
     * @param Lense $lense A Lense to be added to the Spyglass
     * @uses \Converge\Spyglass::$_lenses
     * @return Lense[] All of the Lenses for the spyglass
     */
    public function addLense(\Converge\Spyglass\Lense $lense)
    {
        return $this->_lenses[] = $lense;
    }
    
    /**
     * Builds and returns the markup for the spyglass
     *
     * @uses \Converge\Spyglass::getLenses() to get the lenses needing marked up
     * @uses \Converge\Spyglass\Lense::getName() to get the name of the lense
     * @uses \Converge\Spyglass\Lense::getHtml() to get the markup for the lense
     * @return string HTML for spyglass
     */
    public function getHtml()
    {
        $html = array();
        $html[] = '<div id="converge-spyglass">';
        $html[] = '<ul id="converge-spyglass-lenses">';
        foreach ($this->getLenses() as $lense) {
            $html[] = sprintf('<li id="converge-spyglass-lense-%s" class="converge-spyglass-lense">', $lense->getName());
            $html[] = $lense->getHtml();
            $html[] = '</li>';
        }
        $html[] = '</ul>';
        $html[] = '</div>';
        
        return implode(' ', $html);
    }
    
    /**
     * Decorate the spyglass with a template
     *
     * By default, render uses the Base template, but accepts templates as args.
     *
     * @uses \Converge\Spyglass::getLenses()
     * @param string $template Template with which to decorate the spyglass
     * @return string Spyglass decorated with the provided or base template
     */
    public function render($template = null)
    {
        if (is_null($template)) {
            $template = __DIR__ . DIRECTORY_SEPARATOR . 'Template/Base.phtml';
        }
        
        $args = array('lenses' => $this->getLenses());
        
        return self::template($template, $args);
    }
    
    /**
     * very simple template renderer. 
     * 
     * @param string $file -- the full path to the file to be rendered
     * @param array $args -- an assocative array of args for the template
     * @access public
     * @static
     * @throws \InvalidArgumentException -- if the file is not found
     * @return string
     */
    public static function template($file, array $args = array())
    {
        if(!is_readable($file)){
            throw new \InvalidArgumentException(sprintf('"%s" file was not found', $file));
        }
        
        ob_start();
        
        /**
         * make $args local to template file
         */
        foreach($args as $key => $val){
            $$key = $val;
        }

        include $file;
        
        $html = ob_get_contents();

        ob_end_clean();

        return $html;
    }
}
