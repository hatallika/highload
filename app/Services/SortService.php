<?php

namespace App\Services;

class SortService
{
    public function bubbleSort($nums)
    {
        do {
            $needSort = false;
            for ($i = 0; $i < count($nums) - 1; $i++) {
                if ($nums[$i] > $nums[$i+1]) {
                    $temp = $nums[$i];
                    $nums[$i] = $nums[$i+1];
                    $nums[$i+1] = $temp;
                    $needSort = true;
                    //var_dump($nums);
                }
            }
        } while($needSort);
        return $nums;
    }
    public function second_sort($arr)
    {
        for ($i=0; $i<count($arr)-1; $i++) {
            for ($j=0; $j<count($arr)-1-$i; $j++) {
                if ($arr[$j+1] < $arr[$j]) {
                    // Swap elements at indices: $j, $k
                    list($arr[$j], $arr[$j+1]) = array($arr[$j+1], $arr[$j]);
                }
            }
        }
        return $arr;
    }

    public function quicksort(array $array){
        $this->sortQuick($array, 0, count($array)-1);
        return $array;
    }
    public function sortQuick(array &$arr, int $startPosition, int $endPosition ){
        //определим левый и правый указатели
        $leftPosition = $startPosition;
        $rightPosition = $endPosition;
        $pivot = $arr[(int)(($startPosition + $endPosition)/2)];

        do {
            //ищем большее значение слева от пивот, фиксируем как найдем.
            while ($arr[$leftPosition] < $pivot){
                $leftPosition++;

            }
            //ищем правое значение меньшее пивот
            while (($arr[$rightPosition] > $pivot)){
                $rightPosition--;

            }

            //указатели не пересеклись и не ушли друг за друга (не поменялись местами)
            if ($leftPosition <= $rightPosition){
                //то меняем вариантами
                // 1 не смотрят на один и тот же элемент
                if($leftPosition < $rightPosition){
                    list($arr[$leftPosition], $arr[$rightPosition]) = array($arr[$rightPosition], $arr[$leftPosition]);
                }
                $leftPosition++;
                $rightPosition--;

            }
        } while ($leftPosition <= $rightPosition);
        //если левая позиция не дошла еще до конца массива
        if($leftPosition < $endPosition){

            $this->sortQuick($arr, $leftPosition, $endPosition);
        }
        if($startPosition < $rightPosition){

            $this->sortQuick($arr, $startPosition, $rightPosition);

        }
    }
}
