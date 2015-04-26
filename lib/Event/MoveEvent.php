<?php

/*
 * This file is part of the Sulu CMS.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Component\DocumentManager\Event;

use Symfony\Component\EventDispatcher\Event;

class MoveEvent extends Event
{
    /**
     * @var object
     */
    private $document;

    /**
     * @var string
     */
    private $destId;

    /**
     * @param object $document
     */
    public function __construct($document, $destId)
    {
        $this->document = $document;
        $this->destId = $destId;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function getDestId()
    {
        return $this->destId;
    }

    public function setDestName($name)
    {
        $this->destName = $name;
    }

    public function getDestName()
    {
        if (!$this->destName) {
            throw new \RuntimeException(sprintf(
                'No destName set in copy/move event when copying/moving document "%s" to "%s" . This should have been set by a listener',
                spl_object_hash($this->document),
                $this->destId
            ));
        }

        return $this->destName;
    }
}