<?php
namespace verbb\readability\twigextensions;

use verbb\readability\Readability;

use craft\helpers\Template;

use Twig\Extension\AbstractExtension;
use Twig\Markup;
use Twig\TwigFilter;
use Twig\TwigFunction;

class Extension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    public function getName(): string
    {
        return 'Readability';
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('readingEase', [$this, 'readingEase']),
            new TwigFilter('readingEaseDescription', [$this, 'readingEaseDescription']),
            new TwigFilter('schoolLevel', [$this, 'schoolLevel']),
            new TwigFilter('cleanText', [$this, 'cleanText']),
            new TwigFilter('characterCount', [$this, 'characterCount']),
            new TwigFilter('letterCount', [$this, 'letterCount']),
            new TwigFilter('syllableCount', [$this, 'syllableCount']),
            new TwigFilter('averageSyllablesPerWord', [$this, 'averageSyllablesPerWord']),
            new TwigFilter('percentageWordsWithThreeSyllables', [$this, 'percentageWordsWithThreeSyllables']),
            new TwigFilter('sentenceCount', [$this, 'sentenceCount']),
            new TwigFilter('averageWordsPerSentence', [$this, 'averageWordsPerSentence']),
            new TwigFilter('gradeLevel', [$this, 'gradeLevel']),
            new TwigFilter('gunningFogScore', [$this, 'gunningFogScore']),
            new TwigFilter('colemanLiauIndex', [$this, 'colemanLiauIndex']),
            new TwigFilter('smogIndex', [$this, 'smogIndex']),
            new TwigFilter('automatedReadabilityIndex', [$this, 'automatedReadabilityIndex']),
            new TwigFilter('daleChallReadabilityScore', [$this, 'daleChallReadabilityScore']),
            new TwigFilter('spacheReadabilityScore', [$this, 'spacheReadabilityScore']),
            new TwigFilter('wordCount', [$this, 'wordCount']),
            new TwigFilter('readingTime', [$this, 'readingTime']),
            new TwigFilter('humanReadingTime', [$this, 'humanReadingTime']),
            new TwigFilter('averageReadingTime', [$this, 'averageReadingTime']),
            new TwigFilter('humanAverageReadingTime', [$this, 'humanAverageReadingTime']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('readingEase', [$this, 'readingEase']),
            new TwigFunction('readingEaseDescription', [$this, 'readingEaseDescription']),
            new TwigFunction('schoolLevel', [$this, 'schoolLevel']),
            new TwigFunction('cleanText', [$this, 'cleanText']),
            new TwigFunction('characterCount', [$this, 'characterCount']),
            new TwigFunction('letterCount', [$this, 'letterCount']),
            new TwigFunction('syllableCount', [$this, 'syllableCount']),
            new TwigFunction('averageSyllablesPerWord', [$this, 'averageSyllablesPerWord']),
            new TwigFunction('percentageWordsWithThreeSyllables', [$this, 'percentageWordsWithThreeSyllables']),
            new TwigFunction('sentenceCount', [$this, 'sentenceCount']),
            new TwigFunction('averageWordsPerSentence', [$this, 'averageWordsPerSentence']),
            new TwigFunction('gradeLevel', [$this, 'gradeLevel']),
            new TwigFunction('gunningFogScore', [$this, 'gunningFogScore']),
            new TwigFunction('colemanLiauIndex', [$this, 'colemanLiauIndex']),
            new TwigFunction('smogIndex', [$this, 'smogIndex']),
            new TwigFunction('automatedReadabilityIndex', [$this, 'automatedReadabilityIndex']),
            new TwigFunction('daleChallReadabilityScore', [$this, 'daleChallReadabilityScore']),
            new TwigFunction('spacheReadabilityScore', [$this, 'spacheReadabilityScore']),
            new TwigFunction('wordCount', [$this, 'wordCount']),
            new TwigFunction('readingTime', [$this, 'readingTime']),
            new TwigFunction('humanReadingTime', [$this, 'humanReadingTime']),
            new TwigFunction('averageReadingTime', [$this, 'averageReadingTime']),
            new TwigFunction('humanAverageReadingTime', [$this, 'humanAverageReadingTime']),
        ];
    }

    public function readingEase(string $content): float
    {
        return Readability::$plugin->getService()->readingEase($content);
    }

    public function readingEaseDescription(string $content): Markup
    {
        return Template::raw(Readability::$plugin->getService()->readingEaseDescription($content));
    }
    
    public function schoolLevel(string $content): Markup
    {
        return Template::raw(Readability::$plugin->getService()->schoolLevel($content));
    }

    public function cleanText(string $content): Markup
    {
        return Template::raw(Readability::$plugin->getService()->cleanText($content));
    }
    
    public function characterCount(string $content): int
    {
        return Readability::$plugin->getService()->characterCount($content);
    }
    
    public function letterCount(string $content): int
    {
        return Readability::$plugin->getService()->letterCount($content);
    }

    public function syllableCount(string $word): int
    {
        return Readability::$plugin->getService()->syllableCount($word);
    }

    public function averageSyllablesPerWord(string $content): float
    {
        return Readability::$plugin->getService()->averageSyllablesPerWord($content);
    }
    
    public function percentageWordsWithThreeSyllables(string $content): float
    {
        return Readability::$plugin->getService()->percentageWordsWithThreeSyllables($content);
    }
    
    public function sentenceCount(string $content): int
    {
        return Readability::$plugin->getService()->sentenceCount($content);
    }

    public function averageWordsPerSentence(string $content): float
    {
        return Readability::$plugin->getService()->averageWordsPerSentence($content);
    }

    public function gradeLevel(string $content): float
    {
        return Readability::$plugin->getService()->gradeLevel($content);
    }

    public function gunningFogScore(string $content): float
    {
        return Readability::$plugin->getService()->gunningFogScore($content);
    }

    public function colemanLiauIndex(string $content): float
    {
        return Readability::$plugin->getService()->colemanLiauIndex($content);
    }

    public function smogIndex(string $content): float
    {
        return Readability::$plugin->getService()->smogIndex($content);
    }

    public function automatedReadabilityIndex(string $content): float
    {
        return Readability::$plugin->getService()->automatedReadabilityIndex($content);
    }

    public function daleChallReadabilityScore(string $content): float|int|string
    {
        return Readability::$plugin->getService()->daleChallReadabilityScore($content);
    }

    public function spacheReadabilityScore(string $content): float|int|string
    {
        return Readability::$plugin->getService()->spacheReadabilityScore($content);
    }

    public function wordCount(string $content): int
    {
        return Readability::$plugin->getService()->wordCount($content);
    }

    public function readingTime(string $content): int
    {
        return Readability::$plugin->getService()->readingTime($content);
    }

    public function humanReadingTime(string $content): ?string
    {
        return Readability::$plugin->getService()->humanReadingTime($content);
    }

    public function averageReadingTime(string $content): int
    {
        return Readability::$plugin->getService()->averageReadingTime($content);
    }

    public function humanAverageReadingTime(string $content): ?string
    {
        return Readability::$plugin->getService()->humanAverageReadingTime($content);
    }
}
