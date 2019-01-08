<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Facebook\WebDriver\Interactions\WebDriverActions;

class inputValidation extends DuskTestCase
{
    /**
     * @group sbs
     * @group productLogs
     */
    public function testInputValidation()
    {
        $this->browse(function (Browser $browser) {



            $browser
                //Visit site Url
                ->visit('https://www.seb.lt/eng/private/calculator-leasing')
                ->pause(2000);
            $browser->driver->switchTo()->frame('lease-calculator');
                //Clear "Property price" input
            $browser->keys('#price', '{backspace}')
                //Assert "Property price" input validation error
                ->assertSeeIn('#leaseForm div.span6 > div.control-group:nth-of-type(2) span.error', 'Enter value from 5000')
                //Clear "Contract fee" input
                ->keys('#contractFee', '{backspace}')
                ->clear('#contractFee')
                //Assert "Contract fee" input validation error
                ->assertSeeIn('#leaseForm div.span6 > div.control-group:nth-of-type(3) span.error', 'Enter value from 86,89')
                //Clear "Downpayment" input
                ->keys('#downpayment', '{backspace}')
                ->clear('#downpayment')
                //Assert "Downpayment" input validation error
                ->assertSeeIn('#leaseForm div.span6 > div.control-group:nth-of-type(4) span.error', 'Enter value from 5 to 99')
                //Clear "Interest rate" input
                ->keys('#interestRate', '{backspace}')
                //Assert "Interest rate" input validation error
                ->assertSeeIn('#leaseForm div.span6:nth-of-type(3) > div.control-group span.error', 'Enter correct interest rate')
                //Clear "Residual value" input
                ->keys('#residualValue', '{backspace}')
                //Assert "Residual value" input validation error
                ->assertSeeIn('#leaseForm div.span6:nth-of-type(3) #operatingCol2b span.help-block', 'Enter value from 0 to 99')
                //Click Calculate button
                ->click('#getSchedule')
                //Assert ErrorMessage show
                ->assertSeeIn('#alertError', 'According to the data you have provided, we are unfortunately unable to issue you a leasing..')

                //Type correct value in all inputs

                //Type "Property price"
                ->type('#price', '5000')
                //Assert validation error not visible
                ->assertMissing('#leaseForm div.span6 > div.control-group:nth-of-type(2) span.error')
                //Type "Contract fee"
                ->type('#contractFee', '350')
                //Assert validation error not visible
                ->assertMissing('#leaseForm div.span6 > div.control-group:nth-of-type(3) span.error')
                //Type "Downpayment"
                ->type('#downpayment', '10')
                //Assert validation error not visible
                ->assertMissing('#leaseForm div.span6 > div.control-group:nth-of-type(4) span.error')
                //Type "Interest rate"
                ->type('#interestRate', '3')
                //Assert validation error not visible
                ->assertMissing('#leaseForm div.span6:nth-of-type(3) > div.control-group span.error')
                //Type "Residual value"
                ->type('#residualValue', '0')
                //Assert validation error not visible
                ->assertMissing('#leaseForm div.span6:nth-of-type(3) #operatingCol2b span.help-block')
                //Click Calculate button
                ->click('#getSchedule')
                //Assert ErrorMessage missing
                ->assertMissing('#alertError')
                ;

        });

    }
}
