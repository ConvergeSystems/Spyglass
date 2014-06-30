<?php
    
namespace Converge\Spyglass;

/**
 * Abstract class to enforce a common interface for Spyglass lenses.
 *
 * @package \Converge\Spyglass
 */
abstract class Lense
{
    /**
     * Requires Concrete Lenses to provide a manner to return HTML
     */
    abstract public function getHtml();
    /**
     * Requires Concrete Lenses to provide a method to retrieve the name.
     */
    abstract public function getName();
    
    /**
     * Utility method used to create a nested definition list from an associative array
     * 
     * @param array $data -- the keys will be the term the value will be the definition.
     *      if the value is an array, a sub-definition list is created
     * @uses \Converge\Spyglass\Spyglass::template() to decorate the data
     * @access public
     * @static
     * @return string
     */
    public static function dataList(array $data = array())
    {
        $file = __DIR__ . '/Template/List.phtml';
        
        return \Converge\Spyglass\Spyglass::template($file, array('data' => $data));
    }
}
