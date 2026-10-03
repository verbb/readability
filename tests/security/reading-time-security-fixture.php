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

function readingTimeFixtureAssert(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$service = new Service();
$exactBoundaryContent = 'table table table table. cat cat cat cat. cat cat cat cat.';

readingTimeFixtureAssert($service->readingEase($exactBoundaryContent) === 90.0, 'The fixture must produce an exact reading-ease score of 90.0.');
readingTimeFixtureAssert($service->readingEaseDescription($exactBoundaryContent) === 'Easy to read. Conversational English for consumers.', 'An exact score of 90.0 must retain the upper easy-reading band.');
readingTimeFixtureAssert($service->schoolLevel($exactBoundaryContent) === '6th grade', 'An exact score of 90.0 must retain the sixth-grade band.');
readingTimeFixtureAssert($service->readingTime($exactBoundaryContent) === 1, 'An exact score of 90.0 must produce a finite reading time.');

$originalApp = Craft::$app;

try {
    Craft::$app = new class {
        public function getFormatter(): object
        {
            return new class {
                public function asDuration(int $seconds): string
                {
                    return "duration:$seconds";
                }
            };
        }
    };

    readingTimeFixtureAssert($service->humanReadingTime($exactBoundaryContent) === 'duration:1', 'Human-readable timing must use the finite exact-boundary result.');
} finally {
    Craft::$app = $originalApp;
}

$topBandContent = 'cat cat cat.';

readingTimeFixtureAssert($service->readingEase($topBandContent) > 90, 'The control fixture must remain above the exact boundary.');
readingTimeFixtureAssert($service->readingEaseDescription($topBandContent) === 'Very easy to read. Easily understood by an average 11-year-old student.', 'Scores above 90 must retain the very-easy band.');
readingTimeFixtureAssert($service->schoolLevel($topBandContent) === '5th grade', 'Scores above 90 must retain the fifth-grade band.');

echo "Readability reading-time security fixture passed.\n";
