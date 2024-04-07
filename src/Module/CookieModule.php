<?php

declare(strict_types=1);

/*
 * This file is part of the Dreibein-Cookie-Bundle.
 *
 * (c) Werbeagentur Dreibein GmbH
 *
 * @license LGPL-3.0-or-later
 */

namespace Dreibein\CookieBundle\Module;

use Contao\BackendTemplate;
use Contao\FrontendTemplate;
use Contao\Module;
use Contao\PageModel;
use Contao\StringUtil;

/**
 * Class CookieModule.
 *
 * @property string $cookieText
 * @property int    $cookieImprint
 * @property int    $cookieDataProtection
 */
class CookieModule extends Module
{
    protected $strTemplate = 'mod_cookie';

    protected $jsTemplate = 'js_cookie';

    public function generate(): string
    {
        if ('BE' === TL_MODE) {
            $template = new BackendTemplate('be_wildcard');

            $template->wildcard = '### Cookie Banner ###';
            $template->title = 'Cookie Banner';
            $template->id = $this->id;
            $template->link = $this->name;
            $template->href = 'contao?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $template->parse();
        }

        return parent::generate();
    }

    protected function compile(): void
    {
        // show the cookie banner on the page
        $this->Template->hideCookieBanner = false;

        // cookie text
        $this->Template->text = StringUtil::encodeEmail($this->cookieText);

        // link to imprint page
        $imprintPage = PageModel::findById((int) $this->cookieImprint);
        if (null !== $imprintPage) {
            $this->Template->imprintPage = $imprintPage->getFrontendUrl();
        }

        // link to data protection page
        $dataProtectionPage = PageModel::findById((int) $this->cookieDataProtection);
        if (null !== $dataProtectionPage) {
            $this->Template->dataProtectionPage = $dataProtectionPage->getFrontendUrl();
        }

        /** @var PageModel $page */
        $page = $GLOBALS['objPage'];
        $pageUrl = $page->getFrontendUrl();

        // check if current page is the imprint oder data-protection page
        if ($pageUrl === $this->Template->imprintPage || $pageUrl === $this->Template->dataProtectionPage) {
            $this->Template->hideCookieBanner = true;
        }

        // Add the javascript code to the page
        $jsTemplate = new FrontendTemplate($this->jsTemplate);
        $GLOBALS['TL_BODY']['cookie'] = $jsTemplate->parse();
    }
}
