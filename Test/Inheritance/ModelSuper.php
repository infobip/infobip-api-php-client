<?php

namespace Infobip\Test\Inheritance;

use Infobip\SerializationCandidates;

#[SerializationCandidates([
    "\Infobip\Test\Inheritance\ModelChild1",
    "\Infobip\Test\Inheritance\ModelChild2",
])]
interface ModelSuper
{
}
