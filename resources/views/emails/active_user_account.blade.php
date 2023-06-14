@component('mail::message')
    # Bonjour
    ## Merci de confimer votre account
@component('mail::panel')
    pour activer votre account
@endcomponent
@component('mail::button', ['url' => $url])
    Cliquez ici 
@endcomponent
Merci <br>
équipe {{ config('app.name') }}
@endcomponent