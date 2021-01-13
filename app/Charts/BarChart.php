<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Echarts\Chart;

class BarChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct($data1,$data2,$label1,$label2,$title)
    {
        $this->dataset($title,'pie',[$data1,$data2]);
        $this->labels([$label1,$label2]);
        parent::__construct();
    }
}
