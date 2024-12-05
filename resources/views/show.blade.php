<!DOCTYPE html>
<html>
<head>
    <title>Questions</title>
</head>
<body>
    <h2>Questions</h2>
    {{-- <h2>{{$name_of_institute}}</h2> --}}
@csrf
    @if($questions->isEmpty())
        <p>No questions available.</p>
    @else
        <ul>
            @foreach($questions as $question)
                <li>{{ $question->add_question_text}}{{$question->person_id}}</li>
                {{-- <li>{{$question->person_id}}</li> --}}
            @endforeach
        </ul>
    @endif
    {{-- <a href="{{ url('/pdf') }}" class="btn btn-primary">Download PDF</a> --}}
    <form action="{{url('/')}}/pdf" method="POST">
        @csrf
        <!-- Hidden fields to pass data -->
        {{-- <input type="hidden" name="name_of_institute" value="{{ $name_of_institute }}">
        <input type="hidden" name="title_of_test" value="{{ $title_of_test }}">
        <input type="hidden" name="total_marks" value="{{ $total_marks }}">
        <input type="hidden" name="duration" value="{{ $duration }}">
        <input type="hidden" name="short_questions" value="{{ $short_questions }}">
        <input type="hidden" name="long_questions" value="{{ $long_questions }}"> --}}
    
        {{-- @foreach ($shortQuestions as $question)
            <input type="hidden" name="shortQuestions" value="{{ $question->add_quesstion_text}}">
        @endforeach --}}
           @foreach ($questions   as $index => $question)
        <input type="hidden" name="questions[{{ $index }}]" value="{{ $question->add_question_text}}">
        @endforeach
        {{-- @foreach ($longQuestions as $index => $question)
        <input type="hidden" name="longQuestions[{{ $index }}]" value="{{ $question->add_question_text }}">
        @endforeach --}}
        
        {{-- @foreach ($longQuestions as $question)
            <input type="hidden" name="longQuestions[]" value="{{ $question->add_question_text }}">
        @endforeach  --}}
    
        <button type="submit" class="btn btn-primary">Generate PDF</button>
        <a href="{{url('/paperslist')}}" class = "btn btn-primary" >Save Paper</a>
    </form>


</body>
</html>
