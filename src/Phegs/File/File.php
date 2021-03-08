<?php

namespace Simtabi\Pheg\Phegs\File;

class File
{

    /**
     * for search all html files
     */
    const HTML = 'html';

    /**
     * for search all css files
     */
    const CSS = 'css';

    /**
     * for search all php files
     */
    const PHP = 'php';

    /**
     * for search all js files
     */
    const JS = 'js';

    /**
     * for search all jpeg files
     */
    const JPEG = 'jpeg';

    /**
     * for search all jpg files
     */
    const JPG = 'jpg';

    /**
     * for search all svg files
     */
    const SVG = 'svg';

    /**
     * for search all png files
     */
    const PNG = 'png';

    /**
     * for search all json files
     */
    const JSON = 'json';

    /**
     * for search all xml files
     */
    const XML = 'xml';

    /**
     * for search all pdf files
     */
    const PDF = 'pdf';

    /**
     * for search all pdf files
     */
    const GIF = 'gif';

    /**
     *
     */
    const IMG =  array(
        \Helpers\File::PNG,
        File::JPEG,
        File::JPG,
        File::SVG,
        File::GIF
    );

    const MIME_TYPES = array(
        'txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',

        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',

        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'exe' => 'application/x-msdownload',
        'msi' => 'application/x-msdownload',
        'cab' => 'application/vnd.ms-cab-compressed',

        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',

        'pdf' => 'application/pdf',
        'psd' => 'image/vnd.adobe.photoshop',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',

        'doc' => 'application/msword',
        'rtf' => 'application/rtf',
        'xls' => 'application/vnd.ms-excel',
        'ppt' => 'application/vnd.ms-powerpoint',

        'odt' => 'application/vnd.oasis.opendocument.text',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    );
    /**
     * Open for reading only;
     * place the file pointer at the beginning of the file.
     */
    const READ = 'r';

    /**
     * Open for reading and writing;
     * place the file pointer at the beginning of the file.
     */
    const READ_AND_WRITE = 'r+';

    /**
     * Open for writing only;
     * place the file pointer at the beginning of the file and truncate the file
     * to zero length. If the file does not exist, attempt to create it.
     */
    const EMPTY_AND_WRITE = 'w';

    /**
     * Open for reading and writing;
     * place the file pointer at the beginning of the file and truncate the file
     * to zero length. If the file does not exist, attempt to create it.
     */
    const EMPTY_READ_AND_WRITE = 'w+';

    /**
     * Open for writing only;
     * place the file pointer at the end of the file.
     * If the file does not exist, attempt to create it.
     * In this mode, fseek() has no effect, writes are always appended.
     */
    const END_WRITE = 'a';

    /**
     * Open for reading and writing;
     * place the file pointer at the end of the file.
     * If the file does not exist, attempt to create it.
     * In this mode, fseek() only affects the reading position, writes are always appended.
     */
    const END_READ_AND_WRITE = 'a+';

    /**
     * Create and open for writing only;
     * place the file pointer at the beginning of the file.
     * If the file already exists, the fopen() call will fail by returning FALSE and generating an error of level E_WARNING.
     * If the file does not exist, attempt to create it.
     * This is equivalent to specifying O_EXCL|O_CREAT flags for the underlying open(2) system call.
     */
    const CREATE_ON_WRITE = 'x';

    /**
     * 	Create and open for reading and writing;
     *  otherwise it has the same behavior as 'x'.
     */
    const CREATE_ON_READ_AND_WRITE = 'x+';

    /**
     * 	Open the file for writing only.
     *  If the file does not exist, it is created.
     *  If it exists, it is neither truncated (as opposed to 'w'),
     *  nor the call to this function fails (as is the case with 'x').
     *  The file pointer is positioned on the beginning of the file.
     *  This may be useful if it's desired to get an advisory lock (see flock()) before attempting to modify the file,
     *  as using 'w' could truncate the file before the lock was obtained (if truncation is desired, ftruncate()
     *  can be used after the lock is requested).
     */
    const CREATE_WITHOUT_TRUNCATE_ON_WRITE = 'c';

