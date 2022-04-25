<?php

namespace Test;

use App\handle;
use PHPUnit\Framework\TestCase;

class HandleTest extends TestCase
{

    public function testCreate()
    {
        $path = './tmp';
        $handle = new handle();
        $output = $handle->create($path);
        $this->assertEquals(true, $output);

        $path = '/wrong_path';
        $output = $handle->create($path);
        $this->assertEquals(false, $output);
    }

    public function testRestore()
    {
        $path = './tmp';
        $handle = new handle();
        $output = $handle->restore($path);
        $this->assertEquals(true, $output);

        $path = '/wrong_path';
        $output = $handle->restore($path);
        $this->assertEquals(false, $output);
    }

}