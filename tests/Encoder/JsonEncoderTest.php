<?php

declare(strict_types=1);

namespace Linio\Component\Cache\Encoder;

class JsonEncoderTest extends \PHPUnit_Framework_TestCase
{
    public function testIsEncoding()
    {
        $value = [
            'foo' => 1,
            'bar' => 'string',
        ];

        $expected = '{"foo":1,"bar":"string"}';

        $jsonEncoder = new JsonEncoder();

        $actual = $jsonEncoder->encode($value);

        $this->assertSame($expected, $actual);
    }

    public function testIsDecoding()
    {
        $value = '{"foo":1,"bar":"string"}';

        $expected = [
            'foo' => 1,
            'bar' => 'string',
        ];

        $jsonEncoder = new JsonEncoder();

        $actual = $jsonEncoder->decode($value);

        $this->assertSame($expected, $actual);
    }

    public function testIsDecodingBoolean()
    {
        $value = false;
        $expected = false;

        $serialEncoder = new JsonEncoder();
        $actual = $serialEncoder->decode($value);

        $this->assertSame($expected, $actual);
    }

    public function testIsDecodingNull()
    {
        $value = null;
        $expected = null;

        $serialEncoder = new JsonEncoder();
        $actual = $serialEncoder->decode($value);

        $this->assertSame($expected, $actual);
    }
}
