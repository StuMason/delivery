<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    private const POST_CODE_REGEX = '([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9][A-Za-z]?))))\s?[0-9][A-Za-z]{2})';

    /** @var array */
    private $validPostCode = [
        'post_code' => 'required|starts_with:CT19,CT20|regex:/'.self::POST_CODE_REGEX.'/i',
    ];

    /**
     * Search the restuants to match postcode - currently CT19/CT20 only.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Restaurant   $restaurant
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect(Request $request)
    {
        return redirect('/');
    }

    /**
     * Search the restuants to match postcode - currently CT19/CT20 only.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this->validate($request, $this->validPostCode);
    }
}
