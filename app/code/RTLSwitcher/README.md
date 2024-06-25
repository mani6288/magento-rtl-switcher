# ABD RTL Switcher

## Overview
The `ABD\RTLSwitcher` module is a Magento 2 custom module designed to dynamically set the text direction (`dir` attribute) of the `<body>` element based on the store's language. This module checks the store's language code and sets the direction to `ltr` for English and `rtl` for Arabic.

## Installation
1. **Download or Clone the Module**
    - Download the module or clone it into the `app/code/ABD/RTLSwitcher` directory of your Magento 2 installation.

2. **Enable the Module**
    - Run the following commands in the root directory of your Magento installation:
      ```bash
      bin/magento module:enable ABD_RTLSwitcher
      bin/magento setup:upgrade
      bin/magento setup:di:compile
      bin/magento cache:flush