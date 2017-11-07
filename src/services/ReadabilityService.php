<?php
/**
 * Readability plugin for Craft CMS 3.x
 *
 * Get statistics on your text.
 *
 * @link      https://github.com/mikestecker
 * @copyright Copyright (c) 2017 Mike Stecker
 */

namespace mikestecker\readability\services;

use mikestecker\readability\Readability;

use Craft;
use craft\helpers\StringHelper;
use craft\base\Component;

use DaveChild\TextStatistics\Text;
use DaveChild\TextStatistics\TextStatistics;

/**
 * @author    Mike Stecker
 * @package   Readability
 * @since     1.0.0
 */
class ReadabilityService extends Component
{

    public function readingEase($content): float
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);

        $textStatistics = new TextStatistics();
        $readingEase = $textStatistics->fleschKincaidReadingEase($content);
        return $readingEase;
    }
    
    public function readingEaseDescription($content): string
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);

        $description = "";
        $reading_ease = $this->readingEase($content);
        if ($reading_ease <20) {
            $description = "Very difficult to read. Best understood by university graduates";
        } elseif($reading_ease >=20 && $reading_ease <50) {
            $description = "Difficult to read.";
        } elseif($reading_ease >=50 && $reading_ease <60) {
            $description = "Fairly difficult to read.";
        } elseif($reading_ease >=60 && $reading_ease <70) {
            $description = "Plain English. Easily understood by 13- to 15-year-old students.";
        } elseif($reading_ease >=70 && $reading_ease <80) {
            $description = "Fairly easy to read.";
        } elseif($reading_ease >=80 && $reading_ease <90) {
            $description = "Easy to read. Conversational English for consumers.";
        } elseif($reading_ease >90) {
            $description = "Very easy to read. Easily understood by an average 11-year-old student.";
        }
        return $description;
    }
    
    public function schoolLevel($content): string
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        $description = "";
        $reading_ease = $this->readingEase($content);
        if ($reading_ease <20) {
            $description = "College graduate";
        } elseif($reading_ease >=20 && $reading_ease <50) {
            $description = "College";
        } elseif($reading_ease >=50 && $reading_ease <60) {
            $description = "10th to 12th grade";
        } elseif($reading_ease >=60 && $reading_ease <70) {
            $description = "8th & 9th grade";
        } elseif($reading_ease >=70 && $reading_ease <80) {
            $description = "7th grade";
        } elseif($reading_ease >=80 && $reading_ease <90) {
            $description = "6th grade";
        } elseif($reading_ease >90) {
            $description = "5th grade";
        }
        return $description;
    }

    public function cleanText($content): string
    {
        if (empty($content)) {
            return '';
        }
        // $content = StringHelper::stripHtml($content);
        
        
        return Text::cleanText($content);
    }
    

    public function characterCount($content): int
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        return Text::characterCount($content);
    }
    

    public function letterCount($content): int
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        return Text::letterCount($content);
    }
    

    public function syllableCount( string $word ): int
    {
        if (empty($word)) {
            return '';
        }
        $content = StringHelper::stripHtml($word);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->syllableCount($word );
    }
    

    public function averageSyllablesPerWord($content): float
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->averageSyllablesPerWord($content);
    }
    

    public function percentageWordsWithThreeSyllables($content): float
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->percentageWordsWithThreeSyllables($content);
    }
    

    public function sentenceCount($content): int
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->sentenceCount($content);
    }


    public function averageWordsPerSentence($content): float
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->averageWordsPerSentence($content);
    }


    public function gradeLevel($content): float
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->flesch_kincaid_grade_level($content);
    }


    public function gunningFogScore($content): float
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->gunning_fog_score($content);
    }


    public function colemanLiauIndex($content): float
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->coleman_liau_index($content);
    }


    public function smogIndex($content): float
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->smog_index($content);
    }


    public function automatedReadabilityIndex($content): float
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->automated_readability_index($content);
    }


    public function daleChallReadabilityScore($content)
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->daleChallReadabilityScore($content);
    }


    public function spacheReadabilityScore($content)
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        $textStatistics = new TextStatistics();
        return $textStatistics->spacheReadabilityScore($content);
    }

    
    public function wordCount($content): int
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        
        
        return Text::wordCount($content);
    }

    // Public Methods
    // =========================================================================

    /*
     * @return string
     */
    public function readingTime($content): int
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);

        /*
         https://en.wikipedia.org/wiki/Reading_%28process%29#Reading_rate
         Rates of reading include reading for memorization (fewer than 100 words per minute [wpm]); reading for learning (100–200 wpm); reading for comprehension (200–400 wpm); and skimming (400–700 wpm). Reading for comprehension is the essence of the daily reading of most people. Skimming is for superficially processing large quantities of text at a low level of comprehension (below 50%).
         */
        $readingRate = 0; // words per minute
        $reading_ease = $this->readingEase($content);
        $word_count = $this->wordCount($content);

        if ($reading_ease <20) {
           $readingRate = 100;
        } elseif($reading_ease >=20 && $reading_ease <50) {
            $readingRate = 200;
        } elseif($reading_ease >=50 && $reading_ease <60) {
            $readingRate = 300;
        } elseif($reading_ease >=60 && $reading_ease <70) {
           $readingRate = 350;
        } elseif($reading_ease >=70 && $reading_ease <80) {
            $readingRate = 400;
        } elseif($reading_ease >=80 && $reading_ease <90) {
            $readingRate = 500;
        } elseif($reading_ease >90) {
            $readingRate = 600;
        }

        $min = ($word_count / $readingRate);
        $seconds = floor($min * 60);
        
        return $seconds;
    }

    /*
     * @return string
     */
    public function humanReadingTime($content)
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        $seconds = $this->readingTime($content);

        return Craft::$app->formatter->asDuration($seconds);
    }

    /*
     * @return string
     */
    public function averageReadingTime($content): int
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);

        /*
         http://www.healthguidance.org/entry/13263/1/What-Is-the-Average-Reading-Speed-and-the-Best-Rate-of-Reading.html
         */
        $readingRate = 250; // words per minute
        $word_count = $this->wordCount($content);

        $min = ($word_count / $readingRate);
        $seconds = floor($min * 60);

        return $seconds;
    }

    /*
     * @return string
     */
    public function humanAverageReadingTime($content)
    {
        if (empty($content)) {
            return '';
        }
        $content = StringHelper::stripHtml($content);
        $seconds = $this->averageReadingTime($content);

        return Craft::$app->formatter->asDuration($seconds);
    }
}
