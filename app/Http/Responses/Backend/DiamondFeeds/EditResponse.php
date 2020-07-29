<?php

namespace App\Http\Responses\Backend\DiamondFeeds;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\DiamondFeeds\DiamondFeed
     */
    protected $diamondfeeds;

    /**
     * @param App\Models\DiamondFeeds\DiamondFeed $diamondfeeds
     */
    public function __construct($diamondfeeds)
    {
        $this->diamondfeeds = $diamondfeeds;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.diamondfeeds.edit')->with([
            'diamondfeeds' => $this->diamondfeeds
        ]);
    }
}