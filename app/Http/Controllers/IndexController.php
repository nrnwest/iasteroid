<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Iasteroid;
use Illuminate\Http\Response;

class IndexController extends Controller
{
    private Iasteroid $iasteroid;

    public function __construct(Iasteroid $iasteroid)
    {
        $this->iasteroid = $iasteroid;
    }

    /**
     * @OA\Get(
     *     path="/",
     *     operationId="index",
     *     tags={"Inernature"},
     *     summary="Back-End PHP Intern",
     *
     * @OA\Response(
     *         response="200",
     *         description="Back-End PHP Intern MacPaw 2022"
     *     ),
     * )
     */
    public function index(): Response
    {
        return response($this->iasteroid->getHi());
    }

}
