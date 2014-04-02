<?php

namespace SnareReading\Generator;

/**
 * BasicGenerator
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class BasicGenerator implements GeneratorInterface
{

    protected $chunks = array(
        '2' => ["sn2", "sn4 sn"],
        '1' => ["sn4", "sn8 sn"],
        '0.5' => ["sn8", "sn16 sn"],
        '0.25' => ["sn16", "sn32 sn"],
    );

    public function generate(array $options = array())
    {
        return '\drums {' . $this->randomPhrase(16) . ' }';
    }

    protected function randomChunk($duration)
    {
        return $this->chunks[$duration][array_rand($this->chunks[$duration])];
    }

    protected function randomPhrase($beats)
    {
        //first, create a combination of chunks that add up to $beats.
        $chunks = array();
        while (array_sum($chunks) < $beats) {
            $chunks[] = array_rand($this->chunks);
            if (array_sum($chunks) > $beats) {
                array_pop($chunks);
            }
        }
        //now create a string using random notes of those lengths.
        $phrase = '';
        foreach ($chunks as $chunk) {
            $phrase .= ' ' . $this->randomChunk($chunk);
        }
        return $phrase;
    }


}
