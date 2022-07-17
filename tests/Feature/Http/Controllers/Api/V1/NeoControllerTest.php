<?php

declare(strict_types=1);

namespace Http\Controllers\Api\V1;

use Tests\TestCase;

class NeoControllerTest extends TestCase
{
    public function testHazardous(): void
    {
        $response = $this->get('/api/v1/hazardous');
        $response->assertStatus(200);
    }

    public function testFastest(): void
    {
        $response = $this->get('/api/v1/fastest');
        $response->assertStatus(200);
        $response = $this->get('/api/v1/fastest?hazardous=232');
        $response->assertStatus(500);
        $response = $this->get('/api/v1/fastest?hazardous=true');
        $response->assertStatus(200);
        $response = $this->get('/api/v1/fastest?hazardous=false');
        $response->assertStatus(200);
    }

}
