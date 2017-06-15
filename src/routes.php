<?php



Route::get('avanser/cdr',function(){

    $cdrs = Avanser::getCallData(['date_from'=>'2017-06-01']);
    echo PHP_EOL . 'CDRS:' . PHP_EOL;
    echo '<hr>';
    // print cdrs

    dd($cdrs);
    foreach($cdrs['calls'] as $call ) {
        echo implode(';',$call) . '<hr>';
    }
});