<?php
/**
 * IO Element object for Teltonika's FMXXXX GPS device.
 *
 * @author      Thierno Ib. Barry
 * @date        26 Feb 2011     
 * @see         Teltonika FMXXXX Protocols
 * @license     GNU/LGPL v2.1
 */

require_once 'IO.class.php';

/**
 * @todo    Add getters to get Hex values (getHexVaribleName)\n
 *          Example: getHexEventID()
 */
class IOElement
{
    /**
     * Event IO ID
     */ 
    private $_event_io_id;
    
    /**
     * Total number of properties coming with record
     */ 
    private $_nb_total_io;
    
    /**
     * IO array defined by array(io length => io)
     *
     * @see __constructor
     */ 
    private $_io_array;
    
    /**
     * Constructor
     *
     * @param array $args Constructor arguments
     */ 
    public function __construct($args = array())
    {
        $this->_io_array = array(
            1 => null, # IO of 1 byte
            2 => null, # IO of 2 bytes
            4 => null, # IO of 4 bytes
            8 => null  # IO of 8 bytes
        );
    }
    
    /**
     * Get the Event IO ID value converted in integer.
     *
     * @return int Return the Event IO ID converted in integer
     */ 
    public function getEventIOID()
    {
        return hexdec($this->_event_io_id);
    }
    
    /**
     * Get the number of IO value converted in integer.
     * Total number of properties coming with record.
     *
     * @return int Return the number total of IO converted in integer
     */ 
    public function getTotalIO()
    {
        return hexdec($this->_nb_total_io);
    }
    
    /**
     * Setter for the Event IO ID.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The Event IO ID value in Hex base (16)
     */ 
    public function setEventIOID($val)
    {
        $this->_event_io_id = $val;
    }
    
    /**
     * Setter for the number of IO.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The number of IO value in Hex base (16)
     */ 
    public function setTotalIO($val)
    {
        $this->_nb_total_io = $val;
    }
    
    /**
     * Get IO.
     *
     * @param int $size The length (type) of IO's property which is wanted.
     * @return IO Return wanted IO or false if the given size doesn't exist
     */ 
    public function getIO($size)
    {
        if (array_key_exists($size, count($this->_io_array))) {
            return $this->_io_array[$size];
        }
        return false;
    }
    
    /**
     * Get all IOs.
     *
     * @return array Return an array of all IOs
     */ 
    public function getAllIO()
    {
        return $this->_io_array;
    }
    
    /**
     * Setter for a type of IO.
     * Note: Both of the parameters must be an Hexadecimal value
     *
     * @param int $size The length (type) of IO's property which is wanted to add.
     * @param IO $io IO object
     */ 
    public function setIO($size, $io)
    {
        if (array_key_exists($size, $this->_io_array)) {
            $this->_io_array[$size] = $io;
        }
    }
    
    /**
     * Check if data is acquired on event or not
     *
     * @return boolean Return true if data is acquired on event and false if not
     */ 
    public function isOnEvent()
    {
        return $this->getEventIOID() != 0;
    }
}
?>