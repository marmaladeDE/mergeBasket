# marmalade merge Basket Module

When going through the checkout, OXID merges your basket in the background, if there is one set.
With this module, you're customers can do that explicitly.

# License
The MIT License (MIT)

__Copyright (c) 2016 Joscha Krug | marmalade GmbH__

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

# Intensions of the license

Feel free to use the module in OXID CE, PE and EE projects. At ANY TIME if you use the whole or parts of the module code, keep the Names in the module.

# Know issues

We opensource this module because it might help some of you. Please keep in mind that there are know issues.
If you fix them, please do a Pull Request and help others as well.

* module structure should be set to support composer
* composer.json missing
* support for flow theme missing

# Installation

* backup your shop and database

* copy files/folders in your shop-directory

* add the following module-entries to configuration
  ```
  oxbasket => marm/basketmerge/basketmerge_oxbasket
  oxcmp_shop => marm/basketmerge/basketmerge_oxcmp_shop
  oxcmp_basket => marm/basketmerge/basketmerge_oxcmp_basket
  ```

* adjust your theme as shown below

* Delete you're cookies

* You're done

__BASIC Theme__

 _header.tpl insert after ``<body>```

 ```
[{if $hasSaveBasket}]
  [{oxid_include_dynamic file="dyn/merge_basket.tpl" }] 
[{/if}]`
```

__Azure Theme__

 layout/base.tpl insert after <body>

    '''
    [{oxid_include_dynamic file="../../../modules/marm/basketmerge/out/blocks/merge_basket.tpl" }]
    ```

- Oxid 4.4 needs jQuery or template adjustment



    
