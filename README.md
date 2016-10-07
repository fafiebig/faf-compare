# faf-compare

Wordpress Plugin for Image Compare based on TwentyTwenty.
Show images before/after comparison of your WordPress images.

![Zurb Twenty Twenty](http://zurb.com/playground/uploads/project/thumb/12/twentytwenty.jpg)

# Installation

* Unzip and upload the plugin to the **/wp-content/plugins/** directory
* Activate the plugin in WordPress
* Use the editor button or **[compare before="id of image" after="id of image"]** to show comparison.

# Installation with composer

* Add the repo to your composer.json

```json

"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/fafiebig/faf-compare.git"
    }
],

```

* require the package with composer

```shell

composer require fafiebig/faf-compare 1.*

```