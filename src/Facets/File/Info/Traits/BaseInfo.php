<?php
/**
 * File       BaseInfo.php
 *
 * @package   cms.com
 * @author    Imani Manyara <imani@simtabi.com>
 * @date      24-09-2019 —— 10:48
 * @link      http://simtabi.com/
 * @since     24/09/2019
 * @version   1.0
 */

namespace Simtabi\Snippets\Packages\File\Info\Traits;

use Simtabi\Snippets\File\Exception\FileNotExistsException;
use Simtabi\Snippets\File\Exception\NotFileException;
use Simtabi\Snippets\File\Exception\PropertyNotExistsException;
use Simtabi\Snippets\File\Info\Helpers\FileTool;

trait BaseInfo
{

    /** @var string path to the file */
    protected $_path;

    /**
     * @param string $name
     * @return mixed
     * @throws PropertyNotExistsException
     *
     * @author    Imani Manyara <imani@simtabi.com>
     * @date      24-09-2019 —— 10:53
     * @link      http://simtabi.com
     * @since     24/09/2019
     * @version   1.0
     */
    public function __get(string $name)
    {
        $method = 'get' . $name;
        if (method_exists($this, $method)) {
            return call_user_func([$this, $method]);
        }

        throw new PropertyNotExistsException();
    }

    /**
     * @return string
     */
    public function getPath() : string
    {
        return $this->_path;
    }

    /**
     * @param string $path
     *
     * @throws FileNotExistsException
     * @throws NotFileException
     */
    private function init(string $path)
    {
        $this->_path = $path;

        if (!file_exists($this->_path)) {
            throw new FileNotExistsException('file ' . $this->_path . ' not exists');
        }

        $type = FileTool::type($this->_path);
        if ('file' !== $type) {
            throw new NotFileException('type of ' . $this->_path . ' is ' . $type . ' (not file)');
        }
    }
}
