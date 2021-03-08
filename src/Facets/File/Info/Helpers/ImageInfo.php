<?php
/**
 * File       ImageInfo.php
 *
 * @package   cms.com
 * @author    Imani Manyara <imani@simtabi.com>
 * @date      24-09-2019 —— 10:57
 * @link      http://simtabi.com/
 * @since     24/09/2019
 * @version   1.0
 */

namespace Simtabi\Snippets\File\Info\Helpers;

class ImageInfo
{

    use BaseInfo;

    /** @var string MIME Content-type for a file */
    protected $_mime;
    /** @var int */
    protected $_width;
    /** @var int */
    protected $_height;

    /**
     * ImageInfo constructor.
     *
     * @param $path
     *
     * @throws NotImageException
     * @throws FileNotExistsException
     * @throws NotFileException
     */
    public function __construct($path)
    {
        $this->init($path);
        $this->_mime = FileTool::mime($this->_path);

        if (false === ($type = exif_imagetype($this->_path)) || $this->_mime !== image_type_to_mime_type($type)) {
            throw new NotImageException();
        }

        list($this->_width, $this->_height) = getimagesize($this->_path);
    }

    /**
     * @return string
     */
    public function getMime() : string
    {
        return $this->_mime;
    }

    /**
     * @return int
     */
    public function getWidth() : int
    {
        return $this->_width;
    }

    /**
     * @return int
     */
    public function getHeight() : int
    {
        return $this->_height;
    }
}
