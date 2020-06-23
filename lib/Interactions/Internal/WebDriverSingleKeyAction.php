<?php

namespace Facebook\WebDriver\Interactions\Internal;

use Facebook\WebDriver\Internal\WebDriverLocatable;
use Facebook\WebDriver\WebDriverAction;
use Facebook\WebDriver\WebDriverKeyboard;
use Facebook\WebDriver\WebDriverKeys;
use Facebook\WebDriver\WebDriverMouse;

abstract class WebDriverSingleKeyAction extends WebDriverKeysRelatedAction implements WebDriverAction
{
    const MODIFIER_KEYS = [
        WebDriverKeys::SHIFT, WebDriverKeys::CONTROL, WebDriverKeys::ALT, WebDriverKeys::META,
        WebDriverKeys::COMMAND, WebDriverKeys::LEFT_ALT, WebDriverKeys::LEFT_CONTROL,
        WebDriverKeys::LEFT_SHIFT
    ];

    /** @var string */
    protected $key = '';

    public function __construct(
        WebDriverKeyboard $keyboard,
        WebDriverMouse $mouse,
        WebDriverLocatable $location_provider = null,
        $key = ''
    ) {
        parent::__construct($keyboard, $mouse, $location_provider);
        $this->key = $key;

        if (!in_array($key, self::MODIFIER_KEYS, true)) {
            throw new \InvalidArgumentException("Key Down / Up events only make sense for modifier keys.");
        }
    }
}
