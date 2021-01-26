<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div id="recaptcha" class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"
     data-theme="{{ $theme }}" data-callback="recaptchaCallback" wire:ignore></div>
