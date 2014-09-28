<?php
/*
 * These following constants were taken from FMXXXX Protocol.
 * Refer to it for more informations about fields' length.
 *
 * @author      Thierno Ib. Barry
 * @date        26 Feb 2011     
 * @see         Teltonika FMXXXX Protocols 
 * @license     GNU/LGPL v2.1
 */
define ('LENGTH_FOUR_ZEROS',        4);
define ('LENGTH_DATA_LENGTH',       4);
define ('LENGTH_CRC',               4);
define ('LENGTH_CODEC_ID',          1);
define ('LENGTH_NUMBER_OF_DATA',    1);
define ('LENGTH_TIMESTAMP',         8);
define ('LENGTH_PRIORITY',          1);
define ('LENGTH_GPS_ELEMENT',       15);
define ('LENGTH_GPS_LONGITUDE',     4);
define ('LENGTH_GPS_LATITUDE',      4);
define ('LENGTH_GPS_ALTITUDE',      2);
define ('LENGTH_GPS_ANGLE',         2);
define ('LENGTH_GPS_SATELLITES',    1);
define ('LENGTH_GPS_SPEED',         2);
define ('LENGTH_IO_EVENT_IO_ID',    1);
define ('LENGTH_IO_N',              1);
define ('LENGTH_IO_ID',             1);
define ('LENGTH_IO_VALUE',          1);
?>