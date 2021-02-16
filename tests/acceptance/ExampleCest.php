<?php

class ExampleCest
{
    /**
     * @type string
     */
    protected $wordPressUrl;

    /**
     * Save the WordPress url for later use.
     */
    public function _before(AcceptanceTester $I)
    {
        $this->wordPressUrl = getenv('TEST_SITE_WP_URL');
    }

    /**
     * A simple test.
     *
     * 1. Test Codeception can search the WordPress database
     * 2. Test Codeception can see 'Hello world' on the home page.
     */
    public function i_see_hello_world(AcceptanceTester $I)
    {
        $I->havePostInDatabase([
            'post_type' => 'post',
            'post_title' => 'Hello world!',
        ]);

        $I->amOnPage('/');
        $I->see('Hello world!');
    }

    /**
     * Test domain switching.
     *
     * 1. Test browser can see the plugin title on the plugins page.
     * 2. Test browser can switch domains and see some text.
     * 3. Test browser can switch back to WordPress and see the plugin title on the plugins page.
     */
    public function i_can_switch_between_domains(AcceptanceTester $I)
    {
        $I->loginAsAdmin();
        $I->amOnPluginsPage();
        $I->see('Codeception WordPress Example');

        $I->amOnUrl('https://duckduckgo.com/');
        $I->see('Tired of being tracked online?');

        $I->amOnUrl($this->wordPressUrl);
        $I->amOnPluginsPage();
        $I->see('Codeception WordPress Example');
    }
}
