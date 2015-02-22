<?php

namespace Vaffel\Tuski\Interfaces;

interface DataServiceInterface
{
    public function setStorageProvider(StorageProviderInterface $storageProvider);

    public function getStorageProvider();

    public function getFileInfo($resourceId);

    public function getOffset($resourceId);

    public function getLength($resourceId);

    public function createFile($resourceId, $length);
}