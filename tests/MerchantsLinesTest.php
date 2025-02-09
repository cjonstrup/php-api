<?php

namespace Paylike\Tests;

use Paylike\Endpoint\Merchant\Lines;

class MerchantsLinesTest extends BaseTest
{
    /**
     * @var Lines
     */
    protected $lines;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->lines = $this->paylike->merchants()->lines();
    }

    /**
     * @throws \Exception
     */
    public function testGetAllLinesCursor()
    {
        $merchant_id = $this->merchant_id;
        $api_lines = $this->lines->find($merchant_id);
        $ids = [];

        foreach ($api_lines as $line) {
            // the lines array grows as needed
            $ids[] = $line['id'];
        }

        $this->assertGreaterThan(0, count($ids), 'number of lines');
    }

    /**
     * @throws \Exception
     */
    public function testGetAllLinesCursorBefore()
    {
        $merchant_id = $this->merchant_id;
        $before = '5da8594efd0c53603c7bb3a5';
        $api_lines = $this->lines->before($merchant_id, $before);
        $ids = [];

        foreach ($api_lines as $line) {
            // the lines array grows as needed
            $ids[] = $line['id'];
        }

        $this->assertGreaterThan(0, count($api_lines), 'number of lines');
    }

    /**
     * @throws \Exception
     */
    public function testGetAllMerchantsCursorAfter()
    {
        $merchant_id = $this->merchant_id;
        $after = '5da8594efd0c53603c7bb3a5';
        $api_lines = $this->lines->after($merchant_id, $after);
        $ids = [];

        foreach ($api_lines as $line) {
            // the lines array grows as needed
            $ids[] = $line['id'];
        }

        $this->assertGreaterThan(0, count($api_lines), 'number of lines');
    }
}
