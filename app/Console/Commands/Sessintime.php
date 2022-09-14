<?php

namespace App\Console\Commands;
use App\Models\Student_session;
use App\Notifications\Sessionstarted;

use Illuminate\Console\Command;
use Carbon\Carbon;

class Sessintime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:session';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'session time';

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
        // $ss = Student_session::find(116);
        // if($ss){
        //     $ss->status =2;
        //     $ss->save();
        // }
       
        $sessions = Student_session::where('status', 3)->orwhere('status', 1)->get();
        $date = Carbon::now()->format('y-m-d');
        $time = Carbon::now()->format('H:i:s');
        foreach ($sessions as $ss){
            if($ss->session_date <= $date ){
                if($ss->start_time <= $time ){
                    $ss->status =2;
                    $ss->save();
                            
                    $ss->user->notify(new Sessionstarted($ss));
                    $ss->learner->notify(new Sessionstarted($ss));
                }

            }
         
               
        }
         
      
    }
}
