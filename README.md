Symfony2 Bundle
=============

## Installation

To install CmsVacancyBundle with Composer just add the following to your `composer.json` file:

``` php
// composer.json
{
    // ...
    require: {
        // ...
        "justimmo/symfony2-bundle": "dev-master",
    }
}
```

Now, Composer will automatically download all required files, and install them for you. 
All that is left to do is to update your AppKernel.php file, and register the new bundle:

``` php
<?php

// in AppKernel::registerBundles()
$bundles = array(
    // ...
   	new Bgcc\Justimmo\Symfony2Bundle\BgccJustimmoSymfony2Bundle(),
    // ...
);
```

## Configuration

### Configure the justimmo api username and password

``` yaml
# app/config/config.yml
bgcc_justimmo_symfony2:
    username:   #api username
    password:   #api password
```

Congratulations! You're ready!