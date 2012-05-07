<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  iBROWS GmbH 2012
 * @author     Dominik Zogg <dominik.zogg@ibrows.ch>
 * @license    LGPLv3
 */

class FormExtendedSubmit extends FormSubmit
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'form_extendedsubmit';

    /**
     * Generate the widget and return it as string
     * @return string
     */
    public function generate()
    {
        // get template
        $strTemplate = $this->extendedsubmitTpl ? $this->extendedsubmitTpl : 'extendedsubmit_default';

        // template
        $objTemplate = new FrontendTemplate($strTemplate);

        // add values to the template
        $objTemplate->id = 'ctrl_' . $this->strId;
        $objTemplate->class = 'submit ' . (strlen($this->strClass) ? ' ' . $this->strClass : '');
        $objTemplate->type = $this->imageSubmit && is_file(TL_ROOT . '/' . $this->singleSRC) ? 'image' : 'submit';
        $objTemplate->src = $this->imageSubmit && is_file(TL_ROOT . '/' . $this->singleSRC) ? TL_ROOT . '/' . $this->singleSRC : '';
        $objTemplate->title = specialchars($this->slabel);
        $objTemplate->alt = specialchars($this->slabel);
        $objTemplate->attributes = $this->getAttributes();


        $objTemplate->value = $this->varValue;
        $objTemplate->label = $this->strLabel;
        $objTemplate->required = $this->required;
        $objTemplate->attributes = $this->getAttributes();

        // return rendered widget
        return $objTemplate->parse();
    }
}