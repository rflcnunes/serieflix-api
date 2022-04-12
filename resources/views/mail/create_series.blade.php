@component('mail::message')
    # Nova série adicionada
    - Código: {{ $series_code }}
    - Nome da série: {{ $series_name }}
    - Quantidade de temporadas: {{ $series_seasons }}
    - Quantidade de episódios: {{ $series_episodes }}
@endcomponent
