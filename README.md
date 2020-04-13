# REST API

<!--
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]
-->

It enables to add REST endpoints to retrieve data for any URL-based resource. It is based on the [PoP API](https://github.com/getpop/api) package.

## Install

Via Composer

``` bash
composer require getpop/api-rest dev-master
```

**Note:** Your `composer.json` file must have the configuration below to accept minimum stability `"dev"` (there are no releases for PoP yet, and the code is installed directly from the `master` branch):

```javascript
{
    ...
    "minimum-stability": "dev",
    "prefer-stable": true,
    ...
}
```

To enable pretty API endpoint `/api/rest/`, follow the instructions [here](https://github.com/getpop/api#enable-pretty-permalinks)

<!--
Add the following code in the `.htaccess` file to enable API endpoint `/api/rest/`:

```apache
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /

# Rewrite from /some-url/api/rest/ to /some-url/?scheme=api&datastructure=rest
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteRule ^(.*)/api/rest/?$ /$1/?scheme=api&datastructure=rest [L,P,QSA]

# b. Homepage single endpoint (root)
# Rewrite from api/rest/ to /?scheme=api&datastructure=rest
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteRule ^api/rest/?$ /?scheme=api&datastructure=rest [L,P,QSA]
</IfModule>
```
-->

## Usage

Append `/api/rest/` to the URL to fetch the pre-defined fields, and optionally add a `query` URL parameter to retrieve specific data fields using [this syntax](https://github.com/getpop/field-query).

Examples:

_**Single post, default fields**_:<br/>
[{single-post-url}/api/rest/](https://nextapi.getpop.org/2013/01/11/markup-html-tags-and-formatting/api/rest/)

_**Single post, custom fields**_:<br/>
[{single-post-url}/api/rest/?query=id|title|author.id|name](https://nextapi.getpop.org/2013/01/11/markup-html-tags-and-formatting/api/rest/?query=id|title|author.id|name)

_**Collection of posts, default fields**_:<br/>
[{post-list-url}/api/rest/](https://nextapi.getpop.org/posts/api/rest/)

_**Collection of posts, custom fields**_:<br/>
[{post-list-url}/api/rest/?query=id|title|author.id|name](https://nextapi.getpop.org/posts/api/rest/?query=id|title|author.id|name)

## More information

Please refer to package [API](https://github.com/getpop/api), on which the REST API is based, and which contains plenty of extra documentation.

---
---
---

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email leo@getpop.org instead of using the issue tracker.

## Credits

- [Leonardo Losoviz][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/getpop/api-rest.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/getpop/api-rest/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/getpop/api-rest.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/getpop/api-rest.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/getpop/api-rest.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/getpop/api-rest
[link-travis]: https://travis-ci.org/getpop/api-rest
[link-scrutinizer]: https://scrutinizer-ci.com/g/getpop/api-rest/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/getpop/api-rest
[link-downloads]: https://packagist.org/packages/getpop/api-rest
[link-author]: https://github.com/leoloso
[link-contributors]: ../../contributors
