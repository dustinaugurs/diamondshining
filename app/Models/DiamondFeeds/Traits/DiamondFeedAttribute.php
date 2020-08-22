<?php

namespace App\Models\DiamondFeeds\Traits;

/**
 * Class DiamondFeedAttribute.
 */
trait DiamondFeedAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     * '.$this->getEditButtonAttribute("edit-diamondfeed", "admin.diamondfeeds.edit").'
     */
    //'.$this->getDeleteButtonAttribute("delete-diamondfeed", "admin.diamondfeeds.destroy").'
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">                 
                '.$this->getDeleteButtonAttribute("delete-diamondfeed", "admin.diamondfeeds.destroy").'
                '.$this->getEditButtonAttribute("edit-diamondfeed", "admin.diamondfeeds.edit").'
                </div>';
    }
}
