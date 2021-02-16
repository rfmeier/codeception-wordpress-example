# WordPress Plugin Codeception Example

## Setup

**Requirements**
* php 7.3+
* Install [Composer](https://getcomposer.org/doc/00-intro.md)
* Install [Docker](https://www.docker.com/get-started)

#### 1. Clone plugin within the `wp-content/plugins` directory.
```
git clone git@github.com:rfmeier/codeception-wordpress-example.git
```

#### 2. Install packages
```
composer install
```

#### 3. Start Docker (WordPress)
Using Docker Compose. Start up the WordPress site.

```
docker-compose up -d
```

Once started, visit [http://localhost:8080/wp-admin](http://localhost:8080/wp-admin) and finish the WordPress installation.

#### 4. Create a testing WordPress site
Codeception will reset the WordPress database between tests. In order for it to do this, a backup will need to be created in the `tests/_data` directory. You can run the following command to create that backup.

```
docker-compose exec --user=www-data --workdir=/var/www/html/wp-content/plugins/codeception-wordpress-example wordpress wp db export tests/_data/dump.sql
```

#### 5. Install Chromedriver
[Chromedriver](https://chromedriver.chromium.org/) is used by Codeception to work with Chrome when running tests. Download the latest **stable** version and unzip the `chromedriver` application to the `bin` directory in the repository.

#### 6. Configure Codeception
Codeception will need to be configured. This process can be tedious depending on how your WordPress site is configured.

Copy the example file and update the environment variables.
```
cp .env.testing.example .env.testing
```

#### 7. Start Chromedrive
```
./bin/chromedriver --url-base=/wd/hub
```

#### 8. Run codeception
After you _think_ you have Codeception configured, you can run the tests.
```
vendor/bin/codecept run acceptance
```

## Documentation
* [Codeception](https://codeception.com/)
  * [Codeception for WordPress](https://codeception.com/for/wordpress)
* [WPBrowser](https://wpbrowser.wptestkit.dev/)
  * [WPBrowser](https://wpbrowser.wptestkit.dev/modules/wpbrowser)
  * [WPDb](https://wpbrowser.wptestkit.dev/modules/wpdb)
  * [WPWebDriver](https://wpbrowser.wptestkit.dev/modules/wpwebdriver)
* [Chromedriver](https://chromedriver.chromium.org/)