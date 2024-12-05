<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
     <link rel="stylesheet" href="css/subject.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#chapter_id').chapter_id({
                includeSelectAllOption: true,
                selectAllText: 'Select all',
                unselectAllText: 'Unselect all',
                nonSelectedText: 'Select options',
                allSelectedText: 'All options selected'
            });
        });
    </script>
  </body>
  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
    <div class="container">
        <div class="row">
            <form action="{{url('/')}}/show" method="post">
                @csrf
                <h2 class="text-center">Select</h2>
                {{-- <div class="form-group">
                    <label for="name_of_institute">Name of Institute</label>
                    <input type="text"  class="form-control" name="name_of_institute">
                    <span class="text-danger">
                        @error('name_of_institute')
                           {{$message}}
                        @enderror
                       </span>
                </div> --}}

            <div class="form-group">
                <label>Select class:</label>
                <select name="year_id" class="select-box" id="year_id">
                    <option value="">Select Class</option>
                    @foreach($years as $year)
                        <option value="{{ $year->year_id }}">{{ $year->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('year_id')
                       {{$message}}
                    @enderror
                   </span>
            </div>
            <div class="form-group">
                <label>Select Subject:</label>
                <select name="subject_id" class="select-box" id="subject_id">
                    <option value="">Select Subject</option>
                    @foreach($subject as $sub)
                        <option value="{{ $sub->subject_id }}">{{ $sub->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('subject_id')
                       {{$message}}
                    @enderror
                   </span>
            </div>
            <div class="form-group">
                <label>Select Chapter:</label>
                <select name="chapter_id" class="select-box" id="chapter_id">
                    <option value="">Select Chapter</option>
                    @foreach($chapter as $chp)
                        <option value="{{ $chp->chapter_id }}">{{ $chp->chapter_name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('chapter_id')
                       {{$message}}
                    @enderror
                   </span>
            </div>
            {{-- <div class="form-group">
                    <label for = "short_question">short question</label>
                    <input type="number"  class="form-control" name="short_question">
                    <span class="text-danger">
                        @error('short_question')
                           {{$message}}
                        @enderror
                       </span>
                </div> --}}
            {{-- <div class="form-group">
                <label for="chapters">Choose Chapters:</label>
                @foreach($chapter as $chp)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="chapters[]" value="{{ $chp->chapter_id }}" id="chapter{{ $chp->chapter_id }}">
                        <label class="form-check-label" for="chapter{{ $chp->chapter_id }}">
                            {{ $chp->chapter_name }}
                        </label>
                    </div>
                @endforeach
            </div> --}}
            <div class="form-group">
                <label for="question_type">Question Type:</label>
                <select name="question_type" id="question_type" class="form-control">
                    <option value="short">Short</option>
                    <option value="long">Long</option>
                </select>
                <span class="text-danger">
                  @error('question_type')
                     {{$message}}
                  @enderror
                 </span>
            </div>
           
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select name="rating" id="rating" class="form-control">
                    <option value="normal">Normal</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
                <span class="text-danger">
                  @error('rating')
                     {{$message}}
                  @enderror
                 </span>
            </div>
            {{-- <div class="form-group">
                <label for="normal">Easy</label>
                <input type="number"  class="form-control" name="normal">
                <span class="text-danger">
                    @error('normal')
                       {{$message}}
                    @enderror
                   </span>
            </div> --}}
            <a href="#"><button type="submit" class="button">Next</button></a>
            
           </form>
        </div>
    </div>


</html>