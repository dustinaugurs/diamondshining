<?php

namespace App\Models\DiamondTemplates\Traits;

/**
 * Class DiamondTemplateAttribute.
 */
trait DiamondTemplateAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


   
      /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->isActive()) {
            return "<label class='label label-success'>Active</label>";
        }

        return "<label class='label label-danger'>Inactive</label>";
    }

     /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.$this->getEditButtonAttribute("edit-diamondtemplate", "admin.diamondtemplates.edit").''.$this->getDeleteButtonAttribute("delete-diamondtemplate", "admin.diamondtemplates.destroy").'</div>';
    }

    public function isActive()
    {
        return $this->is_term_accept == 1;
    }
}
