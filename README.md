# Kntnt Instant Pages

WordPress plugin that preloads pages on hover and click for faster page navigation.

## Description

This plugin uses the lightweight (1 kB) [instant.page](https://instant.page/) script for just-in-time preloading for faster user navigation – it preloads a page right before a user clicks on it.

The plugin is designed to work alongside the [Speculative Loading](https://wordpress.org/plugins/speculation-rules/) plugin. If the Speculative Loading plugin is activated and and the browser supports the [Speculation Rules API](https://developer.mozilla.org/en-US/docs/Web/API/Speculation_Rules_API), instant.page will not be loaded, deferring to the native browser implementation instead.

## Requirements

- WordPress 5.0 or higher
- PHP 8.0 or higher
- Modern browsers that support JavaScript modules

## Installation

### For Users

1. [Download the plugin zip file.](https://github.com/Kntnt/kntnt-instant-pages/releases/latest/download/kntnt-instant-pages.zip)
2. Go to WordPress admin panel → Plugins → Add New.
3. Click "Upload Plugin" and select the downloaded zip file.
4. Activate the plugin.

### For Developers

1. Clone this repository:
   ```bash
   git clone https://github.com/Kntnt/kntnt-instant-pages.git
   cd kntnt-instant-pages
   ```

2. Install dependencies:
   ```bash
   npm install
   composer install
   ```

The `npm install` command will automatically copy the instant.page script to the correct location.

## Development

### Directory Structure
```
.
├── .gitattributes
├── .gitignore
├── composer.json
├── includes/
│   └── class-plugin.php
├── js/
│   ├── instant.page.js
│   └── kntnt-instant-pages.js
├── kntnt-instant-pages.php
├── LICENSE
├── package.json
└── README.md
```

### Key Features

- Automatic integration with instant.page script
- Graceful fallback to native browser features when available
- Support for the Speculation Rules API
- No configuration needed - works out of the box
- Loads scripts in footer for optimal performance
- Skips loading in admin area and customizer

### Filters

#### `kntnt-instant-pages-skip`
Controls whether the instant pages functionality should be skipped for the current request.

**Parameters:**
- `$is_skipping` (bool) Whether to skip loading instant pages. Default: `false`

**Example:**

```php
// Disable instant pages on specific post types
add_filter( 'kntnt-instant-pages-skip', function( $is_skipping ) {
    if ( is_singular( 'product' ) ) {
        return true;
    }
    return $is_skipping;
});
```

### Building and Testing

- Build zip file that can be uploaded to WordPress:
  ```bash
  composer run-script build
  ```

- Run PHP CodeSniffer:
  ```bash
  composer run phpcs
  ```

- Check for script updates:
  ```bash
  npm run check-updates
  ```

- Update instant.page script:
  ```bash
  npm run update-script
  ```
  
## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

GPL v3 or later. See [LICENSE](https://www.gnu.org/licenses/gpl-3.0.html) for details.

## Credits

- [instant.page](https://instant.page/) by Alexandre Dieulot
- Developed by [Kntnt](https://www.kntnt.se/)