<?php

/**
 * Suffix Trie Construction
 *
 * Write a SuffixTrie class for a Suffix-Trie-like data structure. The class should have a root property set to be the
 * root node of the trie and should support:
 * - Creating the trie from a string; this will be done by calling the populateSuffixTrieFrom method upon class
 * instantiation, which should populate the root of the class.
 * - Searching for strings in the trie.
 * Note that every string added to the trie should end with the special endSymbol character: "*".
 *
 * Reference: https://www.youtube.com/watch?v=Yt0t_Diqp1o
 */

class SuffixTrie {
    private $root = [];
    private $endSymbol = '*';

    public function __construct($string) {
        $this->populateSuffixTrieFrom($string);
    }

    private function populateSuffixTrieFrom($string) {
        for ($i = 0; $i < strlen($string); $i++) {
            $this->insertSubstringAt($i, $string);
        }
    }

    private function insertSubstringAt($idx, $string) {
        $node = &$this->root;
        for ($j = $idx; $j < strlen($string); $j++) {
            $letter = $string[$j];
            if (!isset($node[$letter])) {
                $node[$letter] = [];
            }
            $node = &$node[$letter];
        }
        $node[$this->endSymbol] = true;
    }

    public function contains($string) {
        $node = $this->root;
        foreach (str_split($string) as $letter) {
            if (!isset($node[$letter])) {
                return false;
            }
            $node = $node[$letter];
        }
        return isset($node[$this->endSymbol]);
    }
}

$trie = new SuffixTrie('babc');
var_dump($trie->contains('abc'));