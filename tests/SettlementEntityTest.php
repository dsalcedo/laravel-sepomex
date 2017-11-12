<?php

namespace Aftab\Sepomex\Tests;

use Aftab\Sepomex\Entities\City;
use Aftab\Sepomex\Entities\State;
use Aftab\Sepomex\Entities\District;
use Aftab\Sepomex\Entities\Location;
use Aftab\Sepomex\Entities\Settlement;

/**
 * Class SettlementEntityTest
 * @package Aftab\Sepomex\Tests
 */
class SettlementEntityTest extends TestCase
{
    /** @test */
    public function entity_settlement_setters_and_getters()
    {
        $state = new State(9, 'Ciudad de México');
        $city = new City(11, 'Ciudad de México');
        $district = new District(16, 'Miguel Hidalgo');
        $location = new Location('Colonia', 'Miguel Hidalgo');
        $settlement = new Settlement();

        $settlement->setPostal('11590');
        $settlement->setState($state);
        $settlement->setCity($city);
        $settlement->setDistrict($district);
        $settlement->setLocation($location);

        $this->assertEquals($city, $settlement->getCity());
        $this->assertEquals($district, $settlement->getDistrict());
        $this->assertEquals($location, $settlement->getLocation());
        $this->assertEquals($state, $settlement->getState());
    }

    /** @test */
    public function entity_settlement_to_array()
    {
        $state = new State(9, 'Ciudad de México');
        $city = new City(11, 'Ciudad de México');
        $district = new District(16, 'Miguel Hidalgo');
        $location = new Location('Colonia', 'Miguel Hidalgo');
        $settlement = new Settlement();

        $settlement->setPostal('11590');
        $settlement->setState($state);
        $settlement->setCity($city);
        $settlement->setDistrict($district);
        $settlement->setLocation($location);

        $arr = $settlement->toArray();

        $this->assertArrayHasKey('state', $arr);
        $this->assertArrayHasKey('city', $arr);
        $this->assertArrayHasKey('district', $arr);
        $this->assertArrayHasKey('location', $arr);
    }
}
