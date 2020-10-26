<?php


namespace Tests\Unit;


use Tests\TestCase;

class ConverterTest extends TestCase
{
    /**
     * Data provider for `convert()` method test.
     *
     * @return array
     */
    public function convertDataProvider()
    {
        return [
            [
                'money' => 20,
                'coefficient' => 2,
                'bonus' => 40
            ],
            [
                'money' => 12,
                'coefficient' => 10,
                'bonus' => 120
            ]
        ];
    }

    /**
     * Test for `convert()` method.
     *
     * @dataProvider convertDataProvider
     *
     * @param int $money
     * @param int $coefficient
     * @param int $bonus
     */
    public function convertTest(int $money, int $coefficient, int $bonus)
    {
        $converter = new Converter($coefficient);
        $result = $converter->convert($money);

        static::assertEquals($bonus, $result);
    }
}
