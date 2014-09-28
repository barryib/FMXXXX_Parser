<?php
require_once 'GPSElement.class.php';
require_once 'IOElement.class.php';

/**
 * AVL Packet for Teltonika's FMXXXX GPS device.
 * 
 * @author      Thierno Ib. Barry
 * @date        26 Feb 2011
 * @see         Teltonika FMXXXX Protocols
 * @license     GNU/LGPL v2.1
 */

/**
 * @todo    Add getters to get Hex values (getHexVaribleName)\n
 *          Example: getHexDataLength()
 */
class AVLPacket
{    
    /**
     * Data Length of AVL Packet
     */
    private $_data_length;
    
    /**
     * CRC of AVL Packet
     */ 
    private $_crc;
    
    /**
     * Decapsulated Raw data of TCP header and CRC
     * 
     * @access public
     */ 
    public $data;
    
    /**
     * AVLDataArray container
     * 
     * @accrss public
     */ 
    public $avl_data_array;
    
    /**
     * Constructor.
     *
     * @param array $args Constructor arguments
     */ 
    public function __construct($args = array())
    {
        $this->avl_data_array = new AVLDataArray();
    }
    
    /**
     * Get the data length value converted in integer.
     *
     * @return int Return the data length value converted in integer
     */ 
    public function getDataLength()
    {
        return hexdec($this->_data_length);
    }
    
    /**
     * Setter for the data_length attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The data length value in Hex base (16)
     */ 
    public function setDataLength($val)
    {
        $this->_data_length = $val;
    }
    
    /**
     * Get the CRC field converted in integer.
     *
     * @return int Return the CRC field converted in integer
     */ 
    public function getCRC()
    {
        return hexdec($this->_crc);
    }
    
    /**
     * Setter for the CRC attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The CRC value in Hex base (16)
     */ 
    public function setCRC($val)
    {
        $this->_crc = $val;
    }
}

/**
 * AVL Data Array for Teltonika's FMXXXX GPS device.
 * 
 * @author      Thierno Ib. Barry <ibrahima.br@gmail.com>
 * @date        26 Feb 2011
 * @see         Teltonika FMXXXX Protocols
 * @license     GNU/LGPL v2.1
 */

/**
 * @todo        Add getters to get Hex values (getHexVaribleName)\n
 *              Example: getHexDataLength()
 */
class AVLDataArray
{
    /**
     * Codec ID
     */ 
    private $_codec_id;
    
    /**
     * Number of Data in the AVL Data Array
     */ 
    private $_nb_data;
    
    /**
     * Array of AVLData
     */ 
    private $_avl_datas;

    /**
     * Constructor.
     *
     * @param array $args Constructor arguments
     */ 
    public function __construct($args = array())
    {
        $this->_avl_datas = array();
    }
    
    /**
     * Get the codec id value converted in integer.
     *
     * @return int Return the codec id value converted in integer
     */ 
    public function getCodecID()
    {
        return hexdec($this->_codec_id);
    }
    
    /**
     * Get the number of data in the AVLDataArray converted in integer.
     *
     * @return int Return the number data value converted in integer
     */ 
    public function getNbData()
    {
        return hexdec($this->_nb_data);
    }
    
    /**
     * Get the array of AVLData.
     *
     * @return array Return an array of AVLData
     */ 
    public function getAVLDatas()
    {
        return $this->_avl_datas;
    }
    
    /**
     * Setter for the codec id attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The Codec ID value in Hex base (16)
     */
    public function setCodecID($val)
    {
        $this->_codec_id = $val;
    }
    
    /**
     * Setter for the number of data.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The number of data value in Hex base (16)
     */
    public function setNbData($val)
    {
        $this->_nb_data = $val;
    }
    
    /**
     * Add a new AVLData into the array of AVLs Data.
     *
     * @param AVLData $avl_data The new AVL Data which will add into
     */
    public function addAVLData($avl_data)
    {
        $this->_avl_datas[] = $avl_data;
    }
}

/**
 * AVL Data for Teltonika's FMXXXX GPS device.
 * 
 * @author      Thierno Ib. Barry <ibrahima.br@gmail.com>
 * @date        26 Feb 2011
 * @see         Teltonika FMXXXX Protocols
 * @license     GNU/LGPL v2.1
 */

/**
 * @todo        Add getters to get Hex values (getHexVaribleName).
 *              Example: getHexTimestamp()
 */
class AVLData
{
    /**
     * Timestamp - Difference, in milliseconds,
     * between the current time and midnight, January 1, 1970 UTC
     */ 
    private $_timestamp;
    
    /**
     * Priority of the AVL Data.
     * It must be an Hex value between [0x00 - 0x03]
     */ 
    private $_priority;
    
    /**
     * Priorities name. It's a array as array(priority => priority_name)
     */ 
    private $_str_priority;
    
    /**
     * GPSElement container.
     *
     * @access public
     */ 
    public $gps_element;
    
    /**
     * IOElement container.
     *
     * @access public
     */ 
    public $io_element;
    
    /**
     * Constructor.
     *
     * @param array $args Constructor arguments
     */ 
    public function __construct($args = array())
    {
        $this->gps_element = new GPSElement();
        $this->io_element = new IOElement();
        $this->_str_priority = array(
            0 => 'Low',
            1 => 'High',
            2 => 'Panic',
            3 => 'Security'
        );
    }
    
    /**
     * Get timestamp value converted in integer.
     *
     * @return int Return the timestamp value converted in integer
     */ 
    public function getTimestamp()
    {
        return hexdec($this->_timestamp);
    }
    
    /**
     * Get the timestamp value converted in string by php date function.
     *
     * @see Php manual for dateformat.
     *
     * @param string $date_format A valid php dateformat
     * @return string Return the latitude value converted in valid date string
     */ 
    public function getStrTimestamp($date_format = '')
    {
        /**
         * @todo Find out a valid dateformat to put in default.
         * @todo Return timestamp in accordance to the given date format.
         */ 
    }
    
    /**
     * Get the priority value converted in integer.
     *
     * @return int Return the priority value converted in integer
     */ 
    public function getPriority()
    {
        return hexdec($this->_priority);
    }
    
    /**
     * Setter for the timestamp attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The timestamp value in Hex base (16)
     */ 
    public function setTimestamp($val)
    {
        $this->_timestamp = $val;
    }
    
    /**
     * Setter for the priority attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The priority value in Hex base (16)
     */ 
    public function setPriority($val)
    {
        $this->_priority = $val;
        
    }
    
    /**
     * Get the priority name.
     *
     * @return string Return the priority short name: Low, High, Panic or Security.
     */ 
    public function getStrPriority()
    {
        return $this->_str_priority[$this->getPriority()];
    }
}
?>