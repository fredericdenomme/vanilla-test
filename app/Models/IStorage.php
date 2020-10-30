<?php

namespace App\Models;

interface IStorage
{
    /***
     * RETURNS FALSE OR CONTENTS
     */
    static public function get($name);
	
    /***
     * RETURNS FALSE OR TRUE
     */
	static public function put($name, $contents);
}
