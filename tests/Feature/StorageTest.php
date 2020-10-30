<?php

namespace Tests\Feature;

use App\Models\AmazonStorage;
use App\Models\FileStorage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StorageTest extends TestCase
{
    /**
     * TEST FILE STORAGE
     *
     * @return void
     */
    public function testFileStorage()
    {
        Storage::fake('local');

        $response = FileStorage::put('zzz.txt', time());

        Storage::disk('local')->assertExists('zzz.txt');

        Storage::disk('local')->assertMissing('404.txt');
    }

    /**
     * TEST AMAZON STORAGE
     *
     * @return void
     */
    public function testAmazonStorage()
    {
        Storage::fake('s3');

        $response = AmazonStorage::put('zzz.txt', time());

        Storage::disk('s3')->assertExists('zzz.txt');

        Storage::disk('s3')->assertMissing('404.txt');
    }
}
