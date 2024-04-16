<?php


if (!function_exists('calculateReadingTime')) {
    function calculateReadingTime($content)
    {
        // Calculate the number of words in the content
        $wordCount = str_word_count(strip_tags($content));

        // Average reading speed in words per minute
        $wordsPerMinute = 100;

        // Adjust reading speed based on content characteristics
        // For example, reduce speed if there are many images
        // Adjust this value based on your content's characteristics
        $contentAdjustment = 0.8;

        // Calculate reading time
        $readingTime = ceil($wordCount / ($wordsPerMinute * $contentAdjustment));

        return $readingTime;
    }
}

if (!function_exists('readMore')) {
    function readMore($content)
    {

        $contentArr = explode('.', $content);

        $readMoreText = "";

        if (str_word_count(strip_tags($contentArr[0])) < 30) {

            for ($i = 0; $i < 3; $i++) {
                $readMoreText .= $contentArr[$i] . ". ";
            }
            return $readMoreText;
        } else {
            return $contentArr[0] . ".";
        }
    }

}