# Usage
Readability estimates how difficult a passage may be to read using measures such as sentence length and word length. Use it to compare drafts, alongside reading the text yourself; a score cannot tell you whether an explanation is accurate or answers the reader's question.

For example, put this in a development Twig template to inspect a short passage:

```twig
{% set someContent = 'Visit the studio on Saturday. Bring a notebook. We will provide the tools you need for the workshop.' %}

<p>Reading ease: {{ someContent | readingEase }}</p>
<p>{{ someContent | readingEaseDescription }}</p>
```

Replace the passage with your own text and compare the result after revising a long sentence. The examples below use the same `someContent` variable. Very short samples can produce unstable scores, so assess a representative passage rather than treating a single sentence as a verdict.

## Measuring Readability

### Flesch Kincaid Reading Ease
This is one of the oldest readability scores, commonly used in academics and government and incorporated into most word processing software. The Flesch-Kincaid Reading Ease score is the result of a mathematical formula that incorporates the average number of syllables per word and the average number of words per sentence for a 100-word block of text. Higher reading-ease scores generally indicate easier text. The formula is not a guarantee that every input produces a value within 1–100.

```twig
{{ someContent | readingEase }}
```

<span id="flesch-kincaid-grade-level"></span>

### School Level

`schoolLevel` returns a descriptive school-level label derived from the reading-ease score, such as “8th & 9th grade”. It is a guide to interpreting that score, not a separate numeric grade calculation.

```twig
{{ someContent | schoolLevel }}
```

### Gunning Fog Index

The Gunning Fog Index takes into account “complex” words, those with three or more syllables, as part of its mathematical formula for readability. It also omits proper nouns, jargon and compound words. The result is a grade-level estimate.

```twig
{{ someContent | gunningFogScore }}
```

### Coleman Liau Index
Unlike most other readability tests, the Coleman Liau Index relies on number of characters instead of syllables per word for its calculation. It returns a U.S. grade-level estimate.

```twig
{{ someContent | colemanLiauIndex }}
```

### SMOG Index
SMOG estimates reading level using words with three or more syllables. Use a sufficiently long passage and compare it with the other measures rather than treating its result as a precise description of every reader.

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
