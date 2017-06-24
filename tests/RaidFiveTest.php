<?php
namespace kevinquinnyo\Raid\Test;

use \PHPUnit\Framework\TestCase;
use \kevinquinnyo\Raid\Drive;
use \kevinquinnyo\Raid\Raid\RaidFive;

class RaidFiveTest extends TestCase
{
    public function testGetCapacity()
    {
        $drives = [
            new Drive(1024, 'ssd'),
            new Drive(1024, 'ssd'),
            new Drive(1024, 'ssd'),
        ];
        $raidFive = new RaidFive($drives);
        $this->assertSame(2048, $raidFive->getCapacity());
    }
    public function testGetCapacityWithHotSpares()
    {
        $drives = [
            new Drive(1024, 'ssd'),
            new Drive(1024, 'ssd'),
            new Drive(1024, 'ssd'),
            new Drive(1024, 'ssd', true),
            new Drive(1024, 'ssd', true),
        ];
        $raidFive = new RaidFive($drives);
        $this->assertSame(2048, $raidFive->getCapacity());
    }
}