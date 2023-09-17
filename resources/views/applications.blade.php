
<x-layout>

        @foreach ($applications as $application)

        <article>
            <h1>
            Name: <a href="/application/{{ $application->id }}">
                   {{ $application-> user -> name}}
                </a>
            </h1>

            <h2>
                Position: {{$application -> position -> name}}
            </h2>

        </article>

        <hr>

        @endforeach

</x-layout>

