<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Token;
use Carbon\Carbon;

class DeleteExpiredTokens extends Command
{
    protected $signature = 'tokens:delete-expired';
    protected $description = 'Delete expired tokens after 5 minutes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $expiredTokens = Token::where('s_time', '<', Carbon::now()->subMinutes(5))->get();

        foreach ($expiredTokens as $token) {
            $token->delete();
        }

        $this->info('Expired tokens deleted successfully!');
    }
}

