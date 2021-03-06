<?php
namespace kevinquinnyo\Raid\Raid;

use Cake\I18n\Number;
use kevinquinnyo\Raid\AbstractRaid;
use kevinquinnyo\Raid\Drive;

class RaidSix extends AbstractRaid
{
    const LEVEL = 6;
    protected $drives = [];
    protected $hotSpares = [];
    protected $minimumDrives = 4;
    protected $mirrored = false;
    protected $parity = true;

    public function __construct($drives = [])
    {
        if (empty($drives) === false) {
            $this->validate($drives);
        }

        $this->drives = $drives;
    }

    public function getCapacity($options = [])
    {
        $options += [
            'human' => false,
        ];
        $total = $this->getTotalCapacity();
        $count = $this->getDriveCount(false);
        $result = $total === 0 ? $total : $total / 2;
        if ($options['human'] === true) {
            return Number::toReadableSize($result);
        }

        return $result;
    }
}
