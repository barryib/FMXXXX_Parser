<?php
/**
 * GPS Element object for Teltonika's FMXXXX GPS device.
 *
 * @author      Thierno Ib. Barry
 * @date        26 Feb 2011     
 * @see         Teltonika FMXXXX Protocols
 * @license     GNU/LGPL v2.1
 */

/**
 * @todo        Add getters to get Hex values (getHexVaribleName).
 *              Example: getHexLatitude()
 */
class GPSElement
{   
    private $_longitude;
    private $_latitude;
    private $_altitude;
    private $_angle;
    private $_satellites;
    private $_speed;
    
    /**
     * Constructor
     *
     * @param array $args Constructor arguments
     */ 
    public function __construct($args = array())
    {
        
    }
    
    /**
     * Get latitude value converted in integer.
     *
     * @see Two's compliment arithmetics.
     *
     * @return int Return the latitude value converted in integer
     */ 
    public function getLatitude()
    {
        /**
         * @todo Binary conversion
         * @todo Test on first bit
         * @todo See two's compliment arithmetics
         */
    }
    
    /**
     * Get longitude value converted in integer.
     *
     * @see Two's compliment arithmetics.
     *
     * @return int Return the longitude value converted in integer
     */ 
    public function getLongitude()
    {
        /**
         * @todo Binary conversion
         * @todo Test on first bit
         * @todo See two's compliment arithmetics
         */
        //echo base_convert($this->_longitude, 16, 2);
    }
    
    /**
     * Get altitude value converted in integer
     *
     * @return int Return the altitude value converted in integer
     */ 
    public function getAltitude()
    {
        return hexdec($this->_altitude);
    }
    
    /**
     * Get angle value converted in integer
     *
     * @return int Return the angle value converted in integer
     */ 
    public function getAngle()
    {
        return hexdec($this->_angle);
    }
    
    /**
     * Get satellites number converted in integer
     *
     * @return int Return the satellites number converted in integer
     */ 
    public function getSatellites()
    {
        return hexdec($this->_satellites);
    }
    
    /**
     * Get speed value converted in integer (kmph or mph)
     * 
     * @param string $unit  The unit in which the speed have to be converted
     *                      The unit must be:
     *                       + kpmh -> Km/h
     *                       + mph  -> Milles/h
     * @return int Return the speed value converted in integer
     */ 
    public function getSpeed($unit = 'kmph')
    {
        /**
         * @todo Conversion in Km/h or Milles/h
         */ 
        $speed = hexdec($this->_speed);
        switch ($unit) {
            case 'kpmh':
                
                break;
            case 'mph':
                
                break;
        }
        return $speed;
    }
    
    /**
     * Setter for latitude attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The latitude value in Hex base (16)
     */ 
    public function setLatitude($val)
    {
        $this->_latitude = $val;
    }
    
    /**
     * Setter for longitude attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The longitude value in Hex base (16)
     */ 
    public function setLongitude($val)
    {
        $this->_longitude = $val;
    }
    
    /**
     * Setter for altitude attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The altitude value in Hex base (16)
     */ 
    public function setAltitude($val)
    {
        $this->_altitude = $val;
    }
    
    /**
     * Setter for angle attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The angle value in Hex base (16)
     */ 
    public function setAngle($val)
    {
        $this->_angle = $val;
    }
    
    /**
     * Setter for satellites attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The satellites value in Hex base (16)
     */ 
    public function setSatellites($val)
    {
        $this->_satellites = $val;
    }
    
    /**
     * Setter for speed attribute.
     * Note: The value must be in Hexadecimal.
     *
     * @param string $val The speed value in Hex base (16)
     */ 
    public function setSpeed($val)
    {
        $this->_speed = $val;
    }
    
    /**
     * Check if the GPSElement is valid or not.
     * Note: The GPSElement is valid only if the speed is different of 0.
     * 
     * @see FMXXXX protocols for more informations
     *
     * @return boolean Return true if the GPS Element is valid and false if not.
     */ 
    public function isValid()
    {
        return $this->getSpeed() != 0;
    }
}
?>