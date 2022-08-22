<?php

namespace App\Service;

use App\Utils\Abbreviations;

/**
 * Class used for file parsing logic
 */
class FileParserService
{
    private const LINK_SPECIAL_CONSTANT = 'LINK';

    /**
     * Returns a map containing required information about each word.
     *
     * Each element of map has the following structure:
     *      word => {numberOfTotalOccurrences:sentenceIndex(es),...}
     *
     * @param string $content
     *
     * @return array
     */
    public function getParsedContent(string $content): array
    {
        //Get all words and their frequencies from content.
        $words = preg_split("/[^\w]*([\s]+[^\w]*|$)/", $content, -1, PREG_SPLIT_NO_EMPTY);
        $wordOccurrences = array_count_values($words);

        //Split content into phrases.
        $sentences = $this->splitContentIntoSentences($content);

        // Foreach word store information about occurrences and sentences.
        $wordOccurrencesSentencesMap = [];
        foreach ($wordOccurrences as $word => $frequency) {
            $wordOccurrencesSentencesMap[$word]['occurrences'] = $frequency;

            foreach ($sentences as $index => $sentence) {
                $counter = $this->countWordFrequencyInPhrase($word, $sentence);
                $wordOccurrencesSentencesMap[$word]['sentence'][$index + 1] = $counter;
            }
        }

        ksort($wordOccurrencesSentencesMap, SORT_STRING | SORT_FLAG_CASE);

        return $this->formatOccurrencesData($wordOccurrencesSentencesMap);
    }

    /**
     * Returns the content split into phrases.
     *
     * @param string $content
     * @return array
     */
    private function splitContentIntoSentences(string $content): array
    {
        // Clean the text.
        $content = trim(preg_replace('/\s+/', ' ', $content));

        // Replace all abbreviations with their un-dotted for ("Mr." will be replaced with "Mr")
        $formattedContent = str_replace(Abbreviations::DOTTED, Abbreviations::UNDOTTED, $content);

        // Split text into sentences. A phrase might end in ., ?, !, ?!, ...
        $sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $formattedContent);

        // Put back all abbreviations ("Mr" will be replaced with "Mr.")
        // Result should be initial content split into phrases.
        $initialContentSentences = [];
        foreach ($sentences as $sentence) {
            $initialContentSentence = str_replace(Abbreviations::UNDOTTED, Abbreviations::DOTTED, $sentence);
            $initialContentSentences[] = $initialContentSentence;
        }

        return $initialContentSentences;
    }

    /**
     * Returns the number of occurrences of a specific word in a phrase.
     * Links are treated as a particular case.
     *
     * @param string $word
     * @param string $phrase
     *
     * @return int
     */
    private function countWordFrequencyInPhrase(string $word, string $phrase): int
    {
        $link = '';

        // check if phrase contains a link
        $reg_ex = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        if (preg_match($reg_ex, $phrase, $url)) {
            $link = $url[0];
        }

        // in case phrase contains a link, replace link with a constant
        if ($link !== '') {
            $phrase = str_replace($link, self::LINK_SPECIAL_CONSTANT, $phrase);
        }

        $wordFrequencies = array_count_values(str_word_count($phrase, 1));

        if (array_key_exists($word, $wordFrequencies)) {
            return $wordFrequencies[$word];
        }

        if (array_key_exists(self::LINK_SPECIAL_CONSTANT, $wordFrequencies)) {
            return $wordFrequencies[self::LINK_SPECIAL_CONSTANT];
        }

        return 0;
    }

    /**
     * Return occurrences in specific format {noOfOccurrences:sentenceIndex(es)}
     *
     * @param array $wordOccurrencesSentencesMap
     *
     * @return array
     */
    private function formatOccurrencesData(array $wordOccurrencesSentencesMap): array
    {
        $wordAndOccurrencesMap = [];
        foreach ($wordOccurrencesSentencesMap as $word => $data) {
            // Process sentence occurrences data
            $sentenceOccurrencesString = $this->getSentenceOccurrencesData($data['sentence']);
            $occurrencesString = '{' . $data['occurrences'] . ':' . $sentenceOccurrencesString . '}';
            $wordAndOccurrencesMap[$word] = $occurrencesString;
        }

        return $wordAndOccurrencesMap;
    }

    /**
     * @param array $sentence
     *
     * @return string
     */
    private function getSentenceOccurrencesData(array $sentence): string
    {
        $sentenceString = '';

        // Add sentences index to sentenceString for "frequency" times
        foreach ($sentence as $sentenceIndex => $frequency) {
            $sentenceString = $sentenceString . str_repeat($sentenceIndex . ',', $frequency);
        }

        // Remove last char if this is ","
        if (substr($sentenceString, -1) === ',') {
            $sentenceString = substr($sentenceString, 0, -1);
        }

        return $sentenceString;
    }
}
