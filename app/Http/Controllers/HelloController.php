<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index()
    {
        $html = <<<HTML
        <html>
            <head>
                <title>Hello</title>
            </head>
            <body>
                <h1>Hello, World! x 2</h1>
                <p>This is a simple Laravel route example.</p>
            </body>
        </html>
        HTML;

        return new Response($html, 200, ['Content-Type' => 'text/html']);
    }
}
