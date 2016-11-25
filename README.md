# JapaneseHoliday
日本の祝日

## Usage

### 対象年を指定して祝日を取得

```php
$japaneseHoliday = new Mo3g4u\JapaneseHoliday\JapaneseHoliday(2016);
$holidays = $japaneseHoliday->getHolidays();
var_dump($holidays);
```
結果
```php
array(17) {
  [0]=>
  array(2) {
    ["caption"]=>
    string(6) "元日"
    ["date"]=>
    string(10) "2016-01-01"
  }
  [1]=>
  array(2) {
    ["caption"]=>
    string(12) "成人の日"
    ["date"]=>
    string(10) "2016-01-11"
  }
  [2]=>
  array(2) {
    ["caption"]=>
    string(15) "建国記念日"
    ["date"]=>
    string(10) "2016-02-11"
  }
  [3]=>
  array(2) {
    ["caption"]=>
    string(12) "春分の日"
    ["date"]=>
    string(10) "2016-03-20"
  }
  [4]=>
  array(2) {
    ["caption"]=>
    string(12) "振替休日"
    ["date"]=>
    string(10) "2016-03-21"
  }
  [5]=>
  array(2) {
    ["caption"]=>
    string(12) "昭和の日"
    ["date"]=>
    string(10) "2016-04-29"
  }
  [6]=>
  array(2) {
    ["caption"]=>
    string(15) "憲法記念日"
    ["date"]=>
    string(10) "2016-05-03"
  }
  [7]=>
  array(2) {
    ["caption"]=>
    string(15) "みどりの日"
    ["date"]=>
    string(10) "2016-05-04"
  }
  [8]=>
  array(2) {
    ["caption"]=>
    string(15) "こどもの日"
    ["date"]=>
    string(10) "2016-05-05"
  }
  [9]=>
  array(2) {
    ["caption"]=>
    string(9) "海の日"
    ["date"]=>
    string(10) "2016-07-18"
  }
  [10]=>
  array(2) {
    ["caption"]=>
    string(9) "山の日"
    ["date"]=>
    string(10) "2016-08-11"
  }
  [11]=>
  array(2) {
    ["caption"]=>
    string(12) "敬老の日"
    ["date"]=>
    string(10) "2016-09-19"
  }
  [12]=>
  array(2) {
    ["caption"]=>
    string(12) "秋分の日"
    ["date"]=>
    string(10) "2016-09-22"
  }
  [13]=>
  array(2) {
    ["caption"]=>
    string(12) "体育の日"
    ["date"]=>
    string(10) "2016-10-10"
  }
  [14]=>
  array(2) {
    ["caption"]=>
    string(12) "文化の日"
    ["date"]=>
    string(10) "2016-11-03"
  }
  [15]=>
  array(2) {
    ["caption"]=>
    string(18) "勤労感謝の日"
    ["date"]=>
    string(10) "2016-11-23"
  }
  [16]=>
  array(2) {
    ["caption"]=>
    string(15) "天皇誕生日"
    ["date"]=>
    string(10) "2016-12-23"
  }
}
```

### 対象年、月を指定して祝日を取得

```php
$japaneseHoliday = new Mo3g4u\JapaneseHoliday\JapaneseHoliday(2016, 5);
$holidays = $japaneseHoliday->getHolidays();
var_dump($holidays);
```
結果
```php
array(3) {
  [0]=>
  array(2) {
    ["caption"]=>
    string(15) "憲法記念日"
    ["date"]=>
    string(10) "2016-05-03"
  }
  [1]=>
  array(2) {
    ["caption"]=>
    string(15) "みどりの日"
    ["date"]=>
    string(10) "2016-05-04"
  }
  [2]=>
  array(2) {
    ["caption"]=>
    string(15) "こどもの日"
    ["date"]=>
    string(10) "2016-05-05"
  }
}
```

### 出力フォーマットの指定

```php
$japaneseHoliday = new Mo3g4u\JapaneseHoliday\JapaneseHoliday(2016, 5);
$holidays = $japaneseHoliday->getHolidays('Y年m月d日');
var_dump($holidays);
```
結果
```php
array(3) {
  [0]=>
  array(2) {
    ["caption"]=>
    string(15) "憲法記念日"
    ["date"]=>
    string(17) "2016年05月03日"
  }
  [1]=>
  array(2) {
    ["caption"]=>
    string(15) "みどりの日"
    ["date"]=>
    string(17) "2016年05月04日"
  }
  [2]=>
  array(2) {
    ["caption"]=>
    string(15) "こどもの日"
    ["date"]=>
    string(17) "2016年05月05日"
  }
}
```

### 祝日名だけを取得

```php
$japaneseHoliday = new Mo3g4u\JapaneseHoliday\JapaneseHoliday(2016, 5);
$holidays = $japaneseHoliday->getCaptions();
var_dump($holidays);
```
結果
```php
array(3) {
  [0]=>
  string(15) "憲法記念日"
  [1]=>
  string(15) "みどりの日"
  [2]=>
  string(15) "こどもの日"
}
```

### 日付だけを取得

```php
$japaneseHoliday = new Mo3g4u\JapaneseHoliday\JapaneseHoliday(2016, 5);
$holidays = $japaneseHoliday->getDates();
var_dump($holidays);
```
結果
```php
array(3) {
  [0]=>
  string(10) "2016-05-03"
  [1]=>
  string(10) "2016-05-04"
  [2]=>
  string(10) "2016-05-05"
}
```

### DateTimeオブジェクトで取得

```php
$japaneseHoliday = new Mo3g4u\JapaneseHoliday\JapaneseHoliday(2016, 5);
$holidays = $japaneseHoliday->getDateTimes();
var_dump($holidays);
```
結果
```php
array(3) {
  [0]=>
  object(DateTime)#54 (3) {
    ["date"]=>
    string(26) "2016-05-03 14:27:14.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(3) "UTC"
  }
  [1]=>
  object(DateTime)#57 (3) {
    ["date"]=>
    string(26) "2016-05-04 14:27:14.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(3) "UTC"
  }
  [2]=>
  object(DateTime)#59 (3) {
    ["date"]=>
    string(26) "2016-05-05 14:27:14.000000"
    ["timezone_type"]=>
    int(3)
    ["timezone"]=>
    string(3) "UTC"
  }
}
```
