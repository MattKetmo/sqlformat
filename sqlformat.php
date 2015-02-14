#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';

$version = "@package_version@";
$basename = basename($argv[0]);

$doc = <<<DOC
Usage:
  $basename [--no-format] [--no-highlight] [<sql>]
  $basename [--no-comment] [--no-highlight] [<sql>]
  $basename [-c|--compress] [<sql>]
  $basename [-h | --help]
  $basename [--version]

Options:
  --no-highlight  Disable highlight.
  --no-format     Disable auto formatting.
  --no-comment    Remove comment.
  -c --compress   Compress SQL request.
  -h --help       Display this help.
  -V --version    Show the version
DOC;

$handler = new Docopt\Handler();
$args = $handler->handle($doc);

// Show version
if ($args['--version']) {
  echo "$basename $version\n";
  return;
}

// Get SQL request for arguments or from stdin
$sql = $args['<sql>'] ?: stream_get_contents(fopen("php://stdin", "r"));

// Compress
if ($args['--compress']) {
    echo SqlFormatter::compress($sql);
    return;
}

// No formatting
if ($args['--no-format']) {
    echo $args['--no-highlight'] ? $sql : SqlFormatter::highlight($sql);
    return;
}

// No comment (implies format is enabled)
if ($args['--no-comment']) {
    $sql = SqlFormatter::removeComments($sql);
}

echo SqlFormatter::format($sql, !$args['--no-highlight']);