    /**
     * Open the file for reading and writing; otherwise it has the same behavior as 'c'.
     */
    const CREATE_WITHOUT_TRUNCATE_ON_READ_AND_WRITE = 'c+';

    /**
     * device number
     */
    const DEV = 'dev';

    /**
     * inode number *
     */
    const INO = 'ino';

    /**
     * inode protection mode
     */
    const MODE = 'mode';

    /**
     * number of links
     */
    const LINK = 'nlink';

    /**
     * userid of owner *
     */
    const UID = 'uid';

    /**
     * groupid of owner *
     */
    const GID = 'gid';

    /**
     *  device type, if inode device
     */
    const RDEV = 'rdev';

    /**
     * size in bytes
     */
    const SIZE = 'size';

    /**
     * time of last access (Unix timestamp)
     */
    const ATIME = 'atime';

    /**
     * time of last modification (Unix timestamp)
     */
    const MTIME = 'mtime';

    /**
     * time of last inode change (Unix timestamp)
     */
    const CTIME = 'ctime';

    /**
     * blocksize of filesystem IO **
     */
    const BLOCK_SIZE = 'blksize';

    /**
     * number of 512-byte blocks allocated **
     */
    const BLOCKS = 'blocks';

    /**
     * index in $_FILES
     * to get uploaded file size
     */
    const FILE_SIZE = 'size';

    /**
     * index in $_FILES
     * to get uploaded file type
     */
    const FILE_TYPE = 'type';

    /**
     * index in $_FILES
     * to get uploaded filename
     */
    const FILE_NAME = 'name';

    /**
     * index in $_FILES
     * to get uploaded file tmp
     */
    const FILE_TMP = 'tmp_name';

    /**
     * index in $_FILES
     * to get uploaded file error
     */
    const FILE_ERROR = 'error';

    /**
     * to search all php file
     */
    const ALL_PHP = '*.php';

    /**
     * to search all css file
     */
    const ALL_CSS = '*.css';

    /**
     * to search all js file
     */
    const ALL_JS = '*.js';

    /**
     * to search all html file
     */
    const ALL_HTML = '*.html';

    /**
     * to search all png image
     */
    const ALL_PNG = '*.png';

    /**
     * to search all jpeg image
     */
    const ALL_JPEG = '*.jpeg';

    /**
     * to search all jpg image
     */
    const ALL_JPG = '*.jpg';

    /**
     * to search all svg image
     */
    const ALL_SVG = '*.svg';

    /**
     * to search all gif image
     */
    const ALL_GIF = '*.gif';


    /**
     * return files likes pattern
     *
     * @param $pattern
     * @param $flags
     * @return array
     */
    public static function search($pattern, $flags = null)
    {
        self::quitIfEmpty([$pattern],__FUNCTION__);

        $files = array();

        foreach (glob($pattern,$flags) as $file)
        {
            array_push($files,$file);
        }

        return $files;
    }

    /**
     * create a new file if not exist
     *
     * @param $filename
     * @return bool
     */
    public static function create($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (!self::exist($filename))
        {
            return touch($filename);
        }

        return false;
    }

    /**
     * delete a file if exist
     *
     * @param $filename
     * @return bool
     */
    public static function delete($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (is_dir($filename))
        {
            return self::deleteFolder($filename);
        }

        if (self::exist($filename))
        {
            return unlink($filename);
        }
        return false;
    }

    /**
     * delete a folder
     *
     * @param $folder
     * @return bool
     */
    public static function deleteFolder($folder)
    {
        if (!is_dir($folder))
        {
            return false;
        }

        $files = array_diff(scandir($folder), array('.','..'));

        foreach ($files as $file)
        {
            (is_dir("$folder/$file")) ? self::deleteFolder("$folder/$file") : unlink("$folder/$file");
        }

        return rmdir($folder);
    }

    /**
     * return all file lines
     *
     * @param $filename
     * @param $mode
     * @return array
     */
    public static function getLines($filename, $mode = File::READ)
    {
        self::quitIfEmpty([$filename,$mode],__FUNCTION__);

        if (self::verify($filename))
        {
            $file = self::open($filename,$mode);

            if ($file)
            {
                $lines = array();

                while (!self::isEnd($file))
                {
                    array_push($lines,fgets($file));
                }
                if (self::close($file))
                {
                    return $lines;
                } else {
                    self::quit('error on close file');
                }
            }
        }
        return array();
    }

