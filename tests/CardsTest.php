<?php

namespace Paylike\Tests;

use Paylike\Endpoint\Cards;
use Paylike\Exception\NotFound;

class CardsTest extends BaseTest
{
    /**
     * @var Cards
     */
    protected $cards;

    public function setUp(): void
    {
        parent::setUp();
        $this->cards = $this->paylike->cards();
    }

    public function testCreate()
    {
        $transaction_id = $this->transaction_id;
        $merchant_id = $this->merchant_id;

        $card_id = $this->cards->create($merchant_id, [
            'transactionId' => $transaction_id,
        ]);

        $this->assertNotEmpty($card_id, 'primary key');
    }

    public function testFetch()
    {
        $transaction_id = $this->transaction_id;
        $merchant_id = $this->merchant_id;

        $card_id = $this->cards->create($merchant_id, [
            'transactionId' => $transaction_id,
        ]);

        $card = $this->cards->fetch($card_id);

        $this->assertEquals($card['id'], $card_id, 'primary key');
    }

    public function testFailFetch()
    {
        $this->expectException(NotFound::class);
        $this->cards->fetch('wrong id');
    }
}
