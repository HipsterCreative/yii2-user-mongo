# Yii2-user-mongo  [![Build Status](https://travis-ci.org/HipsterCreative/yii2-user-mongo.svg?branch=master)](https://travis-ci.org/HipsterCreative/yii2-user-mongo.svg)

**NOTE**: This conversion is still being tested, though as of June 21, 2014 all basic features appear to be working.

___

This addon was forked from [dektrium/yii2-user](https://github.com/dektrium/yii2-user), based on their version 0.6.0 and the [last June 17th 2014 commit](https://github.com/dektrium/yii2-user/commit/d36b851c8c913db4572faacedfc21b79f93b8834)

Most of web applications provide a way for users to register, log in or reset their forgotten passwords. Rather than re-implementing this on each application, you can use Yii2-user which is a flexible user management module for Yii2 that handles common tasks such as registration, authentication and password retrieval. Current version includes following features:

* Data lives and breaths in [MongoDB](http://www.mongodb.org/)
* Registration with an optional confirmation per mail
* Registration via social networks
* Password retrieval
* Account and profile management
* Console commands
* User management interface

> **NOTE:** Module is in initial development. Anything may change at any time.

## Documentation

**Note:** These links are for the dektrium project version, and may represent features we haven't implemented yet.

Yii2-user documentation is available online: [Read the documentation](http://yii2-user.readthedocs.org/en/latest/).
Installation instructions are located in [installation guide](http://yii2-user.readthedocs.org/en/latest/getting-started/installation.html).

## Documentation - Mongo version specific

### Installation

Add Yii2-user-mongo to the require section of your composer.json file:

<pre>
{
     "require": {
         "hipstercreative/yii2-user-mongo": "*"
     }
}
</pre>

And run following command to make **composer** download and install Yii2-user:

<pre>$ php composer.phar update</pre>

There is currently no database schema / migration needed.

## Configuration

Currently the configuration options match the Yii2-user project. The **class** defintion changes a bit.

The configuration is done in the application’s **config/web.php** file. Notice that the class is now **hipstercreative\user\Module** instead of the dektrium namespace.

<pre>
<?php return [
    ...
    'modules' => [
        ...
        'user' => [
            'class' => 'hipstercreative\user\Module',
            'allowUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
        ...
    ],
    ...
];
</pre>

## Contributing

Contributing instructions are located in [CONTRIBUTING.md](CONTRIBUTING.md) file.

## License

Yii2-user is released under the MIT License. See the bundled [LICENSE.md](LICENSE.md) for details.
