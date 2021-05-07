# Kirby 3 Countries list

A little utility to add work with countries in Kirby (Fields/localization)

## Installation

- unzip [master.zip](https://github.com/bvdputte/kirby-countries/archive/master.zip) as folder `site/plugins/kirby-countries` or
- `git submodule add https://github.com/bvdputte/kirby-countries.git site/plugins/kirby-countries`

### Add necessary country data

This plugin is built around the php files from the [Umpirsky country-list project](https://github.com/umpirsky/country-list).
You need to copy over the necessary files from that project to `/site/plugins/country-list` according the directory structure from that project.

E.g. for English ("en") this would become: `/site/plugins/country-list/data/en/country.php`.

You can also pull in the entire umpirsky dataset, but keep in mind that this adds a hefty +80MB...
I would therefore advise against this.

_You could optionally use another directory name for the data by using `option("bvdputte.countries.datafolder")` in `config.php`_

## Usage

In blueprint:
```
countries:
  label: Countries
  type: multiselect
  options: query
  query:
    fetch: site.getCountries
    text: "{{ arrayItem.value }}"
    value: "{{ arrayItem.key }}"
```

Methods:
1. Expects an ISO country code and returns a localized country name
```php
bvdputte\Countries::codeToName(
    "BE", // ISO country code
    "NL" // OPTIONAL - Language/locale identifier, defaults to the current Kirby language
);
// => Outputs "België"
```

2. Expects a delimited string of ISO country codes and returns as a delimited string of country names
```php
bvdputte\Countries::codesToNames(
    "BE, FR, DE", // ISO country code
    "NL", // OPTIONAL - Language/locale identifier, defaults to the current Kirby language
    ", " // OPTIONAL - delimiter, defaults to ", " (the kirby default behaviour)
);
// => Outputs "België, Frankrijk, Duitsland"
```

3. Expects an array of ISO country codes and returns as an associative array of country names
```php
bvdputte\Countries::codesToArray(
    ["BE", "FR", "DE"], // ISO country code
    "NL" // OPTIONAL - Language/locale identifier, defaults to the current Kirby language
);
// => ["BE"=>"België, "FR"=>"Frankrijk", "DE"=>"Duitsland"]
```

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/bvdputte/kirby-countries/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.
