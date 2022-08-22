<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;

class FileUploader
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param string $uploadDir
     * @param File $file
     * @param string $filename
     */
    public function upload(string $uploadDir, File $file, string $filename)
    {
        try {
            $file->move($uploadDir, $filename);
        } catch (FileException $e){

            $this->logger->error('Failed to upload file: ' . $e->getMessage());
            throw new FileException('Failed to upload file');
        }
    }
}
