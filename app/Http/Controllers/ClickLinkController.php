<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\ClickLink;
use Illuminate\Http\Request;

class ClickLinkController extends Controller
{
    public function click($code)
    {
        $link = Link::where('code', $code)->first();

        ClickLink::create([
            'link_id'=> $link->id,
            'ip'=> request()->ip(),
            'clicked'=> now(),
        ]);
        $link->click += 1;
        $link->save();
        return redirect($link->url);
    }
}
