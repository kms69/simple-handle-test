<?php

namespace App;

class handle
{

    const FILE_NAME = "backup.txt";

    /**
     * @param string $path
     * @return bool
     */
    public function create(string $path): bool
    {
        $currentDateTime = date('l jS \of F Y h:i:s A');
        $fileFullPath = $this->getFileFullPath($path);
        // delete the previous file if already exist
        if (file_exists($fileFullPath)) {
            unlink($fileFullPath);
        }
        try {
            $fileHandler = fopen($fileFullPath, 'w');
        } catch (\Exception $e) {
            echo "file couldn't be created.";

            return false;
        }

        $info = sprintf("IP: %s ; currentDateTime: %s \n", getHostByName(getHostName()), $currentDateTime);
        fwrite($fileHandler, $info);
        fclose($fileHandler);

        return true;
    }

    /**
     * @param string $path
     * @return bool
     */
    public function restore(string $path): bool
    {
        $fileFullPath = $this->getFileFullPath($path);
        try {
            $fileHandler = fopen($fileFullPath, 'r');
        } catch (\Exception $e) {
            echo "file couldn't be opened.";

            return false;
        }
        while (!feof($fileHandler)) {
            $result = fgets($fileHandler);
            echo $result;
        }
        fclose($fileHandler);

        return true;
    }

    /**
     * @param string $path
     * @return string
     */
    private function getFileFullPath(string $path): string
    {
        return $path . '/' . self::FILE_NAME;
    }
}
