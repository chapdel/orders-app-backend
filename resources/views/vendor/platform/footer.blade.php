@guest
    <p>Crafted with <span class="mr-1">❤️</span> by <a href='https://notchafrica.us' target="_blank">Notch Africa</p>
@else

    <div class="text-center">
        <p class="small m-0">
            {{ __('The application code is published under the MIT license.') }} {{date('Y')}}<br>
            <a href="http://orchid.software" target="_blank" rel="noopener">
                {{ __('Currently') }} v{{\Orchid\Platform\Dashboard::VERSION}}
            </a>
        </p>
    </div>
@endguest
