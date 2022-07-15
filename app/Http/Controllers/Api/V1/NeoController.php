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
     *     summary="all dangerous asteroids, they may not have been in the last three days",
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
     *     summary="dangerous, not dangerous, fastest first",
     *     @OA\Parameter(
     *         name="hazardous",
     *         in="query",
     *         description="hazardous: true | false",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             default=false,
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="reflects dangerous or non-dangerous asteroids, always the fastest first"
     *     ),
     * )
     */
    public function fastest(Request $request)
    {
        return response($this->iasteroid->getFastest($request->get(Iasteroid::KEY_HAZARDOUS)));
    }
}
