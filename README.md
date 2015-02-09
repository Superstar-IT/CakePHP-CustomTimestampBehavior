# CakePHP-CustomTimestampBehavior

## Installation
```sh
cd /tmp && git clone https://github.com/kei500/CakePHP-CustomTimestampBehavior.git
cp /tmp/CakePHP-CustomTimestampBehavior/app/Model/Behavior/CustomTimestampBehavior.php /path/to/your_approot/app/Model/Behavior
```

## Setup
All you have to do is to specify columns' name and format (datetime or unixtime) like this:
```php
class YourModel extends AppModel {
    public $actsAs = array(
        'CustomTimestamp' => array(
            'created' => array(
                'column' => 'your_created',        # default: 'created'
                'format' => 'your_created_format', # default: 'datetime'
            ),
            'updated' => array(
                'column' => 'your_updated',        # default: 'updated'
                'format' => 'your_updated_format', # default: 'datetime'
            ),
        ),
    );
}
```
