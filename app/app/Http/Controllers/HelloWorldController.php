<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    /**
     * @OA\Get(
     *      tags={"Hello world!"},
     *      path="/api/hello_world",
     *      summary="Summary",
     *      description="Description",
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="Message",
     *                  type="string",
     *                  example="Hello world!",
     *              ),
     *          ),
     *      ),
     * )
     *
     * {
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ["Message" => "Hello world!"];
    }
}
