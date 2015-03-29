CSV Download composer package
========================================

See [https://packagist.org/packages/niiyz/csv](https://packagist.org/packages/niiyz/csv)

Installation / Usage
--------------------

1. Create a composer.json defining your dependencies. 

    ``` json
    {
      "require": {
        "niiyz/csv": "dev-master"
       }
    }
    ```

2. Require this package in your composer.json and update composer.  
    ``` json
      composer install
    ```

3. test.php 

    ``` php
      <?php
      require_once("../vendor/autoload.php");
      
      use Niiyz\Csv\CsvDownload;
  
      $list = [];
      $list[] = ["山田太郎", 12, 165, 50];
      $list[] = ["島田ジョン", 11, 175, 67];
      $list[] = ["小泉今日子", 48, 155, 45];
      
      $header = ["名前", "年齢", "身長", "体重"];
      
      $csv = new CsvDownload($list, $header);
      $csv->convertEncoding('UTF-8', 'SJIS-win');
      $csv->download('list.csv');
    ``` 

4. list.csv
  ``` text
  名前,年齢,身長,体重
  山田太郎,12,165,50
  島田ジョン,11,175,67
  小泉今日子,48,155,45
  ```
    
