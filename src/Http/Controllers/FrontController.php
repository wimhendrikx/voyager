<?php

namespace TCG\Voyager\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{
    protected function verifyUrl(Request $request, string $url, bool $alsoMatchQuerystring = false)
    {
        $requestUrl = $request->getUri();

        // Remove query string if we dont' need to match it
        if (!$alsoMatchQuerystring && strpos($requestUrl, '?') !== false) {
            $requestUrl = $request->getUriForPath($request->getPathInfo());
        }

        return $url === $requestUrl;
    }
}
