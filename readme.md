PaketId Magento Extension
=====================
Paket.id booking module
Facts
-----
- version: 1.0.0
- extension key: PaketId_Booking
- [extension on GitHub](https://github.com/hmphu/paketid_booking)

Description
-----------
Paket.id booking module for Magento 1.4.x - 1.9.x

Requirements
------------
- PHP >= 5.2.0
- Mage_Core
- ...

Compatibility
-------------
- Magento >= 1.4

Installation Instructions
-------------------------

#### Option 1: Extract and copy

1. Upload all files and folders from the "src" folder to your Magento root directory.
2. Clear the Magento cache (`AdminPanel > System > Cache Management`), logout from the admin panel and then login again.
3. Go to `AdminPanel > System > Configurations > PaketId > Booking API Options` to setup the API email and API key.

#### Option 2: Install using [modman](https://github.com/colinmollenhour/modman)

```
modman clone https://github.com/hmphu/paketid_booking
```

#### Option 3: Using the [Magento Hackathon Composer Installer](https://github.com/magento-hackathon/magento-composer-installer)

```
composer require hmphu/paketid_booking 1.0.*
```
Or edit your composer.json file directly and add this line to the "require" section:

```
"hmphu/paketid_booking": "1.0.*"
```

Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/hmphu/paketid_booking/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Jimmy Hoang
[https://hmphu.com](https://hmphu.com)

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2016 Paket.id
