<?php

declare(strict_types=1);

namespace  Marktic\Cms\Bundle\Modules\Admin\Forms\Sites;

use Marktic\Cms\Bundle\Library\Form\FormModel;
use Marktic\Cms\Sites\Models\Site;
use Marktic\Cms\SitesRoles\Actions\GetSiteRoles;
use Marktic\Cms\SitesRoles\Dto\SiteRole;
use Marktic\Cms\SitesRoles\Dto\SiteRolesCollection;
use Marktic\Cms\Utility\CmsModels;
use Nip_Form_Element_Select;

/**
 * @method Site getModel()
 */
class DetailsForm extends FormModel
{
    /**
     * @var SiteRolesCollection|SiteRole[]
     */
    protected SiteRolesCollection $roles;

    public function initialize()
    {
        parent::initialize();

        $this->setAttrib('id', 'mkt-cms-sites-form');

        $this->initializeName();
        $this->initializeRole();

        $this->addButton('save', translator()->trans('submit'));
    }

    protected function initializeName(): void
    {
        $this->addInput('name', translator()->trans('name'), true);
    }

    protected function initializeRole(): void
    {
        $this->roles = GetSiteRoles::available();

        $this->addSelect('role', CmsModels::sites()->getLabel('role'), true);
        /** @var Nip_Form_Element_Select $element */
        $element = $this->getElement('role');
        foreach ($this->roles as $role) {
            $element->addOption($role->getName(), $role->getLabel());
        }
    }

    protected function getDataFromModel(): void
    {
        parent::getDataFromModel();

        $role = $this->getModel()->getMetadata()->getRole();
        $this->getElement('role')->setValue($role);
    }

    public function saveToModel(): void
    {
        parent::saveToModel();

        $role = $this->getElement('role')->getValue();
        $this->getModel()->getMetadata()->setRole($role);
    }
}
