<?php

namespace Simtabi\Pheg\Phegs\Helpers\File;

class DirectoryInfo
{

    public static function getAll($path){

        ## - @author http://stackoverflow.com/questions/7497733/how-can-use-php-to-check-if-a-directory-is-empty
        $iterate = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST,
            \RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
        );

        $paths = array($path);
        foreach ($iterate as $this_path => $dir) {
            if ($dir->isDir()) {
                $paths[] = $this_path;
            }
        }

        ## - Return found paths
        return $paths;
    }

    public static function getFilesInDirectory($path = null, $extension = null){

        $errors = null;
        $files = array();

        try{

            // validate path
            if (empty($path) || ((!is_string($path))) || (!file_exists($path))){
                throw new CatchThis(Translator::_e('FILE_DIRECTORY_NOT_SET'));
            }

            // validate extension
            $extensions = array();
            if (!empty($extension)){
                if (is_array($extension)){
                    foreach ($extension as $i => $e)
                    {
                        $extensions[] = str_replace('.', '', $e);
                    }
                }else{
                    if (is_string($extension)){
                        $extensions[] = str_replace('.', '', $extension);
                    }
                }
            }

            // if extensions are empty
            if (empty($extensions)){
                throw new CatchThis(Translator::_e('FILE_EXTENSION_NOT_SET'));
            }


            // loop through
            $directoryIterator = new \DirectoryIterator($path);
            foreach ($directoryIterator as $fileInfo)
            {
                // skip directories
                if (!$fileInfo->isDot())
                {
                    // loop through given extensions
                    foreach ($extensions as $r => $ext)
                    {
                        if ($fileInfo->getExtension() == $ext)
                        {
                            // if file extension is met
                            $files[] = array(
                                'name' => $fileInfo->getBasename(),
                                'file' => $fileInfo->getPathname(),
                                'type' => $fileInfo->getExtension(),
                            );
                        }
                    }

                }
            }

            // if no file was found
            if (empty(Fabiano::filterArray($files))){
                throw new CatchThis(Translator::_e('FILE_NOT_FOUND'));
            }

        }catch (CatchThis $e){
            $errors = $e->getMessage();
        }

        echo Paste::r($files);

        return DataType::toObject(array(
            'errors' => $errors,
            'files'  => array(
                'list'  => $files,
                'one'   => $files[array_rand($files)], // randomize file output
            ),

        ));
    }

    public static function copyFolder($src, $dst) {
        $clone = false;
        $dir   = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {

                if ( is_dir($src . '/' . $file) ) {

                    if(self::copyFolder($src . '/' . $file,$dst . '/' . $file)){
                        $clone = true;
                    }

                } else {

                    if(copy($src . '/' . $file,$dst . '/' . $file)){
                        $clone = true;
                    }

                }

            }
        }
        closedir($dir);

        if(!$clone){
            return false;
        }else
            return true;
    }

    public static function deleteFolder($path){
        if (is_dir($path) === true) {
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::CHILD_FIRST);

            foreach ($files as $file) {
                if (in_array($file->getBasename(), array('.', '..')) !== true) {
                    if ($file->isDir() === true) {
                        rmdir($file->getPathName());
                    } else if (($file->isFile() === true) || ($file->isLink() === true)) {
                        unlink($file->getPathname());
                    }
                }
            }

            return rmdir($path);
        } else if ((is_file($path) === true) || (is_link($path) === true)) {
            return unlink($path);
        }

        return false;
    }


    public static function getFile($filePath, $path = true, $site = true, $getUrl = true){
        // check if file exists
        $filePath = str_replace('/', DS, Asset::uploadLocation($path, $site) . $filePath);
        if(file_exists($filePath) && is_readable($filePath)){
            $filePath = (!$path ? str_replace('\\', '/', $filePath) : $filePath);
            return true === $getUrl && false === $path ? Console::baseURL() . $filePath : $filePath;
        }
        return false;
    }
}
