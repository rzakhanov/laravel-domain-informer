<?php

namespace Rzakhanov\DomainInformer\Http\Controllers;


use Illuminate\Http\Request;

class DomainCheckController
{

    public function show()
    {
        return view('domainInformer::view');
    }


    public function check(Request $request)
    {
        $domain = $request->post('domain');
        $errors = [];
        $data = [];

        if (!preg_match('/https?:\/\/([A-Z0-9-.\/]+)/i', $domain)) {
            $errors = ['Domain format is not valid !'];
        } else {

            $domain = preg_replace('/https?:\/\//i', null, $request->post('domain'));

            $data['IP'] = gethostbyname($domain);

            @file_get_contents($request->post('domain'), false);

            $data = $data + $http_response_header;

        }

        return view('domainInformer::view', compact('data', 'errors'));
    }
}
