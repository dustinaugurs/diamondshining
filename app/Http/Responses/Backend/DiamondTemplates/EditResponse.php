<?php

namespace App\Http\Responses\Backend\DiamondTemplates;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\DiamondTemplates\DiamondTemplate
     */
    protected $diamondtemplates;

    /**
     * @param App\Models\DiamondTemplates\DiamondTemplate $diamondtemplates
     */
    public function __construct($diamondtemplates)
    {
        $this->diamondtemplates = $diamondtemplates;
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
        return view('backend.diamondtemplates.edit')->with([
            'diamondtemplate' => $this->diamondtemplates
        ]);
    }
}