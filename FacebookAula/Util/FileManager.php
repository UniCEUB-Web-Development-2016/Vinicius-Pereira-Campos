<?php
class FileManager {
public function __construct()
{
    $this->fileManager = new FileManager();
}

    public function write($fileName, $text) {
    $file = fopen($fileName, "w");
    fwrite($fileName, $text);
    fclose($fileName);
}
}