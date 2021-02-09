# WordPress Plugin Codeception Example

## Setup
#### 1. Clone plugin within the `wp-content/plugins` directory.
```
git clone git@github.com:rfmeier/codeception-wordpress-example.git
```

#### 2. Install packages
```
composer install
```

#### 3. Create a testing WordPress site
A WordPress site will need to be created that Codeception can run the browser tests again. The database will also need to be accessible by Codeception.

Once you have setup the WordPress site and configured, create a database dump and place the `dump.sql` file into the `tests/_data/dump.sql`.

Codeception will reset the WordPress site with the `dump.sql` file each time the tests are completed.

#### 4. Configure Codeception
Codeception will need to be configured. This process can be tedious depending on how your WordPress site is configured.

Copy the example file and update the environment variables.
```
cp .env.testing.example .env.testing
```

#### 5. Run codeception
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
  
