<?php
/**
 * IO object for Teltonika's FMXXXX GPS device .
 *
 * @author      Thierno Ib. Barry
 * @date        27 Feb 2011
 * @see         Teltonika FMXXXX Protocols
 * @license     GNU/LGPL v2.1
 */

/**
 * @todo Add getters to get Hex values (getHexVaribleName)
 * Example: getHexNbIO()
 */
class IO
{
    /**
     * Number of this IO's type
     */ 
    private $_nb_io;
    
    /**
     * Array of event
     * Example:
     * Array ([IO ID] => IO Value)
     */ 
    private $_events;
    
    /**
     * Constructor
     *
     * @param array $nb_io The number of a IO's type
     */ 
    public function __construct($nb_io = null)
    {
        $this->_nb_io = $nb_io;
        $this->_events = array();
    }
    
    /**
     * Get the number of IO value converted in integer.
     *
     * @return int Return the number of IO converted in integer
     */ 
    public function getNbIO()
    {
        return hexdec($this->_nb_io);
    }
    
    /**
     * Get the IO's events each converted in integer.
     *
     * @see FMXXXX protocols for more informations about the IO's formation
     *
     * @return array Return IO's events array as array(io_id => io_value)
     */ 
    public function getEvents()
    {
        $ret = array();
        foreach ($this->_events as $id => $value) {
            $ret[hexdec($id)] = hexdec($value);
        }
        return $ret;
    }
    
    /**
     * Add a new event into events array.
     * Note: Both of the parameters must be an Hexadecimal value
     *
     * @param string $id The IO ID which generated the event.
     * @param string $val The IO value of the generated event.
     */ 
    public function addEvent($id, $val)
    {
        $this->_events[$id] = $val;
    }
    
    /**
     * Setter for the number of IO.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The number of IO value in Hex base (16)
     */ 
    public function setNbIO($val)
    {
        $this->_nb_io = $val;
    }
}
?>