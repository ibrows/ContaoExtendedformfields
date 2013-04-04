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

class FormExtendedSelectMenu extends FormSelectMenu
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'form_extendedselectmenu';

    /**
     * Generate the widget and return it as string
     * @return string
     */
    public function generate()
    {
        // class
        $strClass = 'select';

        // is multiple
        if ($this->multiple)
        {
            $this->strName .= '[]';

            // replace class
            $strClass = 'multiselect';
        }

        // Make sure there are no multiple options in single mode
        elseif (is_array($this->varValue))
        {
            $this->varValue = $this->varValue[0];
        }

        // Add empty option (XHTML) if there are none
        if (empty($this->arrOptions))
        {
            $this->arrOptions = array(array('value'=>'', 'label'=>'-'));
        }

        // Chosen
        if ($this->chosen)
        {
            $strClass .= ' tl_chosen';
        }

        // get template
        $strTemplate = $this->extendedselectmenuTpl ? $this->extendedselectmenuTpl : 'extendedselectmenu_default';

        // options
        $arrOptions = $this->_prepareOptions($this->arrOptions);

        // template
        $objTemplate = new FrontendTemplate($strTemplate);

        // add values to the template
        $objTemplate->id = 'ctrl_' . $this->strId;
        $objTemplate->class = $strClass . ' ' . $this->strClass;
        $objTemplate->name = $this->strName;
        $objTemplate->label = $this->label;
        $objTemplate->attributes = $this->getAttributes();
        $objTemplate->options = $arrOptions;
        $objTemplate->optionscount = count($arrOptions);

        // return rendered widget
        return $objTemplate->parse();
    }

    /**
     * @param array $arrRawOptions
     * @return array
     */
    protected function _prepareOptions($arrRawOptions)
    {
        // empty option array
        $arrOptions = array();

        // foreach option add prepared to the option array
        foreach($arrRawOptions as $intKey => $arrOption)
        {
            $arrOptions[$intKey] = array
            (
                'isgroup' => isset($arrOption['group']) && $arrOption['group'] ? true : false,
                'value' => $arrOption['value'],
                'selected' => $this->isSelected($arrOption),
                'label' => $arrOption['label'],
            );
        }
        // return options array
        return($arrOptions);
    }
}