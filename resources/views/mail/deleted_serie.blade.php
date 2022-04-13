@component('mail::message')
    # A série {{ $series_name }} foi removida com sucesso!
    - Código: {{ $series_code }}
    - Nome da série: {{ $series_name }}
    - Quantidade de temporadas: {{ $series_seasons }}
    - Quantidade de episódios: {{ $series_episodes }}
@endcomponent
