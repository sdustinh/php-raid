<?php
namespace kevinquinnyo\Raid\Test;

use \PHPUnit\Framework\TestCase;
use \kevinquinnyo\Raid\Drive;

class DriveTest extends TestCase
{
    public function testGetCapacity()
    {
        $drive = new Drive(1024, 'ssd');
        $this->assertSame(1024, $drive->getCapacity());
    }

    public function testGetType()
    {
        $drive = new Drive(1024, 'ssd');
        $this->assertSame('ssd', $drive->getType());
    }
}