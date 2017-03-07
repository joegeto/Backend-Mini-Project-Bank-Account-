<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\Transaction;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class AccountTest
 * @package Tests\Feature
 */
class AccountTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var Account
     */
    protected $account;

    /**
     * Setup
     */
    protected function setUp()
    {
        parent::setUp();
        $this->account = factory(Account::class)->create();
    }

    /**
     * Creates account
     */
    public function test_it_creates_an_account()
    {
        $this->post('/api/accounts', factory(Account::class)->make()->toArray())
            ->assertJsonStructure(['name', 'number']);
    }

    /**
     * Get balance
     */
    public function test_it_fetches_account_balance()
    {
        $this->get('/api/accounts/' . $this->account->getRouteKey() . '/balance')
            ->assertStatus(200);
    }

    /**
     * Deposit
     */
    public function test_it_deposits_to_an_account()
    {
        $this->post('/api/accounts/' . $this->account->getRouteKey() . '/deposit', factory(Transaction::class)->make()->toArray())
            ->assertStatus(200);
    }

    /**
     * Withdrawal
     */
    public function test_it_withdraws_from_an_account()
    {
        $this->post('/api/accounts/' . $this->account->getRouteKey() . '/withdraw', factory(Transaction::class)->make()->toArray())
            ->assertStatus(200);
    }
}
