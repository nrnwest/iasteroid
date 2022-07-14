<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\Iasteroid;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NeoController extends Controller
{
    private Iasteroid $iasteroid;

    public function __construct(Iasteroid $iasteroid)
    {
        $this->iasteroid = $iasteroid;
    }

    /**
     * @OA\Get(
     *     path="/api/v1/hazardous",
     *     operationId="hazardous",
     *     tags={"Asteroids"},
     *     summary="Asteroids - NeoWs hazardous",
     *
     * @OA\Response(
     *         response="200",
     *         description="Asteroid hazardous "
     *     ),
     * )
     */
    public function hazardous(): Response
    {
        return response($this->iasteroid->getHazardousAsteroids());
    }

    /**
     * @OA\Get(
     *     path="/api/v1/fastest",
     *     operationId="fastest",
     *     tags={"Asteroids"},
     *     summary="asteroid speed",
     *     @OA\Parameter(
     *         name="hazardous",
     *         in="query",
     *         description="hazardous: true | false",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="the fastest and most dangerous asteroids in three days"
     *     ),
     * )
     */
    public function fastest(Request $request)
    {
        return response($this->iasteroid->getFastest($request->get(Iasteroid::KEY_HAZARDOUS)));
    }
}
