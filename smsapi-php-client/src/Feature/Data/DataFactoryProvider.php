<?php

declare(strict_types=1);

namespace Smsapi\Client\Feature\Data;

use Smsapi\Client\Feature\Contacts\Data\ContactFactory;
use Smsapi\Client\Feature\Contacts\Data\ContactGroupFactory;
use Smsapi\Client\Feature\Contacts\Fields\Data\ContactFieldFactory;
use Smsapi\Client\Feature\Contacts\Fields\Data\ContactFieldOptionFactory;
use Smsapi\Client\Feature\Contacts\Groups\Permissions\Data\GroupPermissionFactory;
use Smsapi\Client\Feature\Hlr\Data\HlrFactory;
use Smsapi\Client\Feature\Mms\Data\MmsFactory;
use Smsapi\Client\Feature\Profile\Data\MoneyFactory;
use Smsapi\Client\Feature\Profile\Data\ProfileFactory;
use Smsapi\Client\Feature\Profile\Data\ProfilePriceCountryFactory;
use Smsapi\Client\Feature\Profile\Data\ProfilePriceFactory;
use Smsapi\Client\Feature\Profile\Data\ProfilePriceNetworkFactory;
use Smsapi\Client\Feature\Push\Data\PushAppFactory;
use Smsapi\Client\Feature\Push\Data\PushShipmentDispatchDetailsFactory;
use Smsapi\Client\Feature\Push\Data\PushShipmentFactory;
use Smsapi\Client\Feature\Push\Data\PushShipmentFallbackFactory;
use Smsapi\Client\Feature\Push\Data\PushShipmentPayloadFactory;
use Smsapi\Client\Feature\Push\Data\PushShipmentSummaryFactory;
use Smsapi\Client\Feature\ShortUrl\Data\ShortUrlLinkFactory;
use Smsapi\Client\Feature\Sms\Data\SmsFactory;
use Smsapi\Client\Feature\Sms\Sendernames\Data\SendernameFactory;
use Smsapi\Client\Feature\Subusers\Data\SubuserFactory;
use Smsapi\Client\Feature\Vms\Data\VmsFactory;

/**
 * @internal
 */
class DataFactoryProvider
{
    public function provideSmsFactory(): SmsFactory
    {
        return new SmsFactory();
    }

    public function provideMmsFactory(): MmsFactory
    {
        return new MmsFactory();
    }

    public function provideVmsFactory(): VmsFactory
    {
        return new VmsFactory();
    }

    public function provideHlrFactory(): HlrFactory
    {
        return new HlrFactory();
    }

    public function provideProfileFactory(): ProfileFactory
    {
        return new ProfileFactory();
    }

    public function provideProfilePriceFactory(): ProfilePriceFactory
    {
        return new ProfilePriceFactory(
            new ProfilePriceCountryFactory(),
            new ProfilePriceNetworkFactory(),
            new MoneyFactory()
        );
    }

    public function provideSendernameFactory(): SendernameFactory
    {
        return new SendernameFactory();
    }

    public function provideSubuserFactory(): SubuserFactory
    {
        return new SubuserFactory(new PointsFactory());
    }

    public function provideShortUrlLinkFactory(): ShortUrlLinkFactory
    {
        return new ShortUrlLinkFactory();
    }

    public function providePushShipmentFactory(): PushShipmentFactory
    {
        return new PushShipmentFactory(
            new PushAppFactory(),
            new PushShipmentPayloadFactory(),
            new PushShipmentSummaryFactory(),
            new PushShipmentDispatchDetailsFactory(),
            new PushShipmentFallbackFactory()
        );
    }

    public function provideContactFactory(): ContactFactory
    {
        return new ContactFactory($this->provideContactGroupFactory());
    }

    public function provideContactGroupFactory(): ContactGroupFactory
    {
        return new ContactGroupFactory($this->provideGroupPermissionFactory());
    }

    public function provideGroupPermissionFactory(): GroupPermissionFactory
    {
        return new GroupPermissionFactory();
    }

    public function provideContactFieldFactory(): ContactFieldFactory
    {
        return new ContactFieldFactory();
    }

    public function provideContactFieldOptionFactory(): ContactFieldOptionFactory
    {
        return new ContactFieldOptionFactory();
    }
}
