# Marketing

Tools to create marketing assets and landing pages

> [!WARNING]  
> This package is currently under active development, and we have not yet released a major version. Once a 0.* version
> has been tagged, we strongly recommend locking your application to a specific working version because we might make
> breaking changes even in patch releases until we've tagged 1.0.
> 
> > [!WARNING]  
> This package requires FluxUI, a paid commercial package. In order to install this package, you have to have a license
> for FluxUI and have composer set to authenticate with Flux's server. See [FluxUI](https://fluxui.dev) for more
> information and to purchase a license.

## Installation

`composer require artisan-build/marketing`

## Configuration

There are currently no configuration options for this package, though there will be in a later version.

## Usage

### Email Subscription Form

This email subscription form allows you to collect email addresses from prospective customers and send them to the
marketing platform of your choice. The form works even without a marketing platform, so you can start collecting 
leads even before setting up your account with Mailcoach, Kit, or whatever.

```blade
<livewire:marketing:email-subscription-form
        heading="Get Notified When We Launch"
        subheading="We will be opening early access very soon."
        icon="envelope"
    />
```

This form handles the validation of the incoming email address and automatically de-duplicates.


## Memberware

This package is part of our internal toolkit and is optimized for our own purposes. We do not accept issues or PRs
in this repository. 

