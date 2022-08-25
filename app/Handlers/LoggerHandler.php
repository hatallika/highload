<?php

namespace App\Handlers;

use App\Services\SortService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoggerHandler implements LoggerHandlerInterface
{
    private SortService $bubbleSortService;
    public function __construct()
    {
        $this->bubbleSortService = new SortService();
    }

    public function handle(Request $request):void
    {
        $array = [5,2,1,6,7,4,3,8,9];

        //Считаем пузырьковую сортировку
        $start = $this->getMicrotime();
        $time_start = time();
        Log::info("Пузырьковая сортировка начала работать в " . date('Y-m-d H:i:s',$time_start));

        $arraySort = $this->bubbleSortService->bubbleSort($array);

        $memory = memory_get_usage();
        Log::debug("Потрачено памяти " . $memory);

        $time_end = time();
        Log::info("Закончила работать в " . date('Y-m-d H:i:s', $time_end));
        Log::info('Время работы скрипта ' . $this->getMicrotime() - $start);
        var_dump($arraySort);

        //Считаем быструю сортировку
        $start = $this->getMicrotime();
        $time_start = time();
        Log::info("Быстрая сортировка начала работать в " . date('Y-m-d H:i:s',$time_start));

        $arraySort = $this->bubbleSortService->quicksort($array);

        $time_end = time();
        Log::info("Закончила работать в " . date('Y-m-d H:i:s', $time_end));

        $memory = memory_get_usage();
        Log::debug("Потрачено памяти " . $memory);
        Log::info('Время работы скрипта ' . $this->getMicrotime() - $start);
        var_dump($arraySort);
    }

    public function getMicrotime(){
        return microtime(true);
    }
}