    /**
     * return the file size
     *
     * @param $filename
     * @return int
     */
    public static function getSize($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return filesize($filename);
        }

        return 1;
    }

    /**
     * Returns the file extensions
     *
     * @param $filename
     * @return string
     */
    public static function getExtension($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return pathinfo($filename, PATHINFO_EXTENSION);
        }

        return null;
    }

    /**
     * copy a folder to destination
     *
     * @param $source
     * @param $destination
     */
    public static function copyFolder($source, $destination)
    {
        self::quitIfEmpty([$source,$destination],__FUNCTION__);

        if (!is_dir($destination))
        {
            mkdir($destination);
        }

        $dir_iterator = new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS);

        $iterator = new \RecursiveIteratorIterator($dir_iterator, \RecursiveIteratorIterator::SELF_FIRST);

        foreach($iterator as $element)
        {
            if($element->isDir())
            {
                mkdir($destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            } else {
                copy($element, $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            }
        }

    }

    /**
     * copy a file in an other file
     *
     * @param $source
     * @param $destination
     * @return bool
     */
    public static function copy($source, $destination)
    {
        self::quitIfEmpty([$source,$destination],__FUNCTION__);

        if (self::exist($source))
        {
            return copy ($source,$destination);
        }
        return false;
    }

    /**
     * test if a file or a folder is readable
     *
     * @param $filename
     * @return bool
     */
    public static function isReadable($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (is_dir($filename) && is_writable($filename))
        {
            $objects = scandir($filename);

            foreach ($objects as $object)
            {
                if ($object != "." && $object != "..")
                {
                    if (!self::isReadable($filename."/".$object))
                    {
                        return false;

                    } else {
                        continue;
                    }
                }
            }
            return true;
        }

        if (self::exist($filename))
        {
            return is_readable($filename);
        }
        return false;
    }

    /**
     * test if a file is writable
     *
     * @param $filename
     * @return bool
     */
    public static function isWritable($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (is_dir($filename))
        {
            return is_writable($filename);
        }

        if (self::exist($filename))
        {
            return is_writable($filename);
        }
        return false;
    }


    /**
     * create a hard link
     *
     * @param $target
     * @param $link
     * @return bool
     */
    public static function hardLink($target, $link)
    {
        self::quitIfEmpty([$target,$link],__FUNCTION__);

        if (self::exist($target))
        {
            return link($target, $link);
        }
        return false;
    }

    /**
     * create a symlink link
     *
     * @param $target
     * @param $link
     * @return bool
     */
    public static function symlink($target, $link)
    {
        self::quitIfEmpty([$target,$link],__FUNCTION__);

        if (self::exist($target))
        {
            return symlink($target, $link);
        }
        return false;
    }

    /**
     * test if filename is a symlink
     *
     * @param $filename
     * @return bool
     */
    public static function isLink($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);
        if (self::exist($filename))
        {
            return is_link($filename);
        }
        return false;
    }

    /**
     * return the mime of file
     *
     * @param $filename
     * @return string
     */
    public static function getMime($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return mime_content_type($filename);
        }

        return null;
    }

    /**
     * return the file's info
     *
     * @param $filename
     * @return array
     */
    public static function getStat($filename)
    {
        self::quitIfEmpty([$filename], __FUNCTION__);

        if (self::verify($filename)) {
            $stat = stat($filename);

            if ($stat) {
                return $stat;
            }
        }
        return array();
    }

    /**
     * return a part of stat by a key
     *
     * @param $filename
     * @param $key
     * @return mixed
     */
    public static function getStartKey($filename, $key)
    {
        self::quitIfEmpty([$filename,$key],__FUNCTION__);

        if (self::verify($filename))
        {
            $file = self::getStat($filename);
            return $file[$key];
        }
        return null;
    }

    /**
     * write data on a file
     *
     * @param $filename
     * @param $data
     * @param $mode
     * @return bool
     */
    public static function write($filename, $data, $mode)
    {
        self::quitIfEmpty([$filename,$data,$mode],__FUNCTION__);

        if (self::verify($filename))
        {
            $file = self::open($filename, $mode);
            fwrite($file, $data, strlen($data));
            return self::close($file);
        }
        return false;
    }

    /**
     * return true if filename is a file
     *
     * @param $filename
     * @return bool
     */
    public static function isFile($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);
        return is_file($filename);
    }

    /**
     * return true if filename is an image
     *
     * @param $filename
     * @return bool
     */
    public static function isImg($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);
        if (self::verify($filename))
        {
            return  in_array(self::getExtension($filename),File::IMG,true);
        }
        return false;
    }

    /**
     * test if filename is a html file
     *
     * @param $filename
     * @return bool
     */
    public static function isHtml($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);
        if (self::verify($filename))
        {
            return self::getExtension($filename) == File::HTML;
        }
        return false;
    }


    /**
     * test if filename is a php file
     *
     * @param $filename
     * @return bool
     */
    public static function isPhp($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return self::getExtension($filename) == File::PHP;
        }
        return false;
    }

    /**
     * test if filename is a js file
     *
     * @param $filename
     * @return bool
     */
    public static function isJS($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return self::getExtension($filename) == File::JS;
        }
        return false;
    }

    /**
     * test if filename is a json file
     *<
     * @param $filename
     * @return bool
     */
    public static function isJson($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return self::getExtension($filename) == File::JSON;
        }
        return false;
    }

    /**
     * test if filename is a xml file
     *
     * @param $filename
     * @return bool
     */
    public static function isXml($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);
        if (self::verify($filename))
        {
            return self::getExtension($filename) == File::XML;
        }
        return false;
    }

    /**
     * test if filename is a css file
     *
     * @param $filename
     * @return bool
     */
    public static function isCss($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return self::getExtension($filename) == File::CSS;
        }

        return false;
    }

    /**
     * test if filename is a pdf file
     *
     * @param $filename
     * @return bool
     */
    public static function isPdf($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return self::getExtension($filename) === File::PDF;
        }
        return false;
    }

    /**
     * test the end of file
     *
     * @param $file
     * @return bool
     */
    public static function isEnd($file)
    {
        self::quitIfEmpty([$file],__FUNCTION__);

        return feof($file);

    }

    /**
     * return the group of the file
     *
     * @param $filename
     * @return int
     */
    public static function getGroup($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return filegroup($filename);
        }

        return null;
    }

    /**
     * return the owner of the file
     *
     * @param $filename
     * @return int
     */
    public static function getOwner($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return fileowner($filename);
        }
        return null;
    }

    /**
     * Include in page all files passed by parameters
     */
    public static function loads()
    {
        if (self::isEmptyArgs())
        {
            self::quit("this function require file parameters");
        }

        foreach (func_get_args() as $file)
        {
            if (self::verify($file))
            {
                require_once "$file";

            } else {
                self::fileNotExist($file);
            }
        }
    }

    /**
     * return the content of a file
     *
     * @param $filename
     * @return string
     */
    public static function getContent($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        if (self::verify($filename))
        {
            return file_get_contents($filename);
        }
        return null;
    }

    /**
     * write data on a file
     *
     * @param $filename
     * @param $data
     * @param $flags
     * @return int
     */
    public static function putContents($filename, $data, $flags)
    {
        self::quitIfEmpty([$filename,$data,$flags],__FUNCTION__);

        if (self::verify($filename))
        {
            file_put_contents($filename,$data,$flags);
        }
        return null;
    }

    /**
     * return $_FILES
     *
     * @return array
     */
    public static function getFile()
    {
        return $_FILES;
    }

    /**
     * return the uploaded file type
     *
     * @param $name
     * @return string
     */
    public static function uploadedFileType($name)
    {
        self::quitIfEmpty([$name],__FUNCTION__);

        return $_FILES[$name][File::FILE_TYPE];
    }

    /**
     * return the uploaded file size
     *
     * @param $name
     * @return int
     */
    public static function uploadedFileSize($name)
    {
        self::quitIfEmpty([$name],__FUNCTION__);

        return $_FILES[$name][File::FILE_SIZE];
    }

    /**
     * return the uploaded file name
     *
     * @param $name
     * @return string
     */
    public static function uploadedFileName($name)
    {
        self::quitIfEmpty([$name],__FUNCTION__);

        return $_FILES[$name][File::FILE_NAME];
    }

    /**
     *  return the uploaded file tmp directory
     *
     * @param $name
     * @return string
     */
    public static function uploadedFileTmpPath($name)
    {
        self::quitIfEmpty([$name],__FUNCTION__);

        return $_FILES[$name][File::FILE_TMP];
    }

    /**
     * return the uploaded errors
     *
     * @param $name
     * @return int
     */
    public static function uploadedFileErrors($name)
    {
        self::quitIfEmpty([$name],__FUNCTION__);

        return $_FILES[$name][File::FILE_ERROR];
    }

    /**
     * change filename old on new
     *
     * @param $old
     * @param $new
     * @return bool
     */
    public static function rename($old, $new)
    {
        self::quitIfEmpty([$old,$new],__FUNCTION__);

        if (self::exist($old))
        {
            return rename($old,$new);
        }
        return false;
    }

    /**
     * move a uploaded file to destination
     *
     * @param $input_name
     * @param $destination
     * @return bool
     */
    public static function moveUploadedFile($input_name, $destination)
    {
        return move_uploaded_file(self::uploadedFileTmpPath($input_name),$destination);
    }

    /**
     * test if it's file exist and if it's a file
     *
     * @param $filename
     * @return bool
     */
    public static function verify($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        return self::isFile($filename) && self::exist($filename);
    }

    /**
     * verify if it's file exist
     *
     * @param $file
     * @return bool
     */
    public static function exist($file)
    {
        self::quitIfEmpty([$file],__FUNCTION__);

        return file_exists($file);
    }

    /**
     * exit the app with a message
     *
     * @param $function
     */
    private static  function nameIsEmpty($function)
    {
        die("Please enter the input name parameter on $function function");
    }

    /**
     * verify if file is empty
     *
     * @param $name
     * @return bool
     */
    private static function isEmpty($name)
    {
        return empty($name);
    }

    /**
     * open a file
     *
     * @param $filename
     * @param $mode
     * @return resource
     */
    public static function open($filename, $mode)
    {
        self::quitIfEmpty([$filename,$mode],__FUNCTION__);

        if (self::verify($filename))
        {
            return fopen($filename,$mode);
        }

        return null;
    }

    /**
     * test function parameters
     *
     * @return bool
     */
    public static function isEmptyArgs()
    {
        return func_get_args() === 0;
    }

    /**
     * quit app
     *
     * @param $name
     * @param $function
     */
    private static function quitIfEmpty(array $name, $function)
    {
        foreach ($name as $item)
        {
            if (self::isEmpty($item))
            {
                self::nameIsEmpty($function);
            }
        }

    }

    /**
     * quit app
     *
     * @param $filename
     */
    private static function fileNotExist($filename)
    {
        self::quitIfEmpty([$filename],__FUNCTION__);

        die("$filename does'nt exist ");
    }

    /**
     * quit app with a different message
     *
     * @param $message
     */
    private static function quit($message)
    {
        self::quitIfEmpty([$message],__FUNCTION__);
        die($message);
    }

    /**
     * close a file
     *
     * @param $file
     * @return bool
     */
    public static function close($file)
    {
        self::quitIfEmpty([$file],__FUNCTION__);

        return fclose($file);
    }

    /**
     * return absolute path
     *
     * @param $path
     * @return bool|string
     */
    public static function realPath($path)
    {
        self::quitIfEmpty([$path],__FUNCTION__);

        if (is_string($path))
        {
            return realpath($path);
        }

        return false;
    }

    /**
     * create folder
     *
     * @param $path
     * @param $permission
     * @return bool|string
     */
    public static function createFolder($path, $permission){
        if (!file_exists($path) && !is_dir($path)) {
            if (!mkdir("" . $path, (int) $permission, true)) {
                return false;
            }
        }
        return true;
    }

    /**
     * create folder
     *
     * @param $path
     * @return string
     */
    public static function getLastDirectoryFromPath($path){
        // logic to get last directory from path
        return $path;
    }

}
