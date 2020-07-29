<?php

namespace App\Http\Responses\Backend\DiamondTemplates;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */   
    protected $diamondFeeds;

    public function __construct($diamondFeeds)
    {
        $this->diamondFeeds = $diamondFeeds;
    }
    public function toResponse($request)
    {
        
        return view('backend.diamondtemplates.create')->with(['diamondFeeds' =>$this->diamondFeeds]);
    }
}