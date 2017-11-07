<?php
/**
 * Readability plugin for Craft CMS 3.x
 *
 * Get statistics on your text.
 *
 * @link      https://github.com/mikestecker
 * @copyright Copyright (c) 2017 Mike Stecker
 */

namespace mikestecker\readability\twigextensions;

use mikestecker\readability\Readability;

use craft\helpers\Template;

/**
 * @author    Mike Stecker
 * @package   Readability
 * @since     1.0.0
 */
class ReadabilityTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Readability';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('readingEase', [$this, 'readingEase']),
            new \Twig_SimpleFilter('readingEaseDescription', [$this, 'readingEaseDescription']),
            new \Twig_SimpleFilter('schoolLevel', [$this, 'schoolLevel']),
            new \Twig_SimpleFilter('cleanText', [$this, 'cleanText']),
            new \Twig_SimpleFilter('characterCount', [$this, 'characterCount']),
            new \Twig_SimpleFilter('letterCount', [$this, 'letterCount']),
            new \Twig_SimpleFilter('syllableCount', [$this, 'syllableCount']),
            new \Twig_SimpleFilter('averageSyllablesPerWord', [$this, 'averageSyllablesPerWord']),
            new \Twig_SimpleFilter('percentageWordsWithThreeSyllables', [$this, 'percentageWordsWithThreeSyllables']),
            new \Twig_SimpleFilter('sentenceCount', [$this, 'sentenceCount']),
            new \Twig_SimpleFilter('averageWordsPerSentence', [$this, 'averageWordsPerSentence']),
            new \Twig_SimpleFilter('gradeLevel', [$this, 'gradeLevel']),
            new \Twig_SimpleFilter('gunningFogScore', [$this, 'gunningFogScore']),
            new \Twig_SimpleFilter('colemanLiauIndex', [$this, 'colemanLiauIndex']),
            new \Twig_SimpleFilter('smogIndex', [$this, 'smogIndex']),
            new \Twig_SimpleFilter('automatedReadabilityIndex', [$this, 'automatedReadabilityIndex']),
            new \Twig_SimpleFilter('daleChallReadabilityScore', [$this, 'daleChallReadabilityScore']),
            new \Twig_SimpleFilter('spacheReadabilityScore', [$this, 'spacheReadabilityScore']),
            new \Twig_SimpleFilter('wordCount', [$this, 'wordCount']),
            new \Twig_SimpleFilter('readingTime', [$this, 'readingTime']),
            new \Twig_SimpleFilter('humanReadingTime', [$this, 'humanReadingTime']),
            new \Twig_SimpleFilter('averageReadingTime', [$this, 'averageReadingTime']),
            new \Twig_SimpleFilter('humanAverageReadingTime', [$this, 'humanAverageReadingTime']),
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('readingEase', [$this, 'readingEase']),
            new \Twig_SimpleFunction('readingEaseDescription', [$this, 'readingEaseDescription']),
            new \Twig_SimpleFunction('schoolLevel', [$this, 'schoolLevel']),
            new \Twig_SimpleFunction('cleanText', [$this, 'cleanText']),
            new \Twig_SimpleFunction('characterCount', [$this, 'characterCount']),
            new \Twig_SimpleFunction('letterCount', [$this, 'letterCount']),
            new \Twig_SimpleFunction('syllableCount', [$this, 'syllableCount']),
            new \Twig_SimpleFunction('averageSyllablesPerWord', [$this, 'averageSyllablesPerWord']),
            new \Twig_SimpleFunction('percentageWordsWithThreeSyllables', [$this, 'percentageWordsWithThreeSyllables']),
            new \Twig_SimpleFunction('sentenceCount', [$this, 'sentenceCount']),
            new \Twig_SimpleFunction('averageWordsPerSentence', [$this, 'averageWordsPerSentence']),
            new \Twig_SimpleFunction('gradeLevel', [$this, 'gradeLevel']),
            new \Twig_SimpleFunction('gunningFogScore', [$this, 'gunningFogScore']),
            new \Twig_SimpleFunction('colemanLiauIndex', [$this, 'colemanLiauIndex']),
            new \Twig_SimpleFunction('smogIndex', [$this, 'smogIndex']),
            new \Twig_SimpleFunction('automatedReadabilityIndex', [$this, 'automatedReadabilityIndex']),
            new \Twig_SimpleFunction('daleChallReadabilityScore', [$this, 'daleChallReadabilityScore']),
            new \Twig_SimpleFunction('spacheReadabilityScore', [$this, 'spacheReadabilityScore']),
            new \Twig_SimpleFunction('wordCount', [$this, 'wordCount']),
            new \Twig_SimpleFunction('readingTime', [$this, 'readingTime']),
            new \Twig_SimpleFunction('humanReadingTime', [$this, 'humanReadingTime']),
            new \Twig_SimpleFunction('averageReadingTime', [$this, 'averageReadingTime']),
            new \Twig_SimpleFunction('humanAverageReadingTime', [$this, 'humanAverageReadingTime']),
        ];
    }

    /**
     * @param $content
     *
     * @return float
     */
    public function readingEase($content)
    {
        return Template::raw(Readability::$plugin->readability->readingEase($content));
    }

    public function readingEaseDescription($content)
    {
        return Template::raw(Readability::$plugin->readability->readingEaseDescription($content));
    }
    
    public function schoolLevel($content)
    {
        return Template::raw(Readability::$plugin->readability->schoolLevel($content));
    }

    public function cleanText($content)
    {
        return Template::raw(Readability::$plugin->readability->cleanText($content));
    }
    

    public function characterCount($content)
    {
        return Template::raw(Readability::$plugin->readability->characterCount($content));
    }
    

    public function letterCount($content)
    {
        return Template::raw(Readability::$plugin->readability->letterCount($content));
    }
    

    public function syllableCount( string $word )
    {
        return Template::raw(Readability::$plugin->readability->syllableCount($word));
    }
    

    public function averageSyllablesPerWord($content)
    {
        return Template::raw(Readability::$plugin->readability->averageSyllablesPerWord($content));
    }
    

    public function percentageWordsWithThreeSyllables($content)
    {
        return Template::raw(Readability::$plugin->readability->percentageWordsWithThreeSyllables($content));
    }
    

    public function sentenceCount($content)
    {
        return Template::raw(Readability::$plugin->readability->sentenceCount($content));
    }


    public function averageWordsPerSentence($content)
    {
        return Template::raw(Readability::$plugin->readability->averageWordsPerSentence($content));
    }


    public function gradeLevel($content)
    {
        return Template::raw(Readability::$plugin->readability->gradeLevel($content));
    }


    public function gunningFogScore($content)
    {
        return Template::raw(Readability::$plugin->readability->gunningFogScore($content));
    }


    public function colemanLiauIndex($content)
    {
        return Template::raw(Readability::$plugin->readability->colemanLiauIndex($content));
    }


    public function smogIndex($content)
    {
        return Template::raw(Readability::$plugin->readability->smogIndex($content));
    }


    public function automatedReadabilityIndex($content)
    {
        return Template::raw(Readability::$plugin->readability->automatedReadabilityIndex($content));
    }


    public function daleChallReadabilityScore($content)
    {
        return Template::raw(Readability::$plugin->readability->daleChallReadabilityScore($content));
    }


    public function spacheReadabilityScore($content)
    {
        return Template::raw(Readability::$plugin->readability->spacheReadabilityScore($content));
    }


    public function wordCount($content)
    {
        return Template::raw(Readability::$plugin->readability->wordCount($content));
    }

    /**
     * @param $content
     *
     * @return string
     */
    public function readingTime($content)
    {
        return Template::raw(Readability::$plugin->readability->readingTime($content));
    }

    /**
     * @param $content
     *
     * @return string
     */
    public function humanReadingTime($content)
    {
        return Template::raw(Readability::$plugin->readability->humanReadingTime($content));
    }

    /**
     * @param $content
     *
     * @return string
     */
    public function averageReadingTime($content)
    {
        return Template::raw(Readability::$plugin->readability->averageReadingTime($content));
    }

    /**
     * @param $content
     *
     * @return string
     */
    public function humanAverageReadingTime($content)
    {
        return Template::raw(Readability::$plugin->readability->humanAverageReadingTime($content));
    }
}
