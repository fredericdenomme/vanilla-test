<?php

namespace App\Models;

use App\Models\IStorage;
use Aws\S3\Exception\S3Exception;
use Illuminate\Support\Facades\Storage;

class AmazonStorage implements IStorage {

    const DISK = 's3';

    static public function get($name)
    {
        $exists = Storage::disk(self::DISK)->exists($name);
        if (!$exists) {
            return false;
        }
        return Storage::disk(self::DISK)->get($name);
    }

    static public function put($name, $contents)
    {
        try {
            Storage::disk(self::DISK)->put($name, $contents);
        } catch (S3Exception $e) {
            return false;
        }
        return true;
    }
}
