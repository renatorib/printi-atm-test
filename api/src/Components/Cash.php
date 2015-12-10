<?php
namespace ATM\Components;

class Cash {

    /**
     * Get plain available notes and his quantity (if true = infinite)
     * Example:
     *     '100' => 20   // Available 20 notes of 100
     *     '100' => true // Available infinite notes of 100
     *
     * @return array
     */

    static function availableNotes(){
        $notes = [
            '100' => true,
            '50' => true,
            '20' => true,
            '10' => true
        ];
        krsort($notes);
        return $notes;
    }

    /**
     * Get minimum notes from a specified value
     *
     * @param int $value Input value;
     * @return array All notes that represent the value
     */

    static function getMinNotes($value){
        if(!is_int($value) || $value <= 0){
            return ['error' => 'InvalidArgumentException'];
        }

        $availableNotes = Cash::availableNotes();
        $return = [];
        foreach($availableNotes as $note => $qty){
            $note = (string) $note;
            $return[$note] = 0;
            while($value >= $note && ($qty > 0 || $qty == true)){
                if(is_int($qty)){
                    $qty--;
                }
                $return[$note]++;
                $value -= $note;
            }
        }

        if(!$value == 0){
            return ['error' => 'BillUnavaiableException'];
        }

        return array_filter($return);
    }
}
