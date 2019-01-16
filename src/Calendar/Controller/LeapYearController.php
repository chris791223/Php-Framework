<?php
/**
 * Created by PhpStorm.
 * User: wjing
 * Date: 2019-01-15
 * Time: 11:19 PM
 */

class LeapYearController {
    public function indexAction(Request $request, $year) {
        if ($this->is_leap_year($year)){
            return new Response('Yep, this is a leap year!');
        }
        return new Response('Nope, this is not a leap year.');
    }

    function is_leap_year($year = null){
        if ($year === null){
            $year = date('Y');
        }

        return $year % 400 === 0 || ($year % 4 === 0 && $year % 100 !== 0);
    }
}
