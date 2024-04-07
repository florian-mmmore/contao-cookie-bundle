<?php

declare(strict_types=1);

/*
 * This file is part of the Dreibein-Cookie-Bundle.
 *
 * (c) Werbeagentur Dreibein GmbH
 *
 * @license LGPL-3.0-or-later
 */

use Dreibein\CookieBundle\Module\CookieModule;

$GLOBALS['FE_MOD']['miscellaneous']['cookie'] = CookieModule::class;
