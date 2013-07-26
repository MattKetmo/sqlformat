# SQL Format

This is a CLI adaptation of the [SqlFormatter](http://jdorn.github.io/sql-formatter/) library.
Like the basic [cli example](https://github.com/jdorn/sql-formatter/blob/bccca26bfe75b30aba71c2f734e9f9dd854a85f6/examples/examples.php),
but with more options.

# Install

1. Install [Box](http://box-project.org/) — more info on [my blog](http://moquet.net/blog/distributing-php-cli/)
2. Build the PHAR: `box build`
3. Move to your path — eg. `mv sqlformat.phar /usr/local/bin/sqlformat`

# Usage

    Usage:
      $basename [--no-format] [--no-highlight] [<sql>]
      $basename [--no-comment] [--no-highlight] [<sql>]
      $basename [-c | --compress] [<sql>]
      $basename [-h | --help]

    Options:
      --no-highlight  Disable highlight.
      --no-format     Disable auto formatting.
      --no-comment    Remove comment.
      -c --compress   Compress SQL request.
      -h --help       Display this help.

# Examples

    $ echo "SELECT name FROM users WHERE id > 10" | sqlformat
    SELECT
      name
    FROM
      users
    WHERE
      id > 10

    $ cat example.sql
    -- foobar request
    SELECT foobar FROM barbaz
    WHERE count > 20   -- super comment
      AND name = 'john'  -- find john

    $ cat example.sql | sqlformat -c
    SELECT foobar FROM barbaz WHERE count > 20 AND name = 'john'

# Credits

- [Jeremy Dorn](https://github.com/jdorn) for the SqlFormatter library
- [Blake Williams](https://github.com/shabbyrobe) For the Docopts PHP implementation

# License

    The MIT License (MIT)

    Copyright (c) 2013 Matthieu Moquet

    Permission is hereby granted, free of charge, to any person obtaining a copy of
    this software and associated documentation files (the "Software"), to deal in
    the Software without restriction, including without limitation the rights to
    use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
    the Software, and to permit persons to whom the Software is furnished to do so,
    subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
    FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
    COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
    IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
    CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
