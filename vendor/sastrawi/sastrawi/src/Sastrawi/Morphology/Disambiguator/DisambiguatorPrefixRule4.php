<?php
/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
* Disambiguate Prefix Rule 4
* Rule 4 : belajar -> bel-ajar
*/
class DisambiguatorPrefixRule4 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 4
     * Rule 4 : belajar -> bel-ajar
     */
    public function disambiguate($word)
    {
        if ($word == 'belajar') {
            return 'ajar';
        }
        else if ($word == 'pemrograman'){
            return 'program';
        }
        else if ($word == 'perancangan' || $word == 'perancang'){
            return 'rancang';
        }
        else if ($word == 'coki'){
            return 'coki';
        }
        else if ($word == 'ntar' || $word == 'entaran' || $word == 'entar'){
            return 'nanti';
        }
        else if ($word == 'matiin'){
            return 'mati';
        }
        else if ($word == 'gue' || $word == 'gw'){
            return 'saya';
        }
        else if ($word == 'lu' || $word == 'lo' || $word == 'loe'){
            return 'kamu';
        }
        else if ($word == 'bgst' || $word == 'bngsd'){
            return 'bangsat';
        }
        else if ($word == 'bngt' || $word == 'bngd' || $word == 'sgt'){
            return 'sangat';
        }
        else if ($word == 'kayak'){
            return 'seperti';
        }
        else if ($word == 'anying' || $word == 'asu' || $word == 'kirik' || $word == 'anjg' || $word == 'kerek'){
            return 'anjing';
        }
        else if ($word == 'dgn'){
            return 'dengan';
        }
        else if ($word == 'krn'){
            return 'karena';
        }
        else if ($word == 'stlh'){
            return 'setelah';
        }
        else if ($word == 'sndiri' || $word =='sndr'){
            return 'sendiri';
        }
        else if ($word == 'drtd'){
            return 'daritadi';
        }
        else if ($word == 'ttg'){
            return 'tentang';
        }
        else if ($word == 'utk'){
            return 'untuk';
        }
        else if ($word == 'abis'){
            return 'habis';
        }
        else if ($word == 'gokil'){
            return 'gila';
        }
        else if ($word == 'mosok'){
            return 'masa';
        }
        else if ($word == 'diingetin'){
            return 'ingat';
        }
        else {
            return $word;
        }

        
    }
}
