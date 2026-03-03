<?php

declare(strict_types=1);

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

final class MainCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('R6.06 Maintenance applicative');
    }

    public function seeDatabaseData(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('azerty');
        $I->see('abcdef');
        $I->see('xyz');
        $I->see('123456789');
    }
}
