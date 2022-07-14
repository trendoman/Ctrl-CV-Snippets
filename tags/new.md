# new

## Some tests

```xml
<cms:test ignore='0'>
<pre>
<cms:html_encode>
<cms:repeat count='10'>

    <contact firstName="<cms:new 'firstname' />" lastName="<cms:new 'lastname' />" email="<cms:new 'email' />" >
        <phone number="<cms:new 'phoneNumber' />"/>
        <cms:if "<cms:new 'boolean' optional='75%' />">
            <birth date="<cms:date "<cms:new 'dateTimeThisCentury'  />" format='Y-m-d' />" place="<cms:new 'city' />"/>
        </cms:if>

        <address>
          <street><cms:new 'streetAddress' /></street>
          <city><cms:new 'city' /></city>
          <postcode><cms:new 'postcode' /></postcode>
          <state><cms:new 'state' /></state>
        </address>

        <company name="<cms:new 'company' />" catchPhrase="<cms:new 'catchPhrase' />">
            <cms:if "<cms:new 'boolean' optional='66%' />">
                <offer><cms:new 'bs' /></offer>
            </cms:if>
            <cms:new 'passthrough' "<director name=\"<cms:new 'name' />\" />" optional='66%' />

        </company>

        <details>
        <![CDATA[
            <cms:new 'text' length='400' optional='33%' />

        ]]>
        </details>
    </contact>

</cms:repeat>
</cms:html_encode>
</pre>
</cms:test>



<contact firstName="Braxton" lastName="Beier" email="mccullough.tabitha@yahoo.com" >
    <phone number="(270) 896-0477"/>
    <birth date="1932-04-11" place="Port Mitchell"/>

    <address>
      <street>99524 Heidenreich Plains</street>
      <city>Spinkastad</city>
      <postcode>45164</postcode>
      <state>West Virginia</state>
    </address>

    <company name="Mohr-Christiansen" catchPhrase="Re-contextualized high-level strategy">
        <offer>disintermediate revolutionary paradigms</offer>
        <director name="Brenda Grant PhD" />
    </company>

    <details>
    <![CDATA[
        Quo cupiditate itaque quisquam sapiente cum aut. Rerum excepturi et vel repudiandae ab. Asperiores consectetur alias quos. Totam blanditiis nostrum magni omnis ea dolorum.
    ]]>
    </details>
</contact>



<cms:test ignore='1' get_time='1'>

    <cms:new 'time' 'His' optional='90%'  />

    <cms:new 'passthrough' />

    <cms:new 'numerify' sring='###' />

    <cms:new 'image' dir=''  />
    <cms:new 'randomDigitNot' except='0' />
</cms:test>

<cms:test ignore='1'>
    <cms:new />
</cms:test>


<cms:test ignore='1' get_time='0'>

    <ol>
    <cms:repeat '10'>
        <li><cms:new 'city' optional='yes' default='-' locale='ru_RU'/></li>
        <li><cms:new 'city' optional='yes' default='-' locale='ka_GE'/></li>
        <li><cms:new 'city' optional='yes' default='-' locale='en_US'/></li>
        <li><cms:new 'city' optional='yes' default='-' locale='id_ID'/></li>
    </cms:repeat>
    </ol>

</cms:test>


<cms:test ignore='1' get_time='0'>

    <ol>
    <cms:repeat '10'>
        <li><cms:new 'passthrough' 'test' optional='yes' default='-'/></li>
    </cms:repeat>
    </ol>

</cms:test>


<cms:test ignore='1' get_time='1'>

    <cms:func _into='evenValidator'>
        <cms:if "<cms:mod new_value '2' />">0<cms:else />1</cms:if>
    </cms:func>

    <ol>

    <cms:set my_array = '["1", "3", "2", "4", "9"]' is_json='1' />
    <cms:repeat '10'>
        <li><cms:new 'randomElement' array=my_array validator=evenValidator /></li>
    </cms:repeat>
    </ol>

</cms:test>


<cms:nl2br ignore='1' get_time='1'>

    // dateTime($max = 'now', $timezone = null)
    <cms:new 'dateTime' max='tomorrow' timezone='GMT' locale='ru_RU'/>


    // time($format = 'H:i:s', $max = 'now')
    <cms:new 'time' locale='ru_RU' />


    // dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)
    <cms:new 'dateTimeBetween' '-1 day' locale='' />


    // imageUrl($width = 640, $height = 480)
    <cms:new 'imageUrl' width='' height='' category='cats' randomize='0' word='MyText' gray='1' />


    // randomHtml(2,3)
    <cms:new 'randomHtml' '1' '1' locale='ka_GE'/>

</cms:nl2br>


<cms:nl2br ignore='1'>

    // shuffle('hello, world')
    <cms:new 'shuffle' 'hello, world' locale='' />


    // shuffleString('hello, world')
    <cms:new 'shufflestring' 'hello, world' />


    // shuffleArray( $arg = array() )
    <cms:set my_array = '{"a":["1", "2"], "x":"4", "b":{"c":"1"}}' is_json='1' />
    <cms:new 'shufflearray' my_array />


    // numerify('Hello ###')
    <cms:new 'numerify' 'Hello ###' locale='ka_GE' />


    // lexify('Hello ???')
    <cms:new 'lexify' 'Hello ???' locale='ru_RU' />


    // bothify('Hello ##??')
    <cms:new 'bothify' 'Hello  ######??' locale='ru_RU' />


    // asciify('Hello ***')
    <cms:new 'asciify' 'Hello  ***' />


    // regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}');
    <cms:new 'regexify' "[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}" />

</cms:nl2br>


<cms:nl2br ignore='1'>

    // randomDigit
    <cms:new 'randomDigit' />


    // randomDigitNot(5)
    <cms:new 'randomDigitNot' '5' />


    // randomDigitNotNull
    <cms:new 'randomDigitNotNull' />


    // randomNumber($nbDigits = NULL, $strict = false)
    <cms:new 'randomNumber' '5' />

    <cms:new 'randomNumber' nbDigits='5' 'true' />


    // randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL)
    <cms:new 'randomFloat' '3' max='2' />

    <cms:new 'randomFloat' '5' min='5' max='10' />


    // numberBetween($min = 1000, $max = 9000)
    <cms:new 'numberBetween' '10' '100' />


    // randomLetter
    <cms:new 'randomLetter' />


    // returns randomly ordered subsequence of a provided array
    // randomElements($array = array ('a','b','c'), $count = 1, $allowDuplicates = false)
    <cms:set my_array = '["1", "2", "5"]' is_json='1' />
    <cms:new 'randomElements' array=my_array  />

    <cms:set my_array = '{"a":["1", "2"], "x":"4", "b":{"c":"1"}}' is_json='1' />
    <cms:new 'randomElements' array=my_array count='2' allowDuplicates='yes' />


    // randomElement($array = array ('a','b','c'))
    <cms:new 'randomElement' array=my_array />


    // randomKey($array = array())
    <cms:new 'randomKey' array=my_array />

</cms:nl2br>
```

## Old test class

```php
<?php

require_once( dirname(__DIR__) . '/gen-fakes/vendor/autoload.php');


class TestClass extends Faker\Factory {

    protected static $myProviders = array('test');

    public static function create($locale = self::DEFAULT_LOCALE)
    {
        $generator = parent::create($locale);
        var_dump($generator);

        foreach (static::$myProviders as $provider) {
            $providerClassName = self::getProviderClassname($provider, $locale);
            $generator->addProvider(new $providerClassName($generator));
        }

        return $generator;
    }
}

$t = TestClass::create();


var_dump( $t );

die();
```
