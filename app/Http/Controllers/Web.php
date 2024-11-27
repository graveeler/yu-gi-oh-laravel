<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardBanlist;
use App\Models\CardFormat;
use App\Models\CardImage;
use App\Models\CardPrice;
use App\Models\CardSet;
use App\Models\User;
use Illuminate\Http\Request;

class Web extends Controller
{
    function home(Request $request)
    {
        //dd($request->all());

      /*  if ($request->all()) {
            echo 'existe request';

            dd($request->all());
            return;
        }*/

        $cards = '';

        unset($request->_token);
        unset($_GET['_token']);

    if(!empty($request['search'])){
        $cards = Card::whereAny(['name', 'name_pt_br', 'description', 'description_pt_br', 'frameType', 'archetype'],
            'like',
            "%{$request['search']}%")->orderBy('name', 'asc')->paginate(10)->appends($request->except('_token'));
    }else{
        $cards = Card::orderBy('name', 'asc')->paginate(10);
    }

        return view('home', [
            'user' => User::first(),
            'cards' => $cards
            /* 'cardImage' => CardImage::first(),
             'cardBanlist' => CardBanlist::first(),
             'cardFormat' => CardFormat::first(),
             'cardPrice' => CardPrice::first(),
             'cardSet' => CardSet::first()*/
        ]);
    }
}

