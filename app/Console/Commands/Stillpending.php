<?php

namespace App\Console\Commands;
use App\Models\Student_session;
use App\Notifications\Stillpending1;

use Illuminate\Console\Command;

class Stillpending extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:session3';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $sessions = Student_session::where('status', 0)->get();
        
        foreach ($sessions as $ss){
          
                    $ss->user->notify(new Stillpending1($ss));
                    $ss->learner->notify(new Stillpending1($ss));

                    
         
               
        }
    }
}
