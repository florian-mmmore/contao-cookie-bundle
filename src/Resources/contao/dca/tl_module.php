<?php

declare(strict_types=1);

/*
 * This file is part of the Dreibein-Cookie-Bundle.
 *
 * (c) Werbeagentur Dreibein GmbH
 *
 * @license LGPL-3.0-or-later
 */

$table = 'tl_module';

$GLOBALS['TL_DCA'][$table]['palettes']['cookie'] = '{title_legend},name,headline,type,cookieText;{cookie_legend},cookieImprint,cookieDataProtection,cookieCss;{template_legend:hide}customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';

$GLOBALS['TL_DCA'][$table]['fields']['cookieText'] = [
    'label' => &$GLOBALS['TL_LANG'][$table]['cookieText'],
    'exclude' => true,
    'inputType' => 'textarea',
    'eval' => ['mandatory' => true, 'rte' => 'tinyMCE', 'tl_class' => 'clr'],
    'sql' => ['type' => 'text', 'notnull' => false],
];

$GLOBALS['TL_DCA'][$table]['fields']['cookieImprint'] = [
    'label' => &$GLOBALS['TL_LANG'][$table]['cookieImprint'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => ['fieldType' => 'radio', 'tl_class' => 'clr', 'multiple' => false],
    'sql' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'notnull' => true, 'default' => 0],
];

$GLOBALS['TL_DCA'][$table]['fields']['cookieDataProtection'] = [
    'label' => &$GLOBALS['TL_LANG'][$table]['cookieDataProtection'],
    'exclude' => true,
    'inputType' => 'pageTree',
    'eval' => ['fieldType' => 'radio', 'tl_class' => 'clr', 'multiple' => false],
    'sql' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'notnull' => true, 'default' => 0],
];
