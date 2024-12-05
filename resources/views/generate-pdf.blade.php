<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
</head>
<body>
    <h2>Questions</h2>
    {{-- <h2>{{$name_of_institute}}</h2> --}}
@csrf
    @if($question->isEmpty())
        <p>No questions available.</p>
    @else
        <ul>
            @foreach($question as $question)
                <li>{{ $question->add_question_text}}{{$question->person_id}}</li>
                {{-- <li>{{$question->person_id}}</li> --}}
            @endforeach
        </ul>
    @endif
    {{-- <a href="{{ url('/pdf') }}" class="btn btn-primary">Download PDF</a> --}}

</body>
</html>