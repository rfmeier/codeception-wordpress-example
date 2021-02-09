<?php

class WPFirstCest
{
    public function i_see_hello_world(AcceptanceTester $I)
    {
        $I->havePostInDatabase([
            'post_type' => 'post',
            'post_title' => 'Hello world!',
        ]);

        $I->amOnPage('/');
        $I->see('Hello world!');
    }

    public function i_can_switch_between_domains(AcceptanceTester $I)
    {
        $I->loginAsAdmin();
        $I->amOnPluginsPage();
        $I->see('Codeception WordPress Example');

        $I->amOnPage('https://duckduckgo.com/');
        $I->see('Privacy, simplified.');

        $I->amOnPluginsPage();
        $I->see('Codeception WordPress Example');
    }
}
