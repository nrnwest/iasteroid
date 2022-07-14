<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class IndexControllerTest extends TestCase
{


    /**
     * @dataProvider dataValueJson
     */
    public function testIndex($name, $valueName): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertJsonPath($name, $valueName);
    }

    public function dataValueJson()
    {
        $name = 'hello';
        $valueName = 'MacPaw Internship 2022!';
        return [[$name, $valueName]];
    }

}
