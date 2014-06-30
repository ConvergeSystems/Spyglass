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
    
    /**
     * Uitlity method used to create a very simple sparkline graph
     * method can be called multiple times to draw multiple graphs in a single lense
     * 
     * @param string $name -- the name label for the graph
     * @param array $data -- this is a very simple array. Just list the numeric values to be plotted
     *          array(11, 12, 33, 14, 55, ...)
     * 
     * @access public
     * @static
     * @return string
     */
    public static function sparkLink($name, array $data = array())
    {
        ////TODO: make this happen
        //// http://www.php.net//manual/en/function.imageline.php  
        //// http://www.amcharts.com/demos/micro-charts-sparklines/
        //
        //
        //$hexToRgb = function($hex){
        //    $hex = ltrim(strtolower($hex), '#');
        //    $hex = isset($hex[3]) ? $hex : $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
        //    $dec = hexdec($hex);
        //    
        //    return array(0xFF & ($dec >> 0x10), 0xFF & ($dec >> 0x8), 0xFF & $dec);
        //}
        //
        //$size = '300x75';
        //$back = 'ffffff';
        //$line = '1388db';
        //$fill = 'e6f2fa';
        //
        //$w = 300;
        //$h = 75;
        //$w = floor(max(50, min(800, $w)));
        //$h = !strstr($size, 'x') ? $w : floor(max(20, min(800, $h)));
        //$t = 1.75;
        //$s = 4;
        //
        //$w *= $s;
        //$h *= $s;
        //$t *= $s;
        //
        //$data  = (count($data) < 2) ? array_fill(0, 2, $data[0]) : $data;
        //$count = count($data);
        //$step  = $w / ($count - 1);
        //$max   = max($data);
        //
        //if (!extension_loaded('gd')) {
        //    die('GD extension is not installed');
        //}
        //
        //$im = imagecreatetruecolor($w, $h);
        //list($r, $g, $b) = $hexToRgb($back);
        //$bg = imagecolorallocate($im, $r, $g, $b);
        //list($r, $g, $b) = $hexToRgb($line);
        //$fg = imagecolorallocate($im, $r, $g, $b);
        //list($r, $g, $b) = $hexToRgb($fill);
        //$lg = imagecolorallocate($im, $r, $g, $b);
        //imagefill($im, 0, 0, $bg);
        //
        //imagesetthickness($im, $t);
        //
        //foreach ($data as $k => $v) {
        //    $v = $v > 0 ? round($v / $max * $h) : 0;
        //    $data[$k] = max($s, min($v, $h - $s));
        //}
        //
        //$x1 = 0;
        //$y1 = $h - $data[0];
        //$line = array();
        //$poly = array(0, $h + 50, $x1, $y1);
        //
        //for ($i = 1; $i < $count; $i++) {
        //    $x2 = $x1 + $step;
        //    $y2 = $h - $data[$i];
        //    array_push($line, array($x1, $y1, $x2, $y2));
        //    array_push($poly, $x2, $y2);
        //    $x1 = $x2;
        //    $y1 = $y2;
        //}
        //
        //array_push($poly, $x2, $h + 50);
        //imagefilledpolygon($im, $poly, $count + 2, $lg);
        //
        //foreach ($line as $k => $v) {
        //    list($x1, $y1, $x2, $y2) = $v;
        //    imageline($im, $x1, $y1, $x2, $y2, $fg);
        //}
        //
        //$om = imagecreatetruecolor($w / $s, $h / $s);
        //
        //imagecopyresampled($om, $im, 0, 0, 0, 0, $w / $s, $h / $s, $w, $h);
        //imagedestroy($im);
        //imagepng($om);
        //imagedestroy($om);
    }
}
