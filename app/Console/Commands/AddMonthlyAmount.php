<?php
namespace App\Console\Commands;

use App\Models\RentBills;
use Illuminate\Console\Command;

class AddMonthlyAmount extends Command
{
    protected $signature = 'tenants:add-monthly-amount';
    protected $description = 'Add a fixed amount of money to each tenant at the end of every month';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $amount = -6000;
        $tenants = RentBills::all();

        foreach ($tenants as $tenant) {
            $tenant->balance += $amount;
            $tenant->save();
            $this->info("Added $amount to {$tenant->client_id}'s account. New balance: {$tenant->balance}");
        }

        return 0;
    }
}
