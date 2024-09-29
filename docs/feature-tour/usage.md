# Usage
Readability provide a number of Twig filters to use, for a variety of different use-cases.

## Measuring Readability

### Flesch Kincaid Reading Ease
This is one of the oldest readability scores, commonly used in academics and government and incorporated into most word processing software. The Flesch-Kincaid Reading Ease score is the result of a mathematical formula that incorporates the average number of syllables per word and the average number of words per sentence for a 100-word block of text. Results are measured on a scale of 1-100.

```twig
{{ someContent | readingEase }}
```

### Flesch-Kincaid Grade Level
Like the Flesch-Kincaid Reading Ease score, this is a mathematical formula that measures syllables and sentence length. However, the results are given as an academic grade level, from 0-12. Negative results are rated at 0, and any grade level over 12 is listed as 12. The Flesch-Kincaid Grade Level score was developed after the Reading Ease score to make it easier for parents, librarians and others to make decisions about reading content for children.

```twig
{{ someContent | schoolLevel }}
```

### Gunning Fog Index

The Gunning Fog Index takes into account “complex” words, those with three or more syllables, as part of its mathematical formula for readability. It also omits proper nouns, jargon and compound words. The result? A grade-level score from 1-unlimited.

```twig
{{ someContent | gunningFogScore }}
```

### Coleman Liau Index
Unlike most other readability tests, the Coleman Liau Index relies on number of characters instead of syllables per word for its calculation. It returns a U.S. grade-level score from 1-12.

```twig
{{ someContent | colemanLiauIndex }}
```

### SMOG Index
It’s [debatable](http://www.readabilityformulas.com/smog-readability-formula.php) whether SMOG is short for “Simple Measure of Gobbledygook,” but this index developed in 1969 is still a common measure of readability. Take 30 sentences (10 from the beginning, middle and end of your text), then count every word with three or more syllables in each group of sentences, then calculate the square root of that number and round it to the nearest 10, then add 3 to that number. Voila! You have the U.S. grade level that should be able to read that text. (And that’s one of the simpler of these readability formulas.)

```twig
{{ someContent | smogIndex }}
```

### Automated Readability Index
The Automated Readability Index (ARI) mathematical formula has two variables: characters per word (instead of syllables, similar to the Coleman Liau Index) and words per sentence. It has been around since 1967. Its scores correspond to U.S. grade levels. If you get a score result with a decimal, round up to the next whole number.

```twig
{{ someContent | automatedReadabilityIndex }}
```

### Dale-Chall Readability Score
The Dale-Chall formula is a vocabulary-based readability formula, matching its own list of words to the words in the material being evaluated, to determine the appropriate grade level. In addition, the Dale-Chall formula factors in the total number of words and sentences, arriving at an average sentence length.

```twig
{{ someContent | daleChallReadabilityScore }}
```

### Spache Readability Score
The formula calculates the grade level of a text sample based on sentence length and number of unfamiliar words. The Spache Formula considers “unfamiliar words” as words that 3rd grade and below do not recognize. The Spache Formula is best used to calculate the difficulty of text that falls at the 3rd grade level or below.

```twig
{{ someContent | spacheReadabilityScore }}
```

## Reading Time
Measuring how long it takes to read is based off the Flesch-Kincaid Reading Ease. According to [this Wikipedia article](https://en.wikipedia.org/wiki/Reading_%28process%29#Reading_rate), rates of reading include reading for memorization (fewer than 100 words per minute [wpm]); reading for learning (100–200 wpm); reading for comprehension (200–400 wpm); and skimming (400–700 wpm). Reading for comprehension is the essence of the daily reading of most people. Skimming is for superficially processing large quantities of text at a low level of comprehension (below 50%).

The estimated words per minute using the `humanReadingTime` filter takes the Flesch-Kincaid Reading Ease score and uses this to determine how easy the content is to read. If it's deemed more difficult to read, the calculated WPM is lowered and likewise, if the content is easy to read, then the WPM is increased.

```twig
{{ someContent | humanReadingTime }} {# 1 minute, 26 seconds #}
```

If you prefer to see this in the number of seconds only, use the filter `readingTime`.

If you just want a simple average reading time, I made a new function to do simple math based off an [average of 250 words per minute](http://www.healthguidance.org/entry/13263/1/What-Is-the-Average-Reading-Speed-and-the-Best-Rate-of-Reading.html).

```twig
{{ someContent | humanAverageReadingTime }} {# 2 minutes, 17 seconds #}
```

If you prefer to see this in the number of seconds only, use the filter `averageReadingTime`.

## Counting

```twig
{{ someContent | syllableCount }}
{{ someContent | characterCount }}
{{ someContent | letterCount }}
{{ someContent | wordCount }}
{{ someContent | sentenceCount }}
```
