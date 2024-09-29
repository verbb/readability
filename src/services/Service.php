<?php
namespace verbb\readability\services;

use Craft;
use craft\base\Component;
use craft\helpers\StringHelper;

use DaveChild\TextStatistics\Text;
use DaveChild\TextStatistics\TextStatistics;

class Service extends Component
{
    // Public Methods
    // =========================================================================

    public function readingEase(string $content): float
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);

        return (new TextStatistics())->fleschKincaidReadingEase($content);
    }
    
    public function readingEaseDescription(string $content): string
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);

        $description = '';
        $readingEase = $this->readingEase($content);

        if ($readingEase < 20) {
            $description = 'Very difficult to read. Best understood by university graduates';
        } else if ($readingEase < 50) {
            $description = 'Difficult to read.';
        } else if ($readingEase < 60) {
            $description = 'Fairly difficult to read.';
        } else if ($readingEase < 70) {
            $description = 'Plain English. Easily understood by 13- to 15-year-old students.';
        } else if ($readingEase < 80) {
            $description = 'Fairly easy to read.';
        } else if ($readingEase < 90) {
            $description = 'Easy to read. Conversational English for consumers.';
        } else if ($readingEase > 90) {
            $description = 'Very easy to read. Easily understood by an average 11-year-old student.';
        }

        return $description;
    }
    
    public function schoolLevel(string $content): string
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        
        $description = '';
        $readingEase = $this->readingEase($content);

        if ($readingEase < 20) {
            $description = 'College graduate';
        } else if ($readingEase < 50) {
            $description = 'College';
        } else if ($readingEase < 60) {
            $description = '10th to 12th grade';
        } else if ($readingEase < 70) {
            $description = '8th & 9th grade';
        } else if ($readingEase < 80) {
            $description = '7th grade';
        } else if ($readingEase < 90) {
            $description = '6th grade';
        } else if ($readingEase > 90) {
            $description = '5th grade';
        }

        return $description;
    }

    public function cleanText(string $content): string
    {
        if (empty($content)) {
            return '';
        }
        
        return Text::cleanText($content);
    }

    public function characterCount(string $content): int
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        
        return Text::characterCount($content);
    }

    public function letterCount(string $content): int
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return Text::letterCount($content);
    }

    public function syllableCount(string $word): int
    {
        if (empty($word)) {
            return '';
        }

        $content = StringHelper::stripHtml($word);
        return (new TextStatistics())->syllableCount($content);
    }

    public function averageSyllablesPerWord(string $content): float
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->averageSyllablesPerWord($content);
    }

    public function percentageWordsWithThreeSyllables(string $content): float
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->percentageWordsWithThreeSyllables($content);
    }

    public function sentenceCount(string $content): int
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->sentenceCount($content);
    }

    public function averageWordsPerSentence(string $content): float
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->averageWordsPerSentence($content);
    }

    public function gradeLevel(string $content): float
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->flesch_kincaid_grade_level($content);
    }

    public function gunningFogScore(string $content): float
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->gunning_fog_score($content);
    }

    public function colemanLiauIndex(string $content): float
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->coleman_liau_index($content);
    }

    public function smogIndex(string $content): float
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->smog_index($content);
    }

    public function automatedReadabilityIndex(string $content): float
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->automated_readability_index($content);
    }

    public function daleChallReadabilityScore(string $content): float|int|string
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->daleChallReadabilityScore($content);
    }

    public function spacheReadabilityScore(string $content): float|int|string
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        return (new TextStatistics())->spacheReadabilityScore($content);
    }
    
    public function wordCount(string $content): int
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        
        return Text::wordCount($content);
    }

    public function readingTime(string $content): int
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);

        // https://en.wikipedia.org/wiki/Reading_%28process%29#Reading_rate
        // Rates of reading include reading for memorization (fewer than 100 words per minute [wpm]); reading for learning (100–200 wpm); reading for comprehension (200–400 wpm); and skimming (400–700 wpm). Reading for comprehension is the essence of the daily reading of most people. Skimming is for superficially processing large quantities of text at a low level of comprehension (below 50%).
         
        $readingRate = 0; // words per minute
        $readingEase = $this->readingEase($content);
        $wordCount = $this->wordCount($content);

        if ($readingEase < 20) {
           $readingRate = 100;
        } else if ($readingEase < 50) {
            $readingRate = 200;
        } else if ($readingEase < 60) {
            $readingRate = 300;
        } else if ($readingEase < 70) {
           $readingRate = 350;
        } else if ($readingEase < 80) {
            $readingRate = 400;
        } else if ($readingEase < 90) {
            $readingRate = 500;
        } else if ($readingEase > 90) {
            $readingRate = 600;
        }

        $min = ($wordCount / $readingRate);

        return floor($min * 60);
    }

    public function humanReadingTime(string $content): ?string
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        $seconds = $this->readingTime($content);

        return Craft::$app->getFormatter()->asDuration($seconds);
    }

    public function averageReadingTime(string $content): int
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);

        // http://www.healthguidance.org/entry/13263/1/What-Is-the-Average-Reading-Speed-and-the-Best-Rate-of-Reading.html         
        $readingRate = 250; // words per minute
        $wordCount = $this->wordCount($content);

        $min = ($wordCount / $readingRate);

        return floor($min * 60);
    }

    public function humanAverageReadingTime(string $content): ?string
    {
        if (empty($content)) {
            return '';
        }

        $content = StringHelper::stripHtml($content);
        $seconds = $this->averageReadingTime($content);

        return Craft::$app->getFormatter()->asDuration($seconds);
    }
}
