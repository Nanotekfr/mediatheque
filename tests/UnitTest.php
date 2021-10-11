<?php

namespace App\Tests;

use App\Entity\Adherent;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    public function testAdherent(): void
    {
      $adherent = new Adherent();
      $adherent->setLastName('Titi');
      $this->assertTrue($adherent->getLastName()=== 'Titi');
    }
}
