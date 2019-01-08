<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Facebook\WebDriver\Interactions\WebDriverActions;

class loansLeasingTabLinksCheck extends DuskTestCase
{
    /**
     * @group sbs
     * @group productLogs
     */
    public function testLoansLeasingTabLinksCheck()
    {
        $this->browse(function (Browser $browser) {



            $browser
                //Visit site Url
                ->visit('https://www.seb.lt/eng/private/calculator-leasing')
                ->pause(2000)
                //Click "Loans and Leasing" link
                ->clickLink('Loans and Leasing')
                ->pause(1000)
                //Click "Loans" link in menuDropContent
                ->click('#menu01dropContent li.col-b a')
                //Assert redirect to correct url
                ->waitUsing(10, 1, function () use ($browser) {
                    return $browser->assertPathIs('/eng/private/loans-and-leasing/loans');
                }, "Something wasn't ready in time.")
                //Assert see ""Loans
                ->assertSee('Loans')
                //Click "Loans and Leasing" link
                ->clickLink('Loans and Leasing')
                ->pause(1000)
                 //Click "Leasing" link in menuDropContent
                ->click('#menu01dropContent li.col-c a')
                //Assert redirect to correct url
                ->waitUsing(10, 1, function () use ($browser) {
                    return $browser->assertPathIs('/eng/private/loans-and-leasing/leasing');
                }, "Something wasn't ready in time.")
                //Assert see "Leasing"
                ->assertSee('Leasing')
                 //Click "Loans and Leasing" link
                ->clickLink('Loans and Leasing')
                ->pause(1000)
                //Click "Mortgage Loan" link in menuDropContent
                ->click('#menu01dropContent li.col-b li:nth-of-type(1) a')
                //Assert redirect to correct url
                ->waitUsing(10, 1, function () use ($browser) {
                    return $browser->assertPathIs('/eng/private/loans-and-leasing/loans/mortgage-loan');
                }, "Something wasn't ready in time.")
                //Assert see "Mortgage Loan"
                ->assertSee('Mortgage Loan')
                 //Click "Loans and Leasing" link
                ->clickLink('Loans and Leasing')
                ->pause(1000)
                //Click "Home Equity Loan" link in menuDropContent
                ->click('#menu01dropContent li.col-b li:nth-of-type(2) a')
                //Assert redirect to correct url
                ->waitUsing(10, 1, function () use ($browser) {
                    return $browser->assertPathIs('/eng/private/loans-and-leasing/loans/home-equity-loan');
                }, "Something wasn't ready in time.")
                //Assert see "Home Equity Loan"
                ->assertSee('Home Equity Loan')
                 //Click "Loans and Leasing" link
                ->clickLink('Loans and Leasing')
                ->pause(1000)
                //Click "Consumer loan" link in menuDropContent
                ->click('#menu01dropContent li.col-b li:nth-of-type(3) a')
                //Assert redirect to correct url
                ->waitUsing(10, 1, function () use ($browser) {
                    return $browser->assertPathIs('/eng/private/loans-and-leasing/loans/consumer-loan');
                }, "Something wasn't ready in time.")
                //Assert see "Consumer Loan"
                ->assertSee('Consumer Loan')
                 //Click "Loans and Leasing" link
                ->clickLink('Loans and Leasing')
                ->pause(1000)
                //Click "Car leasing" link in menuDropContent
                ->click('#menu01dropContent li.col-c li:nth-of-type(1) a')
                //Assert redirect to correct url
                ->waitUsing(10, 1, function () use ($browser) {
                    return $browser->assertPathIs('/eng/private/loans-and-leasing/leasing/car-leasing');
                }, "Something wasn't ready in time.")
                //Assert see "Car leasing"
                ->assertSee('Car leasing')
                  //Click "Loans and Leasing" link
                ->clickLink('Loans and Leasing')
                ->pause(1000)
                //Click "Leasing plus insurace" link in menuDropContent
                ->click('#menu01dropContent li.col-c li:nth-of-type(2) a')
                //Assert redirect to correct url
                ->waitUsing(10, 1, function () use ($browser) {
                    return $browser->assertPathIs('/eng/private/loans-and-leasing/leasing/leasing-plus-insurance');
                }, "Something wasn't ready in time.")
                 //Assert see "Leasing plus insurance"
                ->assertSee('Leasing plus insurance');

        });

    }
}
