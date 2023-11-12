Please see [this repo](https://github.com/laravel-notification-channels/channels) for instructions on how to submit a channel proposal.

# Verimor - Laravel Notification Channel

## Contents

- [Installation](#installation)
- [Usage](#usage)
	- [Available Message methods](#available-message-methods)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

You can install the package via composer:

```bash
composer require laravel-notification-channels/verimor
```

### Configuration

Add your Verimor `username` and `password` to your .env:

```bash
VERIMOR_USERNAME=${USERNAME}
VERIMOR_PASSWORD=${PASSWORD}
VERIMOR_FROM=${FROM} #optional
VERIMOR_VALID_FOR=${VALID_FOR} #optional
VERIMOR_DATA_CODING=${DATA_CODING} #optional
VERIMOR_IS_COMMERCIAL=${IS_COMMERCIAL} #optional
VERIMOR_IYS_RECIPIENT_TYPE=${IYS_RECIPIENT_TYPE} #optional
```

#### Advanced Configuration

Run 
```bash
php artisan vendor:publish --provider="NotificationChannels\Verimor\VerimorServiceProvider"
```

## Usage

Now you can use the channel in your via() method inside the notification:

```php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\Verimor\Message;
use NotificationChannels\Verimor\VerimorSmsChannel;
use NotificationChannels\Verimor\VerimorMessage;
use NotificationChannels\Verimor\VerimorSmsMessage;

class UserWelcomeNotification extends Notification
{
    public function via(object $notifiable): array
    {
        return [VerimorSmsChannel::class];
    }

    public function toVerimor(object $notifiable): VerimorMessage
    {
        return (new VerimorSmsMessage())
            ->message(
                new Message('MESSAGE_CONTENT-2', 'TO')
            )
            ->message(
                new Message('MESSAGE_CONTENT', 'TO')
            );
    }
}
```

### Available Message methods

#### VerimorMessage 
- > `abstract class`
- > `implements Arrayable`

- `username('')`
- `password('')`
- `title('')`
- `validFor('')`
- `dataCoding(bool false)`
- `isCommercial(bool false)`
- `iysRecipientType('')`
- `sendAt(DateTime new \DateTime)`
- `customId('')`
	
#### VerimorSmsMessage
- > `extends VerimorMessage`
  
- `toArray()`
- `message(Verimor\Message $message)`

#### Verimor\Message
- > `implements Arrayable`
  
- `__construct(string $content, string $to, string $id = null)`
- `content()`
- `to()`
- `id()`
- `toArray()`
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing (writing)

## Security

If you discover any security related issues, please email `farukomer.gol@gmail.com` instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
