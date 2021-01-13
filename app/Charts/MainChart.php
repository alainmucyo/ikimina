<?php

namespace App\Charts;

use App\Contribution;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

class MainChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($table,$title)
    {
        $num[]=[];
        $months=['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec'];
        for ($i=1;$i<=12;$i++){

            $num[$i]=DB::table($table)->where('cooperative_id',auth()->user()->cooperative->id)->whereMonth('created_at',$i)->whereYear('created_at',2019)->sum('amount');
        }
        $test=[12,45,67,34,787,8,7,3,0,0,2,30000];

        $this->dataset($title." (Rwf)", 'line',$num)
        ->color("rgba(2,117,216,1)")
        ->backgroundColor("rgba(2,117,216,0.2)");
        $this->loaderColor("red");
        $this->labels($months);
        parent::__construct();
    }
}
