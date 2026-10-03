<?php

use verbb\readability\services\Service;

$vendorPath = getenv('VERBB_READABILITY_TEST_VENDOR') ?: dirname(__DIR__, 2) . '/vendor';

if (!is_file($vendorPath . '/autoload.php')) {
    throw new RuntimeException('Set VERBB_READABILITY_TEST_VENDOR to a Craft 5 vendor directory.');
}

require $vendorPath . '/autoload.php';
require $vendorPath . '/yiisoft/yii2/Yii.php';
require $vendorPath . '/craftcms/cms/src/Craft.php';
require dirname(__DIR__, 2) . '/src/services/Service.php';

function emptyContentFixtureAssert(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$service = new Service();
$numericMethods = [
    'readingEase' => 0.0,
    'characterCount' => 0,
    'letterCount' => 0,
    'syllableCount' => 0,
    'averageSyllablesPerWord' => 0.0,
    'percentageWordsWithThreeSyllables' => 0.0,
    'sentenceCount' => 0,
    'averageWordsPerSentence' => 0.0,
    'gradeLevel' => 0.0,
    'gunningFogScore' => 0.0,
    'colemanLiauIndex' => 0.0,
    'smogIndex' => 0.0,
    'automatedReadabilityIndex' => 0.0,
    'wordCount' => 0,
    'readingTime' => 0,
    'averageReadingTime' => 0,
];
$textMethods = [
    'readingEaseDescription',
    'schoolLevel',
    'cleanText',
    'daleChallReadabilityScore',
    'spacheReadabilityScore',
    'humanReadingTime',
    'humanAverageReadingTime',
];

foreach (['', '0'] as $content) {
    foreach ($numericMethods as $method => $expected) {
        emptyContentFixtureAssert($service->$method($content) === $expected, "$method must return a type-safe zero for empty content.");
    }

    foreach ($textMethods as $method) {
        emptyContentFixtureAssert($service->$method($content) === '', "$method must preserve its empty-string result for empty content.");
    }
}

echo "Readability empty-content fixture passed.\n";
