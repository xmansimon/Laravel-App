{{-- /resources/views/books/search.blade.php --}}
@extends('layouts.master')

@section('title')
    Search
@endsection

@section('content')
    <h1>Generator</h1>
<br>
    <form method='GET' action='/names/search-process'>

        <fieldset>

            <span>Enter your birth year:</span>
            <label><input type='text' name='year' id = 'year' value="{{ $year }}"></label>
            @include('modules.field-error', ['field' => 'year'])
            <br>

            <span>Personality </span>
            <select name="personality" id = 'personality' value ='{{ ($personality) }}' single>
                <option value=1 {{($personality == "1")? 'selected' : ''}}>ambitious</option>
                <option value=2 {{($personality == "2")? 'selected' : ''}}>compassionate</option>
                <option value=3 {{($personality == "3")? 'selected' : ''}}>diligent</option>
                <option value=4 {{($personality == "4")? 'selected' : ''}}>persistent</option>
                <option value=5 {{($personality == "5")? 'selected' : ''}}>unassuming</option>
                <option value=6 {{($personality == "6")? 'selected' : ''}}>reliable</option>
            </select>
            @include('modules.field-error', ['field' => 'personality'])
            <br>

            <span>Gender:</span>
            <label class="radio-inline"><input type='radio'name='sex' value="male"  {{($sex == "male")? 'checked' : ''}} > male</label>
            <label class="radio-inline"><input type='radio'name='sex' value="female" {{($sex == "female")? 'checked' : ''}}> female</label>
            @include('modules.field-error', ['field' => 'sex'])



        </fieldset>

        <input type='submit' value='Generate' class='btn btn-primary'>

    </form>


    @if(!empty($searchResults))
        <h2>Suggested name: </h2>

        @foreach($searchResults as $name)
            <div class='book'>
                <h3>{{ $name }}</h3>
            </div>
        @endforeach

    @else


        @endif

@endsection