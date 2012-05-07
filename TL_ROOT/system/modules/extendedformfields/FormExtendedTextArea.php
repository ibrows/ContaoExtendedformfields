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
 * @copyright  Leo Feyer 2005-2012
 * @author     Leo Feyer <http://www.contao.org>
 * @package    Frontend
 * @license    LGPL
 * @filesource
 */

class FormExtendedTextArea extends FormTextArea
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'form_extendedtextarea';

    /**
     * Generate the widget and return it as string
     * @return string
     */
    public function generate()
    {
        global $objPage;
        $arrStrip = array();

        // XHTML does not support maxlength
        if ($objPage->outputFormat == 'xhtml')
        {
            $arrStrip[] = 'maxlength';
        }

        // get template
        $strTemplate = $this->extendedtextareaTpl ? $this->extendedtextareaTpl : 'extendedtextarea_default';

        // template
        $objTemplate = new FrontendTemplate($strTemplate);

        // add values to the template
        $objTemplate->id = 'ctrl_' . $this->strId;
        $objTemplate->class = $this->strClass;
        $objTemplate->name = $this->strName;
        $objTemplate->value = $this->varValue;
        $objTemplate->label = $this->strLabel;
        $objTemplate->required = $this->required;
        $objTemplate->attributes = $this->getAttributes($arrStrip);
        $objTemplate->intRows = $this->intRows;
        $objTemplate->intCols = $this->intCols;

        // return rendered widget
        return $objTemplate->parse();
    }

    /**
     * Generate the label and return it as string
     * @return string
     */
    public function generateLabel()
    {
        return;
    }
}