# Readability plugin for Craft CMS 3.x

The Readability plugin will help you to indentify issues with your website content, especially with readability.

It allows you to measure the readability of text using common scoring systems, including:

- Flesch Kincaid Reading Ease
- Flesch Kincaid Grade Level
- Gunning Fog Score
- Coleman Liau Index
- SMOG Index
- Automated Reability Index
- Dale-Chall Readability Score
- Spache Readability Score

You can learn more about these [here](https://raventools.com/blog/ultimate-list-of-online-content-readability-tests/).

![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require mikestecker/craft3-readability

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Readability.

## Readability Overview

This plugin was born out of me wanting a simple read time on text. When I discovered the [Text Statistics](https://github.com/DaveChild/Text-Statistics) library, I decided to wrap most everything in here.

## Configuring Readability

There is nothing to configure.

## Using Readability

### Measuring Readability

#### Flesch Kincaid Reading Ease

This is one of the oldest readability scores, commonly used in academics and government and incorporated into most word processing software. The Flesch-Kincaid Reading Ease score is the result of a mathematical formula that incorporates the average number of syllables per word and the average number of words per sentence for a 100-word block of text. Results are measured on a scale of 1-100.

`Flesch-Kincaid Reading Ease:  {{ someContent | readingEase }}`

#### Flesch-Kincaid Grade Level

Like the Flesch-Kincaid Reading Ease score, this is a mathematical formula that measures syllables and sentence length. However, the results are given as an academic grade level, from 0-12. Negative results are rated at 0, and any grade level over 12 is listed as 12. The Flesch-Kincaid Grade Level score was developed after the Reading Ease score to make it easier for parents, librarians and others to make decisions about reading content for children.

`Flesch-Kincaid Grade Level:  {{ someContent | schoolLevel }}`

#### Gunning Fog Index

The Gunning Fog Index takes into account “complex” words, those with three or more syllables, as part of its mathematical formula for readability. It also omits proper nouns, jargon and compound words. The result? A grade-level score from 1-unlimited.

`Gunning Fog Index:  {{ someContent | gunningFogScore }}`

#### Coleman Liau Index

Unlike most other readability tests, the Coleman Liau Index relies on number of characters instead of syllables per word for its calculation. It returns a U.S. grade-level score from 1-12.

`Coleman Liau Index:  {{ someContent | colemanLiauIndex }}`

#### SMOG Index

It’s [debatable](http://www.readabilityformulas.com/smog-readability-formula.php) whether SMOG is short for “Simple Measure of Gobbledygook,” but this index developed in 1969 is still a common measure of readability. Take 30 sentences (10 from the beginning, middle and end of your text), then count every word with three or more syllables in each group of sentences, then calculate the square root of that number and round it to the nearest 10, then add 3 to that number. Voila! You have the U.S. grade level that should be able to read that text. (And that’s one of the simpler of these readability formulas.)

`SMOG Index:  {{ someContent | smogIndex }}`

#### Automated Readability Index

The Automated Readability Index (ARI) mathematical formula has two variables: characters per word (instead of syllables, similar to the Coleman Liau Index) and words per sentence. It has been around since 1967. Its scores correspond to U.S. grade levels. If you get a score result with a decimal, round up to the next whole number.

`Automated Readability Index:  {{ someContent | automatedReadabilityIndex }}`

### Measuring How Long It Should Take To Read

Measuring how long it takes to read is based off the Flesch-Kincaid Reading Ease. According to [this Wikipedia article](https://en.wikipedia.org/wiki/Reading_%28process%29#Reading_rate), rates of reading include reading for memorization (fewer than 100 words per minute [wpm]); reading for learning (100–200 wpm); reading for comprehension (200–400 wpm); and skimming (400–700 wpm). Reading for comprehension is the essence of the daily reading of most people. Skimming is for superficially processing large quantities of text at a low level of comprehension (below 50%).

The estimated words per minute using the `humanReadingTime` filter takes the Flesch-Kincaid Reading Ease score and uses this to determine how easy the content is to read. If it's deemed more difficult to read, the calculated WPM is lowered and likewise, if the content is easy to read, then the WPM is increased.

`How long will it take to read?  {{ someContent | humanReadingTime }}`

If you just want a simple average reading time, I made a new function to do simple math based off an [average of 250 words per minute](http://www.healthguidance.org/entry/13263/1/What-Is-the-Average-Reading-Speed-and-the-Best-Rate-of-Reading.html).

`How long will it take to read?  {{ someContent | humanAverageReadingTime }}`

### More Text Shenanigans!

#### Count Syllables

`{{ someContent | syllableCount }}`

#### Character, Letter, Sentence, Word Counts

`{{ someContent | characterCount }}`

`{{ someContent | letterCount }}`

`{{ someContent | wordCount }}`

`{{ someContent | sentenceCount }}`

#### Bonus tip!

Thanks to Andrew Welch ([@nystudio107](https://github.com/nystudio107)) for [pointing out](https://twitter.com/nystudio107/status/927900726059307010) that with any of these twig filters, you can wrap multiple output fields Twig's special [`filter`](https://twig.symfony.com/doc/2.x/tags/filter.html) section:

```
{% filter humanAverageReadingTime %}
	{{ entry.intro }}
	{{ entry.body }}
	{{ entry.matrixField }}
	...
{% endfilter %}
```

## Readability Roadmap

Some things to do, and ideas for potential features:

* Release it
* Clean up the code
* Get feedback from others & make any necessary changes/improvements
* Possibly add a widget inside of Craft's entry editor that scores your content ahead of time?

Brought to you by [Mike Stecker](https://github.com/mikestecker)
