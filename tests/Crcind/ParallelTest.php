<?php

namespace Tests\Crcind;

use Tests\Base\BaseCrcindCase;

class ParallelTest extends BaseCrcindCase
{
    public function testAddInteger()
    {
        $this->parallelSoapClient->setMulti(true);

        $req1 = $this->parallelSoapClient->AddInteger(['Arg1' => 4, 'Arg2' => 3]);
        $req2 = $this->parallelSoapClient->AddInteger(['Arg1' => 1, 'Arg2' => 2]);
        $req3 = $this->parallelSoapClient->AddInteger(['Arg1' => 3, 'Arg2' => 5]);

        $rs = $this->parallelSoapClient->run();

        $this->assertEquals('7', $rs[$req1]);
        $this->assertEquals('3', $rs[$req2]);
        $this->assertEquals('8', $rs[$req3]);

        $this->parallelSoapClient->setMulti(false);
        $rs = $this->parallelSoapClient->AddInteger(['Arg1' => 3, 'Arg2' => 10]);
        $this->assertEquals('13', $rs);


    }

    // todo
    // test headers soap action
    // test curl info / debug data
    // test parser function
    // test logger
    // test pretty xml
    // test log shipping
    // test custom headers
    // add more example with log shipping / result parsing / etc...

}