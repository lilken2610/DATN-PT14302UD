<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AutoRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
     * @return mixed
     */
    public function handle()
    {
        $object = DB::table('products')->get();
        foreach ($object as $key => $value) {
            $hot_pay = DB::table('transaction_detail')->where('id_product',$value->id_product)->count();
            DB::table('products')->where('id_product',$value->id_product)->update(array('hot_pay'=>$hot_pay));
        }
    }
}
