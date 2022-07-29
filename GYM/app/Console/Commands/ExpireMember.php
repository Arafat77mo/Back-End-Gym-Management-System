<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Member;

class ExpireMember extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'member.expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire MemberShip for Member every Month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $members = Member::where('expire' , 0)->get();

        foreach($members as $member){
            $member->update([
                'expire' => 1
            ]);
            
        }

    }
}
