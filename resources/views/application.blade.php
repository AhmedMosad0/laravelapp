<x-layout>

    <article>

        <h1>
            Name: {{$application -> user -> name}}
        </h1>

        <div>
            <h3>
                Username: {{$application->user->username}}<br><br>

                Cover Letter:  {{$application->cover_letter}}<br><br>

                CV: <a href="{{ asset('storage/Cvs/' . $application->CV) }}" target="_blank">{{ $application->CV }}</a><br><br>

                Position: {{$application -> position -> name}}<br><br>

                Title: {{$application -> position -> title}}<br><br>

                Description: {{$application -> position -> description}}
            </h3>
        </div>

    </article>


</x-layout>