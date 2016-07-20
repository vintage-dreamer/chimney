<?php

/*
 * This file is part of Plista Chimney.
 *
 * (c) plista GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plista\Chimney\Test\Unit\Command\Make;

use Plista\Chimney\Command\Make\OutputMessage;

/**
 *
 */
class OutputMessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OutputMessage
     */
    private $message;

    /**
     * @var string
     */
    private $hrSingle;

    /**
     * @var string
     */
    private $hrDouble;

    protected function setUp() {
        $this->message = new OutputMessage();
        $this->hrSingle = OutputMessage::HR_SINGLE;
        $this->hrDouble = OutputMessage::HR_DOUBLE;
    }

    /**
     * @test
     */
    public function appendChangelogInfo() {
        $this->message->appendChangelogInfo('myChangelogAddon', 'myChangelogPath');
        $this->assertEquals(<<<EOT

<info>{$this->hrDouble}
Generated changelog:
{$this->hrDouble}</info>
myChangelogAddon
<comment>{$this->hrSingle}
The changelog was added to myChangelogPath. You don't need to edit it manually.
{$this->hrDouble}</comment>

EOT
            ,
            $this->message->get()
        );
    }
}