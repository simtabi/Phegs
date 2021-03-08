<?php
/**
 * File       PathInfo.php
 *
 * @package   cms.com
 * @author    Imani Manyara <imani@simtabi.com>
 * @date      24-09-2019 —— 10:57
 * @link      http://simtabi.com/
 * @since     24/09/2019
 * @version   1.0
 */

namespace Simtabi\Snippets\File\Info\Helpers;


class PathInfo
{

    use BaseInfo;

    /** @var string */
    protected $_dirname;
    /** @var string */
    protected $_basename;
    /** @var string|null */
    protected $_extension;
    /** @var string */
    protected $_filename;

    /**
     * PathInfo constructor.
     *
     * @param $path
     *
     * @throws FileNotExistsException
     * @throws NotFileException
     */
    public function __construct($path)
    {
        $this->init($path);

        list(
            'dirname'  => $this->_dirname,
            'basename' => $this->_basename,
            'filename' => $this->_filename
            ) = $info = pathinfo($path);

        $this->_extension = strtolower($info['extension'] ?? '');
    }

    /**
     * @return string
     */
    public function getDirname() : string
    {
        return $this->_dirname;
    }

    /**
     * @return string
     */
    public function getBasename() : string
    {
        return $this->_basename;
    }

    /**
     * @return string|null
     */
    public function getExtension() : ?string
    {
        return $this->_extension;
    }

    /**
     * @return string
     */
    public function getFilename() : string
    {
        return $this->_filename;
    }
}
