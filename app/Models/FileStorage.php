<?php

namespace App\Models;

use App\Models\IStorage;
use Exception;
use Illuminate\Support\Facades\Storage;

class FileStorage implements IStorage {

    const DISK = 'local';

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
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}
