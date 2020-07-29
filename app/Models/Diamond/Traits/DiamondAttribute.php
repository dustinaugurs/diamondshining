<?php

namespace App\Models\Diamond\Traits;

/**
 * Class DiamondAttribute.
 */
trait DiamondAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn"> {$this->getEditButtonAttribute("edit-diamond", "admin.diamonds.edit")}
                {$this->getDeleteButtonAttribute("delete-diamond", "admin.diamonds.destroy")}
                </div>';
    }
}
